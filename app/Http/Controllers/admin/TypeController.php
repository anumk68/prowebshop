<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    //

         public function index()
    {
        $type = Type::get();
        return view('admin.type.view', compact('type'));
    }

    public function create()
    {
        return view('admin.type.form');
    }

    public function save(Request $request)
    {
        $request->validate([
            'type' => 'required',
        ]);
            $type = new Type();

        $type->type = $request->type;
        $type->is_active = 1;
        $type->save();
        return response()->json([
            'redirect' => route('types')
        ]);
    }

    public function updateStatus($id)
    {
        $type = Type::find($id);
        $type->is_active = 0;
        $type->save();
        return redirect()->route('types');
    }
    public function toggleStatus($id)
{
    $item = Type::findOrFail($id);
    $item->is_active = !$item->is_active;
    $item->save();

    return redirect()->back()->with('success', 'Status updated successfully.');
}

}
