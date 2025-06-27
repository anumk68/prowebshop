<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Meta_Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $titles       = Meta_Setting::where('meta_type', 'title')->get();
        $descriptions = Meta_Setting::where('meta_type', 'description')->get();
        $keywords     = Meta_Setting::where('meta_type', 'keywords')->get();

        return view('admin.setting.meta_setting', compact('titles', 'descriptions', 'keywords'));
    }

    public function meta_store(Request $request)
    {
        $request->validate([
            'meta_type'  => 'required|string|max:255',
            'meta_name'  => 'required|string|max:255',
            'meta_value' => 'required|string',
        ]);

        $save = Meta_Setting::create([
            'meta_type'  => $request->meta_type,
            'meta_name'  => $request->meta_name,
            'meta_value' => $request->meta_value,
        ]);
        if ($save) {
            return redirect()->back()->with('success', 'Meta value added successfully!');

        } else {
            return redirect()->back()->with('error', 'Meta value not added please try again!');

        }
    }

    public function meta_edit($id)
    {
        $meta = Meta_Setting::find($id);
        return view('admin.setting.meta_edit', compact('meta'));
    }

    public function meta_update(Request $request, $id)
    {
        $request->validate([
            'meta_value' => 'required|string',
        ]);

        $update             = Meta_Setting::find($id);
        $update->meta_value = $request->meta_value;
        $update->save();
        if ($update) {
            return redirect()->route('setting')->with('success', 'Meta value updated successfully!');

        } else {
            return redirect()->back()->with('error', 'Meta value not updated!');

        }

    }
}
