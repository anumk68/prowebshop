<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SeoPackage;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    //
    public function index()
    {
        $seo = SeoPackage::where('is_active', 1)->get();
        return view('admin.seo.view', compact('seo'));
    }

    public function create($id = null)
    {
        $seo = $id ? SeoPackage::find($id) : null;
        return view('admin.seo.form', compact('seo'));
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
            $seo = SeoPackage::find($id);
        } else {
            $seo = new SeoPackage();
        }
        $seo->title = $request->title;
        $seo->amount = $request->amount;
        $seo->description = $request->description;
        $seo->ideal = $request->ideal;
        if ($request->hasFile('image')) {
            if ($id && $seo->image) {
                $oldImagePath = public_path('storage/' . $seo->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/'), $imageName);
            $seo->image = $imageName;
        }
        $seo->is_active = 1;
        $seo->save();
        return response()->json([
            'redirect' => route('seos')
        ]);
    }

    public function updateStatus($id)
    {
        $seo = SeoPackage::find($id);
        $seo->is_active = 0;
        $seo->save();
        return redirect()->route('seos');
    }
}
