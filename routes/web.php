<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('index');
Route::view('/login', 'login')->name('login');
Route::view('/signup', 'signin')->name('signin');
Route::view('/profile/{name}', 'profile')->name('profile');
Route::view('/product/{id}', 'product')->name('product');

Route::controller(ProductController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('admin.panel');
    Route::get('products/view/{id}', 'show')->name('product.view');
    Route::get('products/edit/{id}', 'edit')->name('product.edit');
    Route::get('products/delete/{id}', 'delete')->name('product.delete');
});
Route::controller(UserController::class)->group(function () {
    Route::post('/add', 'addUser')->name('addUser');
    Route::post('/log', 'loginUser')->name('loginUser');
    Route::post('/logout', 'logoutUser')->name('logout');
});
Route::fallback(function () {
    return view('error');
});