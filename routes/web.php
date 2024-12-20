<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\adminUser;
use App\Http\Middleware\guestOnly;
use App\Http\Middleware\validUser;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function (){
    Route::get('/', 'index')->name('index');
    Route::get('/profile/{name}','profile')->name('profile');
    });
Route::view('/login', 'login')->name('login')->middleware(guestOnly::class);
Route::view('/signup', 'signin')->name('signin')->middleware(guestOnly::class);


Route::controller(PaymentController::class)->group(function (){
Route::post('/checkout', 'index')->name('checkout')->middleware(validUser::class);
Route::post('/checkout/khalti','handleKhaltiPayment')->name('submit_khalti_payment')->middleware(validUser::class);
});


Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{id}', 'show')->name('product');
    Route::get('/products/filter/', 'filterProducts')->name('filterproducts');
    Route::get('/products', 'allProducts')->name('all.products');
    Route::get('/dashboard', 'index')->name('admin.panel')
            ->middleware(adminUser::class);
    Route::post('addpro', 'addProduct')->name('addProduct');
});
Route::controller(UserController::class)->group(function () {
    Route::post('/add', 'addUser')->name('addUser');
    Route::post('/log', 'loginUser')->name('loginUser');
    Route::post('/logout', 'logoutUser')->name('logout');
});
Route::fallback(function () {
    return view('error');
});
Route::get('/404', function () {
    return view('error');
})->name('error.page');

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart');
    Route::post('/cart/add/{id}', 'add')->name('cart.add');
    route::post('/cart/remove/{id}', 'remove')->name('cart.remove');
});
