<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PhpLaravelPackage;
use Illuminate\Http\Request;

class PhpLaravelController extends Controller
{
    //
    public function index()
    {
        $php = PhpLaravelPackage::where('is_active', 1)->get();
        return view('admin.phpLaravel.view', compact('php'));
    }

    public function create($id = null)
    {
        $php = $id ? PhpLaravelPackage::find($id) : null;
        return view('admin.phpLaravel.form', compact('php'));
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
            $php = PhpLaravelPackage::find($id);
        } else {
            $php = new PhpLaravelPackage();
        }
        $php->title = $request->title;
        $php->amount = $request->amount;
        $php->description = $request->description;
        if ($request->hasFile('image')) {
            if ($id && $php->image) {
                $oldImagePath = public_path('storage/' . $php->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/'), $imageName);
            $php->image = $imageName;
        }
        $php->is_active = 1;
        $php->save();
        return response()->json([
            'redirect' => route('phps')
        ]);
    }

    public function updateStatus($id)
    {
        $php = PhpLaravelPackage::find($id);
        $php->is_active = 0;
        $php->save();
        return redirect()->route('phps');
    }
}
