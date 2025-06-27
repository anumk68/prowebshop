<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    //
     public function index()
    {
        $blogCategory = BlogCategory::where('is_active', 1)->get();
        return view('admin.blogCategory.view', compact('blogCategory'));
    }

    public function create()
    {
        return view('admin.blogCategory.form');
    }

    public function save(Request $request, $id = null)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
            $blogCategory = new BlogCategory();

        $blogCategory->category_name = $request->category_name;
        $blogCategory->is_active = 1;
        $blogCategory->save();
        return response()->json([
            'redirect' => route('blogCategorys')
        ]);
    }

    public function updateStatus($id)
    {
        $blogCategory = BlogCategory::find($id);
        $blogCategory->is_active = 0;
        $blogCategory->save();
        return redirect()->route('blogCategorys');
    }
}
