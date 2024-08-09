<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('index');
Route::view('/login', 'login')->name('login');
Route::view('/signup', 'signin')->name('signin');

Route::controller(ProductController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('admin.panel');
    Route::get('products/view/{id}', 'show')->name('product.view');
    Route::get('products/edit/{id}', 'edit')->name('product.edit');
    Route::get('products/delete/{id}', 'delete')->name('product.delete');
});
Route::post('/add', [UserController::class, 'addUser'])->name('addUser');
Route::fallback(function () {
    return view('error');
});

Route::get('/counter', Counter::class);