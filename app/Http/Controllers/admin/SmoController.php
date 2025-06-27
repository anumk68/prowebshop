<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SmoPackage;
use Illuminate\Http\Request;

class SmoController extends Controller
{
    //
      public function index()
    {
        $smo = SmoPackage::where('is_active', 1)->get();
        return view('admin.smo.view', compact('smo'));
    }

    public function create($id = null)
    {
        $smo = $id ? SmoPackage::find($id) : null;
        return view('admin.smo.form', compact('smo'));
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
            $smo = SmoPackage::find($id);
        } else {
            $smo = new SmoPackage();
        }
        $smo->title = $request->title;
        $smo->amount = $request->amount;
        $smo->description = $request->description;
        $smo->ideal = $request->ideal;
        if ($request->hasFile('image')) {
            if ($id && $smo->image) {
                $oldImagePath = public_path('storage/' . $smo->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/'), $imageName);
            $smo->image = $imageName;
        }
        $smo->is_active = 1;
        $smo->save();
        return response()->json([
            'redirect' => route('smos')
        ]);
    }

    public function updateStatus($id)
    {
        $smo = SmoPackage::find($id);
        $smo->is_active = 0;
        $smo->save();
        return redirect()->route('smos');
    }
}
