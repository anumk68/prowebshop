<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Type;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    //
        public function index()
    {
        $package = Package::get();
        return view('admin.package.view', compact('package'));
    }

    public function create($id = null)
    {
        $package = $id ? Package::find($id) : null;
        $packagetype = Type::where('is_active',1)->get();
        return view('admin.package.form', compact('package','packagetype'));
    }

   public function save(Request $request, $id = null)
{
    $request->validate([
        'type' => 'required',
        'title' => 'required',
        'amount' => 'required',
        'description' => 'required',
        'ideal' => 'nullable',
        'image' => 'nullable|image',
    ]);

    $isUpdate = $id ? true : false;

    // Create or Find Existing Package
    $package = $isUpdate ? Package::findOrFail($id) : new Package();

    // Assign Data
    $package->type = $request->type;
    $package->title = $request->title;
    $package->amount = $request->amount;
    $package->description = $request->description;
    $package->ideal = $request->ideal;
    $package->is_active = 1;

    // Handle Image Upload
    if ($request->hasFile('image')) {
        if ($isUpdate && $package->image) {
            $oldImagePath = public_path('storage/' . $package->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/'), $imageName);
        $package->image = $imageName;
    }

    $package->save();

    $message = $isUpdate ? 'Package updated successfully' : 'Package added successfully';
    return redirect()->route('packages')->with('success', $message);
}

    public function updateStatus($id)
{
    $package = Package::findOrFail($id);
    $package->is_active = !$package->is_active;
    $package->save();

    return redirect()->back()->with('success', 'Package status updated.');
}



}
