<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\GraphicDesign;
use Illuminate\Http\Request;

class GraphicController extends Controller
{
    //
      public function index()
    {
        $graphic = GraphicDesign::where('is_active', 1)->get();
        return view('admin.graphic.view', compact('graphic'));
    }

    public function create($id = null)
    {
        $graphic = $id ? GraphicDesign::find($id) : null;
        return view('admin.graphic.form', compact('graphic'));
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
            $graphic = GraphicDesign::find($id);
        } else {
            $graphic = new GraphicDesign();
        }
        $graphic->title = $request->title;
        $graphic->amount = $request->amount;
        $graphic->description = $request->description;
        $graphic->ideal = $request->ideal;
        if ($request->hasFile('image')) {
            if ($id && $graphic->image) {
                $oldImagePath = public_path('storage/' . $graphic->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/'), $imageName);
            $graphic->image = $imageName;
        }
        $graphic->is_active = 1;
        $graphic->save();
        return response()->json([
            'redirect' => route('graphics')
        ]);
    }

    public function updateStatus($id)
    {
        $graphic = GraphicDesign::find($id);
        $graphic->is_active = 0;
        $graphic->save();
        return redirect()->route('graphics');
    }
}
