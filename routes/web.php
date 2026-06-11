<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FaqCatagoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\WebSettingController;


Route::get('/', [PublicController::class, 'index'])->name('index');
Route::get('/shop', [CartController::class, 'showShop'])->name('web.shopping');
Route::get('/contact', [PublicController::class, 'contact'])->name('web.contact');
Route::get('/category', [PublicController::class, 'category'])->name('web.category');
Route::get('/shop-details/{id}', [CheckoutController::class, 'shopDetails'])->name('web.shop-details');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/faq', [PublicController::class, 'faq'])->name('web.faq');



Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::post('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::post('/payment/fail', [PaymentController::class, 'paymentFail'])->name('payment.fail');
Route::post('/payment/cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(ForgotPasswordController::class)->group(function () {
    Route::post('/otp-send', 'sendOtp')->name('otp.send');
    Route::post('/otp-verify', 'verifyOtp')->name('otp.verify');
    Route::post('/password-reset', 'resetPassword')->name('password.reset.submit');
});


Route::middleware(['web'])->group(function () {
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');


    Route::get('/checkout', [CartController::class, 'showCheckout'])->name('checkout.index');
    Route::post('/checkout/place-order', [CartController::class, 'placeOrder'])->name('checkout.placeOrder');

    Route::get('/order/success/{orderId}', [CartController::class, 'success'])->name('order.success');
    Route::get('/order/details/{orderId}', [CartController::class, 'details'])->name('order.details');



    Route::get('/payment/success', [CartController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/cancel', [CartController::class, 'paymentCancel'])->name('payment.cancel');

    // Route::get('/bkash/payment', [CartController::class, 'bkashPayment'])->name('bkash.payment');
    // Route::get('/bkash/callback', [CartController::class, 'bkashCallback'])->name('bkash.callback');


    // Route::get('/nagad/payment', [CartController::class, 'nagadPayment'])->name('nagad.payment');
    // Route::get('/nagad/callback', [CartController::class, 'nagadCallback'])->name('nagad.callback');
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
    Route::put('/web-settings/update',  'update')->name('web_settings.update');

});

Route::controller(ContactController::class)->group(function(){
    Route::post('/contact-submit', 'store')->name('contact.store');
    Route::get('/admin/contact', 'index')->name('contact.index');
    Route::delete('/admin/contact/{id}', 'destroy')->name('contact.destroy');
     Route::delete('/contact/reply', 'sendReply')->name('contact.reply');

   

});

});
