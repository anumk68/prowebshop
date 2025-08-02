<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class AuthController extends Controller
{
    public function register()
    {
        return view('frontend.auth.register');
    }
    public function register_store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|min:2|max:15',
            'lastName' => 'min:2|max:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $user = User::create([
            'name' => $request->firstName . ' ' . $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2,
        ]);
        if ($user->role == 2) {
            Auth()->guard('userWeb')->login($user);
        } else {
            return redirect()->back()->with('error', 'You are not authorized to login.');
        }
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'hardeepsingh.digirush@gmail.com';
            $mail->Password = 'fkithynhakninddq';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('hardeepsingh.digirush@gmail.com', 'Hardeep');
            $mail->addAddress($user->email, $user->name);
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to Our ProWebShop!';
            $mail->Body = view('frontend.emails.welcomemail', ['user' => $user])->render();
            $mail->send();
        } catch (Exception $e) {
            \Log::error("Mail send failed: " . $mail->ErrorInfo);
        }

        return redirect()->route('/')->with('success', 'Register Successfully');
    }

    public function login_form()
    {
        return view('frontend.auth.login');
    }


    public function user_login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);
        if (
            auth()->guard('userWeb')->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])
        ) {
            $user = auth()->guard('userWeb')->user();
            if ($user->role == 2) {
                $request->session()->regenerate();
                $sessionCart = session('cart', []);
                foreach ($sessionCart as $item) {
                    $existing = DB::table('carts')
                        ->where('user_id', $user->id)
                        ->where('package_id', $item['package_id'])
                        ->first();
                    if ($existing) {
                        DB::table('carts')
                            ->where('id', $existing->id)
                            ->update(['quantity' => $existing->quantity + $item['quantity']]);
                    } else {
                        DB::table('carts')->insert([
                            'user_id' => $user->id,
                            'package_id' => $item['package_id'],
                            'quantity' => $item['quantity'],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
                session()->forget('cart');
                return redirect()->intended('cart')->with('success', 'Login Successfully');
            } else {
                auth()->guard('userWeb')->logout();
                return redirect()->back()->with('error', 'You are not authorized to login.');
            }
        }
        return redirect()->back()->with('error', 'Invalid email or password.');
    }




    //     public function user_login(Request $request)
// {
//     $request->validate([
//         'email' => 'required|exists:users,email',
//         'password' => 'required',
//     ]);
//     if (auth()->guard('userWeb')->attempt([
//         'email' => $request->email,
//         'password' => $request->password,
//     ])) {
//         $user = auth()->guard('userWeb')->user();
//         if ($user->role == 2) {
//             $request->session()->regenerate();
//             return redirect()->intended(route('/'))->with('success', 'Login Successfully');
//         } else {
//             auth()->guard('userWeb')->logout();
//             return redirect()->back()->with('error', 'You are not authorized to login.');
//         }
//     }
//     return redirect()->back()->with('error', 'Invalid email or password.');
// }

    public function user_logout(Request $request)
    {
        Auth()->guard('userWeb')->logout();
        return redirect()->route('/');
    }

}
