<?php

use App\Http\Controllers\admin\BlogCategoryController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\ContactUsController;
use App\Http\Controllers\admin\CustomPackageController;
use App\Http\Controllers\admin\EmailMarketingController;
use App\Http\Controllers\admin\GraphicController;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\admin\PackageController;
use App\Http\Controllers\admin\PhpLaravelController;
use App\Http\Controllers\admin\PpcController;
use App\Http\Controllers\admin\ReactController;
use App\Http\Controllers\admin\SeoController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\ShopifyController;
use App\Http\Controllers\admin\SmoController;
use App\Http\Controllers\admin\TypeController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\webFlowController;
use App\Http\Controllers\admin\WixController;
use App\Http\Controllers\admin\WordpressController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\RedirectIfUserAuthenticated;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('frontend.index')->name('/');
// });

// ----------------------website Authenticated---------------------//

Route::middleware([RedirectIfUserAuthenticated::class])->group(function () {
    Route::get('/user-register', [FrontendAuthController::class, 'register'])->name('user.register');
    Route::post('/user-register', [FrontendAuthController::class, 'register_store'])->name('user.register.store');
    Route::get('/user-login', [FrontendAuthController::class, 'login_form'])->name('user.login.get');
    Route::post('/user-login-post', [FrontendAuthController::class, 'user_login'])->name('user.login');
});

Route::post('/user-logout', [FrontendAuthController::class, 'user_logout'])->name('user.logout');

// ---------------------------- Website routes--------------------- //
Route::get('/', [IndexController::class, 'index'])->name('/');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/php-laravel-website', [IndexController::class, 'phpLaravel'])->name('php-laravel-website');
Route::get('/react-java-website', [IndexController::class, 'reactJava'])->name('react-java-website');
Route::get('/shopify-development', [IndexController::class, 'shopify'])->name('shopify-development');
Route::get('/custom-website-development', [IndexController::class, 'customWebsite'])->name('custom-website-development');
Route::get('/webflow-development', [IndexController::class, 'webFlow'])->name('webflow-development');
Route::get('/wix-website-development', [IndexController::class, 'wixWebsite'])->name('wix-website-development');
Route::get('/wordpress-website-development', [IndexController::class, 'wordpressWebsite'])->name('wordpress-website-development');
Route::get('/graphic-devlopment', [IndexController::class, 'graphic'])->name('graphic-devlopment');
Route::get('/search-engine-optimization', [IndexController::class, 'seo'])->name('search-engine-optimization');
Route::get('/ppc-services', [IndexController::class, 'ppc'])->name('ppc-services');
Route::get('/smo-services', [IndexController::class, 'smo'])->name('smo-services');
Route::get('/email-marketing-service', [IndexController::class, 'emailMarketing'])->name('email-marketing-service');
Route::get('/blogs', [IndexController::class, 'blog'])->name('blogs');
Route::get('/blog-detail/{slug}', [IndexController::class, 'blog_detail'])->name('blog-detail');
Route::get('/cart', [IndexController::class, 'cart'])->name('cart');
Route::get('/contact-us', [IndexController::class, 'contactUs'])->name('contact.us');
Route::post('/contact-us-store', [IndexController::class, 'contactUsStore'])->name('contact.usStore');
Route::post('/add-to-cart', [IndexController::class, 'addtocart'])->name('add.to.cart');
Route::post('/cart/update-quantity', [IndexController::class, 'updateQuantity'])->name('cart.updateQty');
Route::post('/cart/remove', [IndexController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/totals', [IndexController::class, 'cart_amount_totals'])->name('cart.totals');
Route::get('/checkout', [IndexController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [IndexController::class, 'placeOrder'])->name('place.order');


// ------------------------------admin routes-------------------------//
//-------------------------------- Authenticated routes---------------------------------//

Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'registerForm'])->name('register-form');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    //---------------------------------Package Types-----------------------------------------//
    Route::get('type', [TypeController::class, 'index'])->name('types');
    Route::get('/create/type/{id?}', [TypeController::class, 'create'])->name('addtypes');
    Route::post('/save/type', [TypeController::class, 'save'])->name('save-type');
    Route::put('/update/type/{id}', [TypeController::class, 'save'])->name('update-type');
    Route::delete('/updateStatus/type/{id}', [TypeController::class, 'updateStatus'])->name('updateStatus-type');
    Route::post('/type-status-toggle/{id}', [TypeController::class, 'toggleStatus'])->name('toggleStatus-type');

    //---------------------------------Add Package-----------------------------------------//
    Route::get('package', [PackageController::class, 'index'])->name('packages');
    Route::get('/create/package/{id?}', [PackageController::class, 'create'])->name('addPackages');
    Route::post('/save/package-package', [PackageController::class, 'save'])->name('save-package');
    Route::put('/update/package-package/{id}', [PackageController::class, 'save'])->name('update-package');
    Route::any('/updateStatus/package-package/{id}', [PackageController::class, 'updateStatus'])->name('updateStatus-package');

    //---------------------------------Setting-----------------------------------------//

    Route::get('setting', [SettingController::class, 'index'])->name('setting');
    Route::post('meta-store', [SettingController::class, 'meta_store'])->name('meta.store');
    Route::get('meta-edit/{id}', [SettingController::class, 'meta_edit'])->name('meta.edit');
    Route::post('meta-update/{id}', [SettingController::class, 'meta_update'])->name('meta.update');

    // ----------------------------------contact us list-------------------------------------//
    Route::get('web-contact-us', [ContactUsController::class, 'contact_us'])->name('contact.us.list');

    // ----------------------------------orders list-------------------------------------//
    Route::get('web-orders', [OrdersController::class, 'ordersList'])->name('orders.list');
    Route::get('orderDetail/{id}', [OrdersController::class, 'orderDetails'])->name('order.details');



      //---------------------------------Blog-----------------------------------------//
    Route::get('blog', [BlogController::class, 'index'])->name('blogss');
    Route::get('/create/blog/{id?}', [BlogController::class, 'create'])->name('create-blog');
    Route::post('/save/blog', [BlogController::class, 'save'])->name('save-blog');
    Route::put('/update/blog/{id}', [BlogController::class, 'save'])->name('update-blog');
    Route::delete('/updateStatus/blog/{id}', [BlogController::class, 'updateStatus'])->name('updateStatus-blog');

    //---------------------------------Blog Category-----------------------------------------//
    Route::get('blogCategory', [BlogCategoryController::class, 'index'])->name('blogCategorys');
    Route::get('/create/blogCategory/{id?}', [BlogCategoryController::class, 'create'])->name('create-blogCategory');
    Route::post('/save/blogCategory', [BlogCategoryController::class, 'save'])->name('save-blogCategory');
    Route::put('/update/blogCategory/{id}', [BlogCategoryController::class, 'save'])->name('update-blogCategory');
    Route::delete('/updateStatus/blogCategory/{id}', [BlogCategoryController::class, 'updateStatus'])->name('updateStatus-blogCategory');

    // Not useing //
    //---------------------------------PHP Laravel-----------------------------------------//
    Route::get('php', [PhpLaravelController::class, 'index'])->name('phps');
    Route::get('/create/php-laravel-package/{id?}', [PhpLaravelController::class, 'create'])->name('create-php-laravel');
    Route::post('/save/php-laravel-package', [PhpLaravelController::class, 'save'])->name('save-php-laravel');
    Route::put('/update/php-laravel-package/{id}', [PhpLaravelController::class, 'save'])->name('update-php-laravel');
    Route::delete('/updateStatus/php-laravel-package/{id}', [PhpLaravelController::class, 'updateStatus'])->name('updateStatus-php-laravel');

    //---------------------------------Web Flow Website-----------------------------------------//
    Route::get('webFlow', [webFlowController::class, 'index'])->name('webFlows');
    Route::get('/create/web-flow-package/{id?}', [webFlowController::class, 'create'])->name('create-web-flow');
    Route::post('/save/web-flow-package', [webFlowController::class, 'save'])->name('save-web-flow');
    Route::put('/update/web-flow-package/{id}', [webFlowController::class, 'save'])->name('update-web-flow');
    Route::delete('/updateStatus/web-flow-package/{id}', [webFlowController::class, 'updateStatus'])->name('updateStatus-web-flow');

    //---------------------------------Wordpress-----------------------------------------//
    Route::get('wordpress', [WordpressController::class, 'index'])->name('wordpresss');
    Route::get('/create/wordpress-package/{id?}', [WordpressController::class, 'create'])->name('create-wordpress');
    Route::post('/save/wordpress-package', [WordpressController::class, 'save'])->name('save-wordpress');
    Route::put('/update/wordpress-package/{id}', [WordpressController::class, 'save'])->name('update-wordpress');
    Route::delete('/updateStatus/wordpress-package/{id}', [WordpressController::class, 'updateStatus'])->name('updateStatus-wordpress');

    //---------------------------------Custom Development-----------------------------------------//
    Route::get('customDevelopment', [CustomPackageController::class, 'index'])->name('customDevelopments');
    Route::get('/create/custom-package/{id?}', [CustomPackageController::class, 'create'])->name('create-custom');
    Route::post('/save/custom-package', [CustomPackageController::class, 'save'])->name('save-custom');
    Route::put('/update/custom-package/{id}', [CustomPackageController::class, 'save'])->name('update-custom');
    Route::delete('/updateStatus/custom-package/{id}', [CustomPackageController::class, 'updateStatus'])->name('updateStatus-custom');

    //---------------------------------Shopify Development-----------------------------------------//
    Route::get('shopify', [ShopifyController::class, 'index'])->name('shopifys');
    Route::get('/create/shopify-package/{id?}', [ShopifyController::class, 'create'])->name('create-shopify');
    Route::post('/save/shopify-package', [ShopifyController::class, 'save'])->name('save-shopify');
    Route::put('/update/shopify-package/{id}', [ShopifyController::class, 'save'])->name('update-shopify');
    Route::delete('/updateStatus/shopify-package/{id}', [ShopifyController::class, 'updateStatus'])->name('updateStatus-shopify');

    //---------------------------------Wix Development-----------------------------------------//
    Route::get('wix', [WixController::class, 'index'])->name('wixs');
    Route::get('/create/wix-package/{id?}', [WixController::class, 'create'])->name('create-wix');
    Route::post('/save/wix-package', [WixController::class, 'save'])->name('save-wix');
    Route::put('/update/wix-package/{id}', [WixController::class, 'save'])->name('update-wix');
    Route::delete('/updateStatus/wix-package/{id}', [WixController::class, 'updateStatus'])->name('updateStatus-wix');

    //---------------------------------React Java Development-----------------------------------------//
    Route::get('react', [ReactController::class, 'index'])->name('reacts');
    Route::get('/create/react-package/{id?}', [ReactController::class, 'create'])->name('create-react');
    Route::post('/save/react-package', [ReactController::class, 'save'])->name('save-react');
    Route::put('/update/react-package/{id}', [ReactController::class, 'save'])->name('update-react');
    Route::delete('/updateStatus/react-package/{id}', [ReactController::class, 'updateStatus'])->name('updateStatus-react');

    //---------------------------------Graphics Design Package-----------------------------------------//
    Route::get('graphic', [GraphicController::class, 'index'])->name('graphics');
    Route::get('/create/graphic-package/{id?}', [GraphicController::class, 'create'])->name('create-graphic');
    Route::post('/save/graphic-package', [GraphicController::class, 'save'])->name('save-graphic');
    Route::put('/update/graphic-package/{id}', [GraphicController::class, 'save'])->name('update-graphic');
    Route::delete('/updateStatus/graphic-package/{id}', [GraphicController::class, 'updateStatus'])->name('updateStatus-graphic');

    //---------------------------------SEO Package-----------------------------------------//
    Route::get('seo', [SeoController::class, 'index'])->name('seos');
    Route::get('/create/seo-package/{id?}', [SeoController::class, 'create'])->name('create-seo');
    Route::post('/save/seo-package', [SeoController::class, 'save'])->name('save-seo');
    Route::put('/update/seo-package/{id}', [SeoController::class, 'save'])->name('update-seo');
    Route::delete('/updateStatus/seo-package/{id}', [SeoController::class, 'updateStatus'])->name('updateStatus-seo');

    //---------------------------------PPC Package-----------------------------------------//
    Route::get('ppc', [PpcController::class, 'index'])->name('ppcs');
    Route::get('/create/ppc-package/{id?}', [PpcController::class, 'create'])->name('create-ppc');
    Route::post('/save/ppc-package', [PpcController::class, 'save'])->name('save-ppc');
    Route::put('/update/ppc-package/{id}', [PpcController::class, 'save'])->name('update-ppc');
    Route::delete('/updateStatus/ppc-package/{id}', [PpcController::class, 'updateStatus'])->name('updateStatus-ppc');

    //---------------------------------SMO Package-----------------------------------------//
    Route::get('smo', [SmoController::class, 'index'])->name('smos');
    Route::get('/create/smo-package/{id?}', [SmoController::class, 'create'])->name('create-smo');
    Route::post('/save/smo-package', [SmoController::class, 'save'])->name('save-smo');
    Route::put('/update/smo-package/{id}', [SmoController::class, 'save'])->name('update-smo');
    Route::delete('/updateStatus/smo-package/{id}', [SmoController::class, 'updateStatus'])->name('updateStatus-smo');

    //---------------------------------Email Marketing Package-----------------------------------------//
    Route::get('emailMarketing', [EmailMarketingController::class, 'index'])->name('emailMarketings');
    Route::get('/create/emailMarketing-package/{id?}', [EmailMarketingController::class, 'create'])->name('create-emailMarketing');
    Route::post('/save/emailMarketing-package', [EmailMarketingController::class, 'save'])->name('save-emailMarketing');
    Route::put('/update/emailMarketing-package/{id}', [EmailMarketingController::class, 'save'])->name('update-emailMarketing');
    Route::delete('/updateStatus/emailMarketing-package/{id}', [EmailMarketingController::class, 'updateStatus'])->name('updateStatus-emailMarketing');


});
