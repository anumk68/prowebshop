<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\ContactUs;
use App\Models\Package;
use App\Models\PhpLaravelPackage;
use App\Models\Type;
use App\Models\WebFlowWebsitePackage;
use App\Models\WordpressPackage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;

class IndexController extends Controller
{
    //
    public function index()
    {

        $php               = Package::where('is_active', 1)->where('type', 1)->get();
        $react             = Package::where('is_active', 1)->where('type', 2)->get();
        $shopify           = Package::where('is_active', 1)->where('type', 3)->get();
        $customDevelopment = Package::where('is_active', 1)->where('type', 4)->get();
        $webFlow           = Package::where('is_active', 1)->where('type', 5)->get();
        $wix               = Package::where('is_active', 1)->where('type', 6)->get();
        $wordpress         = Package::where('is_active', 1)->where('type', 7)->get();
        $graphic           = Package::where('is_active', 1)->where('type', 8)->get();
        $seo               = Package::where('is_active', 1)->where('type', 9)->get();
        $ppc               = Package::where('is_active', 1)->where('type', 10)->get();
        $smo               = Package::where('is_active', 1)->where('type', 11)->get();
        $emailMarkeitng    = Package::where('is_active', 1)->where('type', 12)->get();
        $blogssss          = Blog::where('is_active', 1)->orderby('created_at', 'desc')->limit(3)->get();

        return view('frontend.index', compact('php', 'webFlow', 'wordpress', 'customDevelopment', 'shopify', 'wix', 'react', 'graphic', 'seo', 'ppc', 'smo', 'emailMarkeitng', 'blogssss'));
    }

    public function about()
    {
        $php       = PhpLaravelPackage::where('is_active', 1)->get();
        $webFlow   = WebFlowWebsitePackage::where('is_active', 1)->get();
        $wordpress = WordpressPackage::where('is_active', 1)->get();
        return view('frontend.about', compact('php', 'webFlow', 'wordpress'));
    }

    public function phpLaravel()
    {

        $php = Package::where('is_active', 1)->where('type', 1)->get();
        return view('frontend.php-laravel-website', compact('php'));
    }

    public function reactJava()
    {
        $react = Package::where('is_active', 1)->where('type', 2)->get();
        return view('frontend.react-java-website', compact('react'));
    }

    public function shopify()
    {
        $shopify = Package::where('is_active', 1)->where('type', 3)->get();
        return view('frontend.shopify-website', compact('shopify'));
    }

    public function customWebsite()
    {
        $customDevelopment = Package::where('is_active', 1)->where('type', 4)->get();
        return view('frontend.custom-devlopment', compact('customDevelopment'));
    }

    public function webFlow()
    {
        $webFlow = Package::where('is_active', 1)->where('type', 5)->get();
        return view('frontend.webflow-devlopment', compact('webFlow'));
    }

    public function wixWebsite()
    {
        $wix = Package::where('is_active', 1)->where('type', 6)->get();
        return view('frontend.wix-website', compact('wix'));
    }

    public function wordpressWebsite()
    {
        $wordpress = Package::where('is_active', 1)->where('type', 7)->get();
        return view('frontend.wordpress-website', compact('wordpress'));
    }

    public function graphic()
    {
        $graphic = Package::where('is_active', 1)->where('type', 8)->get();
        return view('frontend.graphic', compact('graphic'));
    }

    public function seo()
    {$seo = Package::where('is_active', 1)->where('type', 9)->get();
        return view('frontend.seo-services', compact('seo'));}

    public function ppc()
    {
        $ppc = Package::where('is_active', 1)->where('type', 10)->get();

        return view('frontend.ppc-service', compact('ppc'));
    }

    public function smo()
    {
        $smo = Package::where('is_active', 1)->where('type', 11)->get();

        return view('frontend.smo-service', compact('smo'));
    }

    public function emailMarketing()
    {
        $emailMarkeitng = Package::where('is_active', 1)->where('type', 12)->get();
        return view('frontend.email-marketing', compact('emailMarkeitng'));
    }

    public function blog()
    {
        $blogssss = Blog::where('is_active', 1)->inRandomOrder()->get();
        return view('frontend.blog', compact('blogssss'));
    }

    public function blog_detail($slug)
    {
        $blogDetails = Blog::where('is_active', 1)->where('slug', $slug)->first();
        $recentBlogs = Blog::where('is_active', 1)->orderby('created_at', 'desc')->limit(5)->get();

        if ($blogDetails) {
            return view('frontend.blog-detail', compact('blogDetails', 'recentBlogs'));

        } else {
            return redirect()->route('blogs');

        }
    }

    public function contactUs()
    {
        $services_type = Type::where('is_active', '1')->get();
        return view('frontend.contact_us', compact('services_type'));
    }

    public function contactUsStore(Request $request)
    {
        $request->validate([
            'name'     => ['required',
                'regex:/^[A-Za-z\s]+$/',
                'max:255',
            ],
            'phone'    => 'required|digits:10',
            'email'    => 'required|email',
            'services' => 'required|string|max:255',
        ]);
        $data           = new ContactUs();
        $data->name     = $request->name;
        $data->phone    = $request->phone;
        $data->email    = $request->email;
        $data->services = $request->services;
        $save           = $data->save();

        if ($save) {
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'hardeepsingh.digirush@gmail.com';
                $mail->Password   = 'fkithynhakninddq';
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;

                $mail->setFrom('hardeepsingh.digirush@gmail.com', 'Hardeep');
                $mail->addAddress($request->email, $request->name);

                $mail->isHTML(true);
                $mail->Subject = 'Thank You for Contacting Us';

                $mail->Body = "
                <h2>Hi {$request->name},</h2>
                <p>Thank you for reaching out to us!</p>
                <p><strong>Phone:</strong> {$request->phone}</p>
                <p><strong>Email:</strong> {$request->email}</p>
                <p><strong>Service:</strong> {$request->services}</p>
                <br>
                <p>We will get back to you shortly.</p>
                <br>
                <p>Regards,<br>ProWebShop Team</p>
            ";

                $mail->send();
            } catch (Exception $e) {
                \Log::error("Mail send failed: " . $mail->ErrorInfo);
                return redirect()->back()->with('error', 'Form saved, but email not sent.');
            }

            return redirect()->back()->with('success', 'Your form has been submitted successfully');
        } else {
            return redirect()->back()->with('error', 'Oops! Something went wrong. Please try again.');
        }
    }

    public function cart(Request $request)
    {
        $userId = auth()->guard('userWeb')->user();
        if (! $userId) {
            return view('frontend.auth.login');
        } else {
            $carts = DB::table('carts')
                ->join('packages', 'carts.package_id', '=', 'packages.id')
                ->join('types', 'packages.type', '=', 'types.id')
                ->where('carts.user_id', $userId->id)
                ->orderBy('carts.created_at', 'DESC')
                ->select('carts.*', 'packages.title', 'packages.amount', 'packages.image', 'types.type')
                ->get();

            return view('frontend.cart', compact('carts'));
        }
    }
    public function addToCart(Request $request)
    {
        $user = auth()->guard('userWeb')->user();

        if (! $user) {
            return redirect()->back()->with('error', 'Please login to add items to cart.');
        }

        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        $existing = Cart::where('user_id', $user->id)
            ->where('package_id', $request->package_id)
            ->first();

        if ($existing) {
            $existing->quantity += $request->quantity;
            $existing->save();
        } else {
            Cart::create([
                'user_id'    => $user->id,
                'product_id' => $request->product_id ?? null,
                'package_id' => $request->package_id,
                'quantity'   => $request->quantity,
            ]);
        }

        return redirect()->route('cart')->with('success', 'Product added to cart!');
    }

    public function updateQuantity(Request $request)
    {
        $user = auth()->guard('userWeb')->user();

        if (! $user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        $cart = Cart::where('user_id', $user->id)
            ->where('package_id', $request->package_id)
            ->first();

        if ($cart) {
            $cart->quantity = $request->quantity;
            $cart->save();
            return response()->json(['success' => true, 'message' => 'Quantity updated']);
        }

        return response()->json(['error' => 'Item not found'], 404);
    }

    public function removeFromCart(Request $request)
    {
        $user = auth()->guard('userWeb')->user();

        if (! $user) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        $cart = Cart::where('user_id', $user->id)
            ->where('package_id', $request->package_id)
            ->first();

        if ($cart) {
            $cart->delete();
            return redirect()->back()->with('success', 'Item removed from cart.');
        }

        return redirect()->back()->with('error', 'Item not found.');
    }

    public function cart_amount_totals()
    {
        $user = auth()->guard('userWeb')->user();
        if (! $user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $carts    = \App\Models\Cart::with('package')->where('user_id', $user->id)->get();
        $subtotal = 0;
        foreach ($carts as $cart) {
            $priceParts = explode(' ', $cart->package->amount);
            $firstPrice = $priceParts[0] ?? '$0';
            $unit       = (float) filter_var($firstPrice, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $subtotal += $unit * $cart->quantity;
        }

        return response()->json([
            'subtotal' => '$' . number_format($subtotal, 2),
            'total'    => '$' . number_format($subtotal, 2),
        ]);
    }

    public function checkout()
    {
        $user = Auth::guard('userWeb')->user();
        if ($user) {
            $cartItems = DB::table('carts')
                ->join('packages', 'carts.package_id', '=', 'packages.id')
                ->join('types', 'packages.type', '=', 'types.id')
                ->where('carts.user_id', $user->id)
                ->orderBy('carts.created_at', 'DESC')
                ->select('carts.*', 'packages.title', 'packages.amount as package_amount', 'packages.image', 'types.type')
                ->get();
            $subtotal = $cartItems->sum(function ($item) {
                $amount = floatval(str_replace(['$', ','], '', $item->package_amount));
                return $amount * $item->quantity;
            });
            $total = $subtotal;
            return view('frontend.checkout', compact('cartItems', 'subtotal', 'total'));
        } else {
            return redirect()->route('user.login.get')->with('error', 'Please login!');
        }
    }

}
