<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

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

Route::get('/cart', [CartController::class, 'view'])->name('cart.view');

Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');