<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('index');
Route::view('/login', 'login')->name('login');
Route::view('/create_account', 'signin')->name('signin');
Route::view('/dashboard', 'login')->name('admin.panel');

Route::post('/add', [UserController::class, 'addUser'])->name('addUser');

Route::fallback(function () {
    return view('error');
});