<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Package;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function registerForm()
    {
        return view('auth.registerForm');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1,
        ]);
        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            if (auth()->user()->role == 1) {
                return redirect()->route('dashboard');
            }
              Auth::logout();
        return redirect()->back()->withErrors(['email' => 'You are not authorized to login.']);
        }
        return redirect()->back()->withInput($request->only('email'));
    }

    public function dashboard()
    {
        $packages = Package::where('is_active', 1)->count();
        $typess = Type::where('is_active', 1)->count();

        $totalblogs = Blog::where('is_active', 1)->count();
        return view('admin.index',compact('packages','typess','totalblogs'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
