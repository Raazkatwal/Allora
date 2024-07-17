<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('index');

Route::fallback(function () {
    return view('error');
});