<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Package;
use Illuminate\Http\Request;

class OfferController extends Controller
{
 public function create()
    {
        $packages = Package::all();
        return view('admin.offers.create', compact('packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'title' => 'required|string|max:255',
           'discount' => 'required|numeric|min:0|max:100',

            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Offer::create($request->all());

        return redirect()->route('admin.offers.index')->with('success', 'Offer created successfully.');
    }

    public function index()
{
    $offers = Offer::with('package')->latest()->get();
    return view('admin.offers.list', compact('offers'));
}



public function destroy($id)
{
    $offer = Offer::findOrFail($id);
    $offer->delete();

    return redirect()->route('admin.offers.index')->with('success', 'Offer deleted successfully.');
}



public function edit($id)
{
    $offer = Offer::findOrFail($id);
    $packages = Package::all();

    return view('admin.offers.edit', compact('offer', 'packages'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'package_id' => 'required|exists:packages,id',
        'title' => 'required|string|max:255',
       'discount' => 'required|numeric|min:0|max:100',

        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
    ]);

    $offer = Offer::findOrFail($id);
    $offer->update($request->all());

    return redirect()->route('admin.offers.index')->with('success', 'Offer updated successfully.');
}

}
