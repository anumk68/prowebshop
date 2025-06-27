<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ReactDevelopmentPackage;
use Illuminate\Http\Request;

class ReactController extends Controller
{
    //
      public function index()
    {
        $react = ReactDevelopmentPackage::where('is_active', 1)->get();
        return view('admin.react.view', compact('react'));
    }

    public function create($id = null)
    {
        $react = $id ? ReactDevelopmentPackage::find($id) : null;
        return view('admin.react.form', compact('react'));
    }

    public function save(Request $request, $id = null)
    {
        $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);
        if ($id) {
            $react = ReactDevelopmentPackage::find($id);
        } else {
            $react = new ReactDevelopmentPackage();
        }
        $react->title = $request->title;
        $react->amount = $request->amount;
        $react->description = $request->description;
        if ($request->hasFile('image')) {
            if ($id && $react->image) {
                $oldImagePath = public_path('storage/' . $react->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/'), $imageName);
            $react->image = $imageName;
        }
        $react->is_active = 1;
        $react->save();
        return response()->json([
            'redirect' => route('reacts')
        ]);
    }

    public function updateStatus($id)
    {
        $react = ReactDevelopmentPackage::find($id);
        $react->is_active = 0;
        $react->save();
        return redirect()->route('reacts');
    }
}
