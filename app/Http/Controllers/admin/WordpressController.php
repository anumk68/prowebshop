<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\WordpressPackage;
use Illuminate\Http\Request;

class WordpressController extends Controller
{
    //
      public function index()
    {
        $wordpress = WordpressPackage::where('is_active', 1)->get();
        return view('admin.wordpress.view', compact('wordpress'));
    }

    public function create($id = null)
    {
        $wordpress = $id ? WordpressPackage::find($id) : null;
        return view('admin.wordpress.form', compact('wordpress'));
    }

    public function save(Request $request, $id = null)
    {
        $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'ideal' => 'required',
            'image' => 'nullable|image',
        ]);
        if ($id) {
            $wordpress = WordpressPackage::find($id);
        } else {
            $wordpress = new WordpressPackage();
        }
        $wordpress->title = $request->title;
        $wordpress->amount = $request->amount;
        $wordpress->description = $request->description;
        $wordpress->ideal = $request->ideal;
        if ($request->hasFile('image')) {
            if ($id && $wordpress->image) {
                $oldImagePath = public_path('storage/' . $wordpress->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/'), $imageName);
            $wordpress->image = $imageName;
        }
        $wordpress->is_active = 1;
        $wordpress->save();
        return response()->json([
            'redirect' => route('wordpresss')
        ]);
    }

    public function updateStatus($id)
    {
        $wordpress = WordpressPackage::find($id);
        $wordpress->is_active = 0;
        $wordpress->save();
        return redirect()->route('wordpresss');
    }
}
