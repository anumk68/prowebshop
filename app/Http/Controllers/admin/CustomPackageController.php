<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomDevelopmentPackage;
use Illuminate\Http\Request;

class CustomPackageController extends Controller
{
             public function index()
    {
        $customDevelopment = CustomDevelopmentPackage::where('is_active', 1)->get();
        return view('admin.customDevelopment.view', compact('customDevelopment'));
    }

    public function create($id = null)
    {
        $customDevelopment = $id ? CustomDevelopmentPackage::find($id) : null;
        return view('admin.customDevelopment.form', compact('customDevelopment'));
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
            $customDevelopment = CustomDevelopmentPackage::find($id);
        } else {
            $customDevelopment = new CustomDevelopmentPackage();
        }
        $customDevelopment->title = $request->title;
        $customDevelopment->amount = $request->amount;
        $customDevelopment->description = $request->description;
        if ($request->hasFile('image')) {
            if ($id && $customDevelopment->image) {
                $oldImagePath = public_path('storage/' . $customDevelopment->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/'), $imageName);
            $customDevelopment->image = $imageName;
        }
        $customDevelopment->is_active = 1;
        $customDevelopment->save();
        return response()->json([
            'redirect' => route('customDevelopments')
        ]);
    }

    public function updateStatus($id)
    {
        $customDevelopment = CustomDevelopmentPackage::find($id);
        $customDevelopment->is_active = 0;
        $customDevelopment->save();
        return redirect()->route('customDevelopments');
    }
}
