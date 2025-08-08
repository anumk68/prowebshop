<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\User;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contact_us()
    {
        $contactus = ContactUs::orderby('created_at', 'desc')->get();
        return view('admin.contactUs.contactUs', compact('contactus'));
    }
public function contact_delete($id)
{
    $contactus = ContactUs::find($id);

    if ($contactus) {
        $contactus->delete();
        return redirect()->back()->with('success', 'Contact deleted successfully.');
    }

    return redirect()->back()->with('error', 'Contact not found.');
}

}
