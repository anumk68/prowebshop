<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\ContactUs;
use App\Models\Meta_Setting;
use App\Models\Order;
use App\Models\OrderItem;
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

        $php = Package::where('is_active', 1)->where('type', 1)->get();
        $react = Package::where('is_active', 1)->where('type', 2)->get();
        $shopify = Package::where('is_active', 1)->where('type', 3)->get();
        $customDevelopment = Package::where('is_active', 1)->where('type', 4)->get();
        $webFlow = Package::where('is_active', 1)->where('type', 5)->get();
        $wix = Package::where('is_active', 1)->where('type', 6)->get();
        $wordpress = Package::where('is_active', 1)->where('type', 7)->get();
        $graphic = Package::where('is_active', 1)->where('type', 8)->get();
        $seo = Package::where('is_active', 1)->where('type', 9)->get();
        $ppc = Package::where('is_active', 1)->where('type', 10)->get();
        $smo = Package::where('is_active', 1)->where('type', 11)->get();
        $emailMarkeitng = Package::where('is_active', 1)->where('type', 12)->get();
        $blogssss = Blog::where('is_active', 1)->orderby('created_at', 'desc')->limit(3)->get();
        $meta_title = Meta_Setting::where('meta_name', 'title_home')->first();
        $meta_description = Meta_Setting::where('meta_name', 'description_home')->first();

        return view('frontend.index', compact('meta_title', 'meta_description', 'php', 'webFlow', 'wordpress', 'customDevelopment', 'shopify', 'wix', 'react', 'graphic', 'seo', 'ppc', 'smo', 'emailMarkeitng', 'blogssss'));
    }

    public function about()
    {
        $php = PhpLaravelPackage::where('is_active', 1)->get();
        $webFlow = WebFlowWebsitePackage::where('is_active', 1)->get();
        $wordpress = WordpressPackage::where('is_active', 1)->get();
        $meta_title = Meta_Setting::where('meta_name', 'title_about')->first();
        $meta_description = Meta_Setting::where('meta_name', 'description_about')->first();
        return view('frontend.about', compact('php', 'webFlow', 'wordpress', 'meta_title', 'meta_description'));
    }

    public function phpLaravel()
    {
        $meta_title = Meta_Setting::where('meta_name', 'title_php_laravel')->first();
        $meta_description = Meta_Setting::where('meta_name', 'description_php_laravel')->first();
        $php = Package::where('is_active', 1)->where('type', 1)->get();
        return view('frontend.php-laravel-website', compact('php', 'meta_title', 'meta_description'));
    }

    public function reactJava()
    {
        $meta_title = Meta_Setting::where('meta_name', 'title_java_react_packages')->first();
        $meta_description = Meta_Setting::where('meta_name', 'description_java_react_packages')->first();
        $react = Package::where('is_active', 1)->where('type', 2)->get();
        return view('frontend.react-java-website', compact('react', 'meta_title', 'meta_description'));
    }

    public function shopify()
    {
        $meta_title = Meta_Setting::where('meta_name', 'title_shopify_development')->first();
        $meta_description = Meta_Setting::where('meta_name', 'description_shopify_development')->first();
        $shopify = Package::where('is_active', 1)->where('type', 3)->get();
        return view('frontend.shopify-website', compact('shopify', 'meta_title', 'meta_description'));
    }

    public function customWebsite()
    {
        $meta_title = Meta_Setting::where('meta_name', 'title_custom_website_development_packages')->first();
        $meta_description = Meta_Setting::where('meta_name', 'description_custom_website_development_packages')->first();
        $customDevelopment = Package::where('is_active', 1)->where('type', 4)->get();
        return view('frontend.custom-devlopment', compact('customDevelopment', 'meta_title', 'meta_description'));
    }

    public function webFlow()
    {
        $meta_title = Meta_Setting::where('meta_name', 'title_affordable_webflow_packages')->first();
        $meta_description = Meta_Setting::where('meta_name', 'description_affordable_webflow_packages')->first();
        $webFlow = Package::where('is_active', 1)->where('type', 5)->get();
        return view('frontend.webflow-devlopment', compact('webFlow', 'meta_title', 'meta_description'));
    }

    public function wixWebsite()
    {
        $meta_title = Meta_Setting::where('meta_name', 'title_wix-website-development')->first();
        $meta_description = Meta_Setting::where('meta_name', 'description_wix-website-development')->first();
        $wix = Package::where('is_active', 1)->where('type', 6)->get();
        return view('frontend.wix-website', compact('wix', 'meta_title', 'meta_description'));
    }

    public function wordpressWebsite()
    {
        $meta_title = Meta_Setting::where('meta_name', 'title_wordpress_packages')->first();
        $meta_description = Meta_Setting::where('meta_name', 'description_wordpress_packages')->first();
        $wordpress = Package::where('is_active', 1)->where('type', 7)->get();
        return view('frontend.wordpress-website', compact('wordpress', 'meta_title', 'meta_description'));
    }


    public function graphic()
    {
        $meta_title = Meta_Setting::where('meta_name', 'title_packages_for_graphic_design')->first();
        $meta_description = Meta_Setting::where('meta_name', 'description_packages_for_graphic_design')->first();
        $graphic = Package::where('is_active', 1)->where('type', 8)->get();
        return view('frontend.graphic', compact('graphic', 'meta_title', 'meta_description'));
    }

    public function seo()
    {
        $meta_title = Meta_Setting::where('meta_name', 'title_affordable_seo_packages')->first();
        $meta_description = Meta_Setting::where('meta_name', 'description_affordable_seo_packages')->first();
        $seo = Package::where('is_active', 1)->where('type', 9)->get();
        return view('frontend.seo-services', compact('seo', 'meta_title', 'meta_description'));
    }

    public function ppc()
    {
        $meta_title = Meta_Setting::where('meta_name', 'title_ppc_advertising_packages')->first();
        $meta_description = Meta_Setting::where('meta_name', 'description_ppc_advertising_packages')->first();
        $ppc = Package::where('is_active', 1)->where('type', 10)->get();

        return view('frontend.ppc-service', compact('ppc', 'meta_title', 'meta_description'));
    }

    public function smo()
    {
        $meta_title = Meta_Setting::where('meta_name', 'title_best_smo_packages')->first();
        $meta_description = Meta_Setting::where('meta_name', 'description_best_smo_packages')->first();
        $smo = Package::where('is_active', 1)->where('type', 11)->get();

        return view('frontend.smo-service', compact('smo', 'meta_title', 'meta_description'));
    }

    public function emailMarketing()
    {
        $meta_title = Meta_Setting::where('meta_name', 'title_email_marketing_packages')->first();
        $meta_description = Meta_Setting::where('meta_name', 'description_email_marketing_packages')->first();
        $emailMarkeitng = Package::where('is_active', 1)->where('type', 12)->get();
        return view('frontend.email-marketing', compact('emailMarkeitng', 'meta_title', 'meta_description'));
    }

    public function blog()
    {
        $blogssss = Blog::where('is_active', 1)->orderBy('id', 'desc')->get();
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
        $meta_title = Meta_Setting::where('meta_name', 'title_contact_us')->first();
        $meta_description = Meta_Setting::where('meta_name', 'description_contact_us')->first();
        $services_type = Type::where('is_active', '1')->get();
        return view('frontend.contact_us', compact('services_type', 'meta_title', 'meta_description'));
    }

    public function contactUsStore(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'regex:/^[A-Za-z\s]+$/',
                'max:255',
            ],
            'phone' => 'required|digits:10',
            'email' => 'required|email|unique:contact_us,email',
            'services' => 'required|string|max:255',
        ]);
        $data = new ContactUs();
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->services = $request->services;
        $save = $data->save();

        if ($save) {
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

    // public function cart(Request $request)
    // {
    //     // $userId = auth()->guard('userWeb')->user();
    //     // if (!$userId) {
    //     //     return view('frontend.auth.login');
    //     // } else {
    //     //     $carts = DB::table('carts')
    //     //         ->join('packages', 'carts.package_id', '=', 'packages.id')
    //     //         ->join('types', 'packages.type', '=', 'types.id')
    //     //         ->where('carts.user_id', $userId->id)
    //     //         ->orderBy('carts.created_at', 'DESC')
    //     //         ->select('carts.*', 'packages.title', 'packages.amount', 'packages.image', 'types.type')
    //     //         ->get();
    //     $package = Package::findOrFail($request->id);
    //     $carts = collect([$package]);

    //     return view('frontend.cart', compact('carts'));
    // }

    // public function cart(Request $request)
    // {
    //     $carts = DB::table('carts')
    //         ->join('packages', 'carts.package_id', '=', 'packages.id')
    //         ->join('types', 'packages.type', '=', 'types.id')
    //         // ->where('carts.user_id', $userId->id)
    //         ->orderBy('carts.created_at', 'DESC')
    //         ->select('carts.*', 'packages.title', 'packages.amount', 'packages.image', 'types.type')
    //         ->get();
    //     return view('frontend.cart', compact('carts'));

    // }

    // public function cart(Request $request)
    // {
    //     $user = Auth::guard('userWeb')->user();
    //     if ($user) {
    //         // Logged-in user cart
    //         $carts = DB::table('carts')
    //             ->join('packages', 'carts.package_id', '=', 'packages.id')
    //             ->join('types', 'packages.type', '=', 'types.id')
    //             ->where('carts.user_id', $user->id)
    //             ->orderBy('carts.created_at', 'DESC')
    //             ->select(
    //                 'carts.id',
    //                 'carts.package_id',
    //                 'carts.quantity',
    //                 'packages.title',
    //                 'packages.amount',
    //                 'packages.image',
    //                 'types.type'
    //             )
    //             ->get();
    //     } else {
    //         // Guest user cart (session)
    //         $sessionCart = session()->get('cart', []);
    //         $carts = collect($sessionCart)->map(function ($item) {
    //             $package = Package::with('typess')->find($item['package_id']);
    //             if ($package) {
    //                 return (object) [
    //                     'id' => null,
    //                     'package_id' => $package->id,
    //                     'quantity' => $item['quantity'],
    //                     'title' => $package->title,
    //                     'amount' => $package->amount,
    //                     'image' => $package->image,
    //                     'type' => optional($package->typeRelation)->type,
    //                 ];
    //             }
    //             return null;
    //         })->filter()->values();
    //     }
    //     return view('frontend.cart', compact('carts'));
    // }

    public function cart(Request $request)
    {
        $user = Auth::guard('userWeb')->user();
        if ($user) {
            $carts = DB::table('carts')
                ->join('packages', 'carts.package_id', '=', 'packages.id')
                ->join('types', 'packages.type', '=', 'types.id')
                ->where('carts.user_id', $user->id)
                ->orderBy('carts.created_at', 'DESC')
                ->select('carts.*', 'packages.title', 'packages.amount', 'packages.image', 'types.type')
                ->get();
        } else {
            $sessionCart = session()->get('cart', []);
            $carts = collect($sessionCart)->map(function ($item) {
                $package = Package::with('typess')->find($item['package_id']);
                if ($package) {
                    return (object) [
                        'id' => null,
                        'package_id' => $package->id,
                        'quantity' => $item['quantity'],
                        'title' => $package->title,
                        'amount' => $package->amount,
                        'image' => $package->image,
                        'type' => optional($package->typeRelation)->type,
                    ];
                }
                return null;
            })->filter();
        }
        return view('frontend.cart', compact('carts'));
    }



    // public function addToCart(Request $request)
    // {
    //     $user = auth()->guard('userWeb')->user();

    //     if (!$user) {
    //         return redirect()->back()->with('error', 'Please login to add items to cart.');
    //     }

    //     $request->validate([
    //         'package_id' => 'required|exists:packages,id',
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     $existing = Cart::where('user_id', $user->id)
    //         ->where('package_id', $request->package_id)
    //         ->first();

    //     if ($existing) {
    //         $existing->quantity += $request->quantity;
    //         $existing->save();
    //     } else {
    //         Cart::create([
    //             'user_id' => $user->id,
    //             'product_id' => $request->product_id ?? null,
    //             'package_id' => $request->package_id,
    //             'quantity' => $request->quantity,
    //         ]);
    //     }

    //     return redirect()->route('cart')->with('success', 'Product added to cart!');
    // }


    public function addToCart(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::guard('userWeb')->user();

        if ($user) {
            // Logged-in user - database cart
            $existing = Cart::where('user_id', $user->id)
                ->where('package_id', $request->package_id)
                ->first();

            if ($existing) {
                $existing->quantity += $request->quantity;
                $existing->save();
                return redirect()->route('cart')->with('success', 'Quantity updated in your cart!');
            }

            Cart::create([
                'user_id' => $user->id,
                'package_id' => $request->package_id,
                'quantity' => $request->quantity,
            ]);
        } else {
            // Guest user - session cart
            $cart = session()->get('cart', []);

            if (isset($cart[$request->package_id])) {
                // If package already in cart, update quantity
                $cart[$request->package_id]['quantity'] += $request->quantity;
            } else {
                // Otherwise, create new entry
                $cart[$request->package_id] = [
                    'package_id' => $request->package_id,
                    'quantity' => $request->quantity,
                ];
            }

            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Product added to cart!');
    }



    // public function addToCart(Request $request)
    // {
    //     $request->validate([
    //         'package_id' => 'required|exists:packages,id',
    //         'quantity' => 'required|integer|min:1',
    //     ]);
    //     $user = Auth::guard('userWeb')->user();
    //     if ($user) {
    //         $existing = Cart::where('user_id', $user->id)
    //             ->where('package_id', $request->package_id)
    //             ->first();
    //         if ($existing) {
    //             $existing->quantity += $request->quantity;
    //             $existing->save();
    //         } else {
    //             Cart::create([
    //                 'user_id' => $user->id,
    //                 'package_id' => $request->package_id,
    //                 'quantity' => $request->quantity,
    //             ]);
    //         }
    //     } else {
    //         $cart = session()->get('cart', []);
    //         $found = false;
    //         foreach ($cart as &$item) {
    //             if ($item['package_id'] == $request->package_id) {
    //                 $item['quantity'] += $request->quantity;
    //                 $found = true;
    //                 break;
    //             }
    //         }
    //         if (!$found) {
    //             $cart[] = [
    //                 'package_id' => $request->package_id,
    //                 'quantity' => $request->quantity,
    //             ];
    //         }
    //         session()->put('cart', $cart);
    //     }
    //     return redirect()->route('cart')->with('success', 'Product added to cart!');
    // }


    public function updateQuantity(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = auth()->guard('userWeb')->user();

        if ($user) {
            $cart = Cart::where('user_id', $user->id)
                ->where('package_id', $request->package_id)
                ->first();

            if ($cart) {
                $cart->quantity = $request->quantity;
                $cart->save();
                return response()->json(['success' => true, 'message' => 'Quantity updated']);
            }
            return response()->json(['error' => 'Item not found'], 404);
        } else {
            $cart = session()->get('cart', []);
            $found = false;

            // Check both associative & numeric array cases
            foreach ($cart as $key => $item) {
                if ((isset($item['package_id']) && $item['package_id'] == $request->package_id) || $key == $request->package_id) {
                    $cart[$key]['quantity'] = $request->quantity;
                    $found = true;
                    break;
                }
            }

            if ($found) {
                session()->put('cart', $cart);
                return response()->json(['success' => true, 'message' => 'Quantity updated']);
            }

            return response()->json(['error' => 'Item not found'], 404);
        }
    }




    // public function updateQuantity(Request $request)
    // {
    //     $user = auth()->guard('userWeb')->user();
    //     if (!$user) {
    //         return response()->json(['error' => 'Please first login or register to add more packages into cart.'], 401);
    //     }
    //     $request->validate([
    //         'package_id' => 'required|exists:packages,id',
    //         'quantity' => 'required|integer|min:1',
    //     ]);
    //     $cart = Cart::where('user_id', $user->id)
    //         ->where('package_id', $request->package_id)
    //         ->first();
    //     if ($cart) {
    //         $cart->quantity = $request->quantity;
    //         $cart->save();
    //         return response()->json(['success' => true, 'message' => 'Quantity updated']);
    //     }
    //     return response()->json(['error' => 'Item not found'], 404);
    // }


    public function removeFromCart(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
        ]);

        $user = auth()->guard('userWeb')->user();

        if ($user) {
            $cart = Cart::where('user_id', $user->id)
                ->where('package_id', $request->package_id)
                ->first();

            if ($cart) {
                $cart->delete();
                return redirect()->back()->with('success', 'Item removed from cart.');
            }
            return redirect()->back()->with('error', 'Item not found.');
        } else {
            $cart = session()->get('cart', []);
            $found = false;

            // Check both associative & numeric array cases
            foreach ($cart as $key => $item) {
                if ((isset($item['package_id']) && $item['package_id'] == $request->package_id) || $key == $request->package_id) {
                    unset($cart[$key]);
                    $found = true;
                    break;
                }
            }

            if ($found) {
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Item removed from cart.');
            }

            return redirect()->back()->with('error', 'Item not found.');
        }
    }




    // public function removeFromCart(Request $request)
    // {
    //     $user = auth()->guard('userWeb')->user();
    //     if (!$user) {
    //         return redirect()->back()->with('error', 'Unauthorized');
    //     }
    //     $cart = Cart::where('user_id', $user->id)
    //         ->where('package_id', $request->package_id)
    //         ->first();
    //     if ($cart) {
    //         $cart->delete();
    //         return redirect()->back()->with('success', 'Item removed from cart.');
    //     }
    //     return redirect()->back()->with('error', 'Item not found.');
    // }


    public function cart_amount_totals()
    {
        $user = auth()->guard('userWeb')->user();
        $subtotal = 0;

        if ($user) {
            // Logged-in user: fetch from DB
            $carts = \App\Models\Cart::with('package')->where('user_id', $user->id)->get();
            foreach ($carts as $cart) {
                $priceParts = explode(' ', $cart->package->amount);
                $firstPrice = $priceParts[0] ?? '$0';
                $unit = (float) filter_var($firstPrice, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $subtotal += $unit * $cart->quantity;
            }
        } else {
            // Guest user: fetch from session
            $sessionCart = session('cart', []);
            foreach ($sessionCart as $item) {
                $package = \App\Models\Package::find($item['package_id']);
                if ($package) {
                    $priceParts = explode(' ', $package->amount);
                    $firstPrice = $priceParts[0] ?? '$0';
                    $unit = (float) filter_var($firstPrice, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $subtotal += $unit * $item['quantity'];
                }
            }
        }

        return response()->json([
            'subtotal' => '$' . number_format($subtotal, 2),
            'total' => '$' . number_format($subtotal, 2),
        ]);
    }



    // public function cart_amount_totals()
    // {
    //     $user = auth()->guard('userWeb')->user();
    //     if (!$user) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }

    //     $carts = \App\Models\Cart::with('package')->where('user_id', $user->id)->get();
    //     $subtotal = 0;
    //     foreach ($carts as $cart) {
    //         $priceParts = explode(' ', $cart->package->amount);
    //         $firstPrice = $priceParts[0] ?? '$0';
    //         $unit = (float) filter_var($firstPrice, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    //         $subtotal += $unit * $cart->quantity;
    //     }

    //     return response()->json([
    //         'subtotal' => '$' . number_format($subtotal, 2),
    //         'total' => '$' . number_format($subtotal, 2),
    //     ]);
    // }


    public function checkout()
    {
        $user = Auth::guard('userWeb')->user();
        if ($user) {

            DB::table('carts')
                ->whereNull('user_id')
                ->update(['user_id' => $user->id]);

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


    // public function checkout()
    // {
    //     $user = Auth::guard('userWeb')->user();
    //     if ($user) {
    //         $cartItems = DB::table('carts')
    //             ->join('packages', 'carts.package_id', '=', 'packages.id')
    //             ->join('types', 'packages.type', '=', 'types.id')
    //             ->where('carts.user_id', $user->id)
    //             ->orderBy('carts.created_at', 'DESC')
    //             ->select('carts.*', 'packages.title', 'packages.amount as package_amount', 'packages.image', 'types.type')
    //             ->get();
    //         $subtotal = $cartItems->sum(function ($item) {
    //             $amount = floatval(str_replace(['$', ','], '', $item->package_amount));
    //             return $amount * $item->quantity;
    //         });
    //         $total = $subtotal;
    //         return view('frontend.checkout', compact('cartItems', 'subtotal', 'total'));
    //     } else {
    //         return redirect()->route('user.login.get')->with('error', 'Please login!');
    //     }
    // }


    // public function placeOrder(Request $request, $id)
    // {
    //     $request->validate([
    //         'phone' => 'required|numeric|digits:10',
    //         'address' => 'required|string',
    //         'city' => 'required|string',
    //         'pincode' => 'required|string|max:10',
    //         'payment_method' => 'required|in:cod,online',
    //     ]);
    //     $user = auth()->guard('userWeb')->user();
    //     $package = Package::find($id);
    //     $firstAmount = is_array($package->amount) ? $package->amount[0] : $package->amount;
    //     preg_match('/\d+/', $firstAmount, $matches);
    //     $cleanAmount = isset($matches[0]) ? (float) $matches[0] : 0;
    //     $order = Order::create([
    //         'user_id' => $user->id,
    //         'package_id' => $package->id,
    //         'phone' => $request->phone,
    //         'address' => $request->address,
    //         'city' => $request->city,
    //         'pincode' => $request->pincode,
    //         'payment_method' => $request->payment_method,
    //         'payment_status' => $request->payment_method === 'cod' ? 'pending' : 'Paid',
    //         'total_amount' => $cleanAmount,
    //         'status' => 'pending',
    //     ]);
    //     return redirect()->route('/')->with('success', 'Order placed successfully.');
    // }



    public function placeOrder(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'digits:10',
            'address' => 'required|string',
            'city' => 'required|string',
            'pincode' => 'required|string|max:10',
            'payment_method' => 'required|in:cod,online',
        ]);

        $user = auth()->guard('userWeb')->user();

        $cartItems = Cart::with('package')->where('user_id', $user->id)->get();

        try {
            DB::beginTransaction();

            if ($cartItems->isEmpty()) {
                return redirect()->back()->with('error', 'Your cart is empty.');
            }

            $total = 0;

            foreach ($cartItems as $item) {
                $firstAmount = is_array($item->package->amount)
                    ? $item->package->amount[0]
                    : $item->package->amount;

                preg_match('/\d+/', $firstAmount, $matches);
                $cleanAmount = isset($matches[0]) ? (float) $matches[0] : 0;

                $item->calculated_price = $cleanAmount * $item->quantity;
                $total += $item->calculated_price;
            }

            $order = Order::create([
                'user_id' => $user->id,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'pincode' => $request->pincode,
                'payment_method' => $request->payment_method,
                'payment_status' => $request->payment_method === 'cod' ? 'pending' : 'Paid',
                'total_amount' => $total,
                'status' => 'pending',
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->package_id,
                    'quantity' => $item->quantity,
                    'price' => $item->calculated_price,
                ]);
            }

            Cart::where('user_id', $user->id)->delete();
            DB::commit();

            return redirect()->route('/')->with('success', 'Order placed successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Order failed: ' . $e->getMessage());
        }

    }

    public function privacypolicy() {
        return view('frontend.privacypolicy');
    }

    public function refundpolicy() {
        return view('frontend.refundpolicy');
    }

    public function termsandcondition() {
        return view('frontend.termsandcondition');
    }

}
