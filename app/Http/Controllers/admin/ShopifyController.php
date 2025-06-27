<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ShopifyPackage;
use Illuminate\Http\Request;

class ShopifyController extends Controller
{
    //
         public function index()
    {
        $shopify = ShopifyPackage::where('is_active', 1)->get();
        return view('admin.shopify.view', compact('shopify'));
    }

    public function create($id = null)
    {
        $shopify = $id ? ShopifyPackage::find($id) : null;
        return view('admin.shopify.form', compact('shopify'));
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
            $shopify = ShopifyPackage::find($id);
        } else {
            $shopify = new ShopifyPackage();
        }
        $shopify->title = $request->title;
        $shopify->amount = $request->amount;
        $shopify->description = $request->description;
        if ($request->hasFile('image')) {
            if ($id && $shopify->image) {
                $oldImagePath = public_path('storage/' . $shopify->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/'), $imageName);
            $shopify->image = $imageName;
        }
        $shopify->is_active = 1;
        $shopify->save();
        return response()->json([
            'redirect' => route('shopifys')
        ]);
    }

    public function updateStatus($id)
    {
        $shopify = ShopifyPackage::find($id);
        $shopify->is_active = 0;
        $shopify->save();
        return redirect()->route('shopifys');
    }
}
