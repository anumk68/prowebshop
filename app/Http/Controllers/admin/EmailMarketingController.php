<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\EmailMarketingPackage;
use Illuminate\Http\Request;

class EmailMarketingController extends Controller
{  
    public function index()
    {
        $emailMarketing = EmailMarketingPackage::where('is_active', 1)->get();
        return view('admin.emailMarketing.view', compact('emailMarketing'));
    }

    public function create($id = null)
    {
        $emailMarketing = $id ? EmailMarketingPackage::find($id) : null;
        return view('admin.emailMarketing.form', compact('emailMarketing'));
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
            $emailMarketing = EmailMarketingPackage::find($id);
        } else {
            $emailMarketing = new EmailMarketingPackage();
        }
        $emailMarketing->title = $request->title;
        $emailMarketing->amount = $request->amount;
        $emailMarketing->description = $request->description;
        $emailMarketing->ideal = $request->ideal;
        if ($request->hasFile('image')) {
            if ($id && $emailMarketing->image) {
                $oldImagePath = public_path('storage/' . $emailMarketing->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/'), $imageName);
            $emailMarketing->image = $imageName;
        }
        $emailMarketing->is_active = 1;
        $emailMarketing->save();
        return response()->json([
            'redirect' => route('emailMarketings')
        ]);
    }

    public function updateStatus($id)
    {
        $emailMarketing = EmailMarketingPackage::find($id);
        $emailMarketing->is_active = 0;
        $emailMarketing->save();
        return redirect()->route('emailMarketings');
    }
}
