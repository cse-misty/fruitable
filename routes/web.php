<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\format_priceController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FaqCatagoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\WebSettingController;
use App\Http\Controllers\HeroSliderController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;



Route::controller(PublicController::class)->group(function (){
    Route::get('/', 'index')->name('index');
    Route::get('/contact', 'contact')->name('web.contact');
    Route::get('/category','category')->name('web.category');
    Route::get('/faq',  'faq')->name('web.faq');
    Route::get('/about', 'about')->name('web.about');
    Route::get('/privacy-policy',  'privacyPolicy')->name('web.privacy-policy');
    Route::get('/organic/product', 'organicProduct')->name('web.organic-product');

});
 Route::get('/shop', [CartController::class, 'showShop'])->name('web.shopping');
Route::get('/shop-details/{id}', [CheckoutController::class, 'shopDetails'])->name('web.shop-details');
Route::get('/search', [SearchController::class, 'index'])->name('search');


Route::post('/review/store/{product_id}', [ReviewController::class, 'store'])
     ->name('review.store')
     ->middleware('auth');

Route::controller(PageController::class)->group(function(){

    Route::get('/page/{slug}', 'show')->name('page.show');
    Route::post('/page/store', 'store')->name('page.store');

});

Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::post('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::post('/payment/fail', [PaymentController::class, 'paymentFail'])->name('payment.fail');
Route::post('/payment/cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');




Route::get('/login',  'showLoginForm')->name('login');




});

Route::controller(ForgotPasswordController::class)->group(function () {
    Route::post('/otp-send', 'sendOtp')->name('otp.send');
    Route::post('/otp-verify', 'verifyOtp')->name('otp.verify');
    Route::post('/password-reset', 'resetPassword')->name('password.reset.submit');
});
Route::get('/change-language/{locale}', [LanguageController::class, 'changeLanguage'])->name('lang.switch');



// Route::middleware(['web'])->group(function () {
//     Route::get('/cart', [CartController::class, 'showCart'])->name('cart.index');
//     Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
//     Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
//     Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');


//     Route::get('/checkout', [CartController::class, 'showCheckout'])->name('checkout.index');
//     Route::post('/checkout/place-order', [CartController::class, 'placeOrder'])->name('checkout.placeOrder');

//     Route::get('/order/success/{orderId}', [CartController::class, 'success'])->name('order.success');
//     Route::get('/order/details/{orderId}', [CartController::class, 'details'])->name('order.details');



//     Route::get('/payment/success', [CartController::class, 'paymentSuccess'])->name('payment.success');
//     Route::get('/payment/cancel', [CartController::class, 'paymentCancel'])->name('payment.cancel');


// });

Route::middleware(['web'])->group(function () {

    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');


    Route::middleware(['auth'])->group(function () {
        Route::get('/checkout', [CartController::class, 'showCheckout'])->name('checkout.index');
        Route::post('/checkout/place-order', [CartController::class, 'placeOrder'])->name('checkout.placeOrder');

        Route::get('/order/success/{orderId}', [CartController::class, 'success'])->name('order.success');
        Route::get('/order/details/{orderId}', [CartController::class, 'details'])->name('order.details');

        Route::get('/payment/success', [CartController::class, 'paymentSuccess'])->name('payment.success');
        Route::get('/payment/cancel', [CartController::class, 'paymentCancel'])->name('payment.cancel');
    });
});



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PublicController::class, 'master'])->name('dashboard');
    Route::get('/order/history', [CartController::class, 'orderHistory'])->name('order.history');


    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });


    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories.index');
        Route::get('/categories/create', 'create')->name('categories.create');
        Route::post('/categories', 'store')->name('categories.store');
        Route::get('/categories/{id}', 'show')->name('categories.show');
        Route::get('/categories/{id}/edit', 'edit')->name('categories.edit');
        Route::put('/categories/{id}', 'update')->name('categories.update');
        Route::delete('/categories/{id}', 'destroy')->name('categories.destroy');
        Route::patch('/categories/{category}/toggle-status', 'toggleStatus')->name('categories.toggle-status');
    });


    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('products.index');
        Route::get('/products/create', 'create')->name('products.create');
        Route::post('/products', 'store')->name('products.store');
        Route::get('/products/{id}', 'show')->name('products.show');
        Route::get('/products/{id}/edit', 'edit')->name('products.edit');
        Route::put('/products/{id}', 'update')->name('products.update');
        Route::delete('/products/{id}', 'destroy')->name('products.destroy');
        Route::patch('/products/{product}/toggle-status', 'toggleStatus')->name('products.toggle-status');
    });


    Route::controller(FaqCatagoryController::class)->group(function () {
        Route::get('/faq/catagory', 'index')->name('faq.catagory.index');
        Route::get('/faq/catagory/create', 'create')->name('faq.catagory.create');
        Route::post('/faq/catagory', 'store')->name('faq.catagory.store');
        Route::get('/faq/catagory/{id}/edit', 'edit')->name('faq.catagory.edit');
        Route::put('/faq/catagory/{id}', 'update')->name('faq.catagory.update');
        Route::delete('/faq/catagory/{id}', 'destroy')->name('faq.catagory.destroy');
        Route::patch('/faq/catagory/{category}/toggle-status', 'toggleStatus')
            ->name('faq.catagory.toggle-status');

    });

    Route::controller(FaqController::class)->group(function (){
        Route::get('/faq/index', 'index')->name('faq.index');
        Route::get('/faq/create', 'create')->name('faq.create');
        Route::post('/faq', 'store')->name('faq.store');
        Route::get('/faq/{id}/edit', 'edit')->name('faq.edit');
        Route::put('/faq/{id}', 'update')->name('faq.update');
        Route::delete('/faq/{id}', 'destroy')->name('faq.destroy');
        Route::patch('/faq/{faq}/toggle-status', 'toggleStatus')
            ->name('faq.toggle-status');

    });


    Route::controller(WebSettingController::class)->group(function (){
        Route::get('/web-settings', 'index')->name('web_settings.index');
        Route::get('/web-settings/edit', 'edit')->name('web_settings.edit');

        Route::post('/web-settings/update', 'update')->name('web_settings.update');
    });



Route::controller(ContactController::class)->group(function(){
    Route::post('/contact-submit', 'store')->name('contact.store');
    Route::get('/admin/contact', 'index')->name('contact.index');
    Route::delete('/admin/contact/{id}', 'destroy')->name('contact.destroy');
    Route::post('/contact/reply', 'sendReply')->name('contact.reply');

    Route::get('/about-us', 'about')->name('about.us.index');

    Route::put('/about-us/update', 'aboutupdate')->name('about.us.update');
});


    Route::controller(StripeController::class)->group(function (){
        Route::get('/payment-method', 'index')->name('payment.method');
        Route::get('/payment-method/edit/{id}', 'edit')->name('payment.method.edit');
        Route::put('/payment-method/update/{id}', 'update')->name('payment.method.update');


    });



    Route::controller(HeroSliderController::class)->group(function () {

        Route::get('/admin/hero/slider', 'index')->name('hero.slider.index');
        Route::get('/admin/hero/slider/edit/{heroSlider}', 'edit')->name('hero.slider.edit');
        Route::put('/admin/hero/slider/update/{heroSlider}', 'update')->name('hero.slider.update');
    });



    Route::controller(ServicesController::class)->group(function () {
        Route::get('/services', 'index')->name('services.index');
        Route::get('/services/{id}/edit', 'edit')->name('services.edit');
        Route::put('/services', 'update')->name('services.update');
        Route::patch('/services/toggle-status', 'toggleStatus')->name('services.toggle-status');

    });


    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/orders', 'index')->name('admin.orders.index');
        Route::get('/admin/orders/{id}', 'show')->name('admin.orders.show');
        Route::put('/admin/orders/{id}/status', 'updateStatus')->name('admin.orders.update-status');
        Route::delete('/admin/orders/{id}', 'destroy')->name('admin.orders.destroy');
        Route::get('/admin/orders/{id}/print',  'printInvoice')->name('admin.orders.print');

    });

    Route::controller(SubCategoryController::class)->group(function () {

        Route::get('/sub/category', 'index')->name('sub-category.index');
        Route::get('/sub/category/create', 'create')->name('sub-category.create');
        Route::post('/sub/category/store', 'store')->name('sub-category.store');
         Route::get('/sub/category/show', 'show')->name('sub-category.show');
        Route::get('/sub/category/edit/{id}', 'edit')->name('sub-category.edit');
        Route::put('/sub/category/update/{id}', 'update')->name('sub-category.update');
        Route::delete('/sub/category/delete/{id}', 'destroy')->name('sub-category.destroy');
        Route::patch('/sub/category/{category}/toggle-status', 'toggleStatus')->name('sub.category.toggle-status');

    });



    Route::controller(PageController::class)->group(function (){

    Route::get('/pages',  'index')->name('pages.index');
    Route::get('/pages/create',  'create')->name('pages.create');
    Route::post('/pages',  'store')->name('pages.store');

     Route::get('/pages/{id}/edit',  'edit')->name('pages.edit');
    Route::put('/pages/{id}',  'update')->name('pages.update');
    Route::delete('/pages/{id}', 'destroy')->name('pages.destroy');

    });

Route::controller(ReviewController::class)->group(function () {
    Route::get('/reviews', 'index')->name('reviews.index');
    Route::delete('/reviews/show/{id}', 'show')->name('reviews.show');
    Route::delete('/reviews/{id}', 'destroy')->name('reviews.destroy');
    Route::get('/reviews/status/{id}', 'updateStatus')->name('reviews.status');

    Route::post('/reviews/reply', 'reviewsendReply')->name('reviews.reply');
});





Route::controller(WishlistController::class)->group(function (){
    Route::get('/wishlist',  'index')->name('wishlist.index');
    Route::post('/wishlist/add/{product}', 'store')->name('wishlist.add');
    Route::delete('/wishlist/remove/{wishlist}', 'destroy')->name('wishlist.destroy');
});




});
