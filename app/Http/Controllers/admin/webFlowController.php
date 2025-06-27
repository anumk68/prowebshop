<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\WebFlowWebsitePackage;
use Illuminate\Http\Request;

class webFlowController extends Controller
{
    //
     public function index()
    {
        $webFlow = WebFlowWebsitePackage::where('is_active', 1)->get();
        return view('admin.webFlow.view', compact('webFlow'));
    }

    public function create($id = null)
    {
        $webFlow = $id ? WebFlowWebsitePackage::find($id) : null;
        return view('admin.webFlow.form', compact('webFlow'));
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
            $webFlow = WebFlowWebsitePackage::find($id);
        } else {
            $webFlow = new WebFlowWebsitePackage();
        }
        $webFlow->title = $request->title;
        $webFlow->amount = $request->amount;
        $webFlow->description = $request->description;
        if ($request->hasFile('image')) {
            if ($id && $webFlow->image) {
                $oldImagePath = public_path('storage/' . $webFlow->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/'), $imageName);
            $webFlow->image = $imageName;
        }
        $webFlow->is_active = 1;
        $webFlow->save();
        return response()->json([
            'redirect' => route('webFlows')
        ]);
    }

    public function updateStatus($id)
    {
        $webFlow = WebFlowWebsitePackage::find($id);
        $webFlow->is_active = 0;
        $webFlow->save();
        return redirect()->route('webFlows');
    }
}
