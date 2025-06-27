<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\WixDevelopmentPackage;
use Illuminate\Http\Request;

class WixController extends Controller
{
    //
      public function index()
    {
        $wix = WixDevelopmentPackage::where('is_active', 1)->get();
        return view('admin.wix.view', compact('wix'));
    }

    public function create($id = null)
    {
        $wix = $id ? WixDevelopmentPackage::find($id) : null;
        return view('admin.wix.form', compact('wix'));
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
            $wix = WixDevelopmentPackage::find($id);
        } else {
            $wix = new WixDevelopmentPackage();
        }
        $wix->title = $request->title;
        $wix->amount = $request->amount;
        $wix->description = $request->description;
        if ($request->hasFile('image')) {
            if ($id && $wix->image) {
                $oldImagePath = public_path('storage/' . $wix->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/'), $imageName);
            $wix->image = $imageName;
        }
        $wix->is_active = 1;
        $wix->save();
        return response()->json([
            'redirect' => route('wixs')
        ]);
    }

    public function updateStatus($id)
    {
        $wix = WixDevelopmentPackage::find($id);
        $wix->is_active = 0;
        $wix->save();
        return redirect()->route('wixs');
    }
}
