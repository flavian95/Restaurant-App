<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions');
});

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('/cookies-policy', function () {
    return view('cookies-policy');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');