<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PpcPackage;
use Illuminate\Http\Request;

class PpcController extends Controller
{
    //
          public function index()
    {
        $ppc = PpcPackage::where('is_active', 1)->get();
        return view('admin.ppc.view', compact('ppc'));
    }

    public function create($id = null)
    {
        $ppc = $id ? PpcPackage::find($id) : null;
        return view('admin.ppc.form', compact('ppc'));
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
            $ppc = PpcPackage::find($id);
        } else {
            $ppc = new PpcPackage();
        }
        $ppc->title = $request->title;
        $ppc->amount = $request->amount;
        $ppc->description = $request->description;
        $ppc->ideal = $request->ideal;
        if ($request->hasFile('image')) {
            if ($id && $ppc->image) {
                $oldImagePath = public_path('storage/' . $ppc->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/'), $imageName);
            $ppc->image = $imageName;
        }
        $ppc->is_active = 1;
        $ppc->save();
        return response()->json([
            'redirect' => route('ppcs')
        ]);
    }

    public function updateStatus($id)
    {
        $ppc = PpcPackage::find($id);
        $ppc->is_active = 0;
        $ppc->save();
        return redirect()->route('ppcs');
    }

}
