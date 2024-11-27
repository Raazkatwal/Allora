<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('index');
Route::view('/test', 'test');
Route::view('/login', 'login')->name('login');
Route::view('/signup', 'signin')->name('signin');
Route::view('/profile/{name}', 'profile')->name('profile');
Route::post('/checkout', [PaymentController::class, 'index'])->name('checkout');

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{id}', 'show')->name('product');
    Route::get('/products/filter/', 'filterProducts')->name('filterproducts');
    Route::get('/products', 'allProducts')->name('all.products');
    Route::get('/dashboard', 'index')->name('admin.panel');
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

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart');
    Route::post('/cart/add/{id}', 'add')->name('cart.add');
    route::post('/cart/remove/{id}', 'remove')->name('cart.remove');
});
