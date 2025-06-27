<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{

      public function index()
    {
        $blogss = Blog::where('is_active', 1)->get();
        return view('admin.blog.view', compact('blogss'));
    }

    public function create($id = null)
    {
        $blog = $id ? Blog::find($id) : null;
        $allBlogs = BlogCategory::where('is_active', 1)->get();
        return view('admin.blog.form', compact('blog', 'allBlogs'));
    }

    public function save(Request $request, $id = null)
    {
        $request->validate([
            'blog' => 'required|exists:blog_categories,id',
            'title' => 'required',
            // 'image' => 'required',
            'short_description' => 'required',
            'meta_title' => 'required',
            // 'meta_image' => 'required',
            'image_alt' => 'required',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            'description' => 'required',
        ]);
        if ($id) {
            $blog = Blog::find($id);
        } else {
            $blog = new Blog();
        }
        $blog->blog = $request->blog;
        $blog->title = $request->title;
        $blog->short_description = $request->short_description;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keyword = $request->meta_keyword;
        if ($request->hasFile('image')) {
            if ($id && $blog->image) {
                $oldImagePath = public_path('storage/' . $blog->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/'), $imageName);
            $blog->image = $imageName;
        }
        $blog->image_alt = $request->image_alt;
        if ($request->hasFile('meta_image')) {
            if ($id && $blog->meta_image) {
                $oldImagePath = public_path('storage/' . $blog->meta_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $meta_image = $request->file('meta_image');
            $imageName = time() . '.' . $meta_image->getClientOriginalExtension();
            $meta_image->move(public_path('storage/'), $imageName);
            $blog->meta_image = $imageName;
        }
        $slug = Str::slug($request->title);
        $slugBase = $slug;
        $i = 1;
        while (Blog::where('slug', $slug)->exists()) {
            $slug = $slugBase . '-' . $i;
            $i++;
        }
        $blog->slug = $slug;
        $blog->description = $request->description;
        $blog->is_active = 1;
        $blog->save();
        return redirect()->route('blogss')->with('success', 'blog save successfully');

    }

    public function updateStatus($id)
    {
        $blog = Blog::find($id);
        $blog->is_active = 0;
        $blog->save();
        return redirect()->route('blogss');
    }
}
