<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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

Route::get('/login', [LoginController::class, 'view'])->name('login.show');

Route::post('/login', [LoginController::class, 'perform'])->name('login.perform');

Route::get('/register', [RegisterController::class, 'view'])->name('register.show');

Route::post('/register', [RegisterController::class, 'perform'])->name('register.perform');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'view'])->name('dashboard.show');
    Route::post('/dashboard', [DashboardController::class, 'update'])->name('dashboard.update');
});