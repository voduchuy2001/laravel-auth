<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::group(['prefix' => '/', 'middleware' => 'admin'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');
});

Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index')->middleware('auth');
Route::get('user-profile', [UserController::class, 'index'])->name('user.index')->middleware('auth');

Route::get('/', [ClientHomeController::class, 'index'])->name('/');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.show');

Route::post('add-to-cart/{id}', [CartController::class, 'store'])->name('add-to-cart')->middleware('auth');
Route::get('cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::get('cart/{id}', [CartController::class, 'delete'])->name('cart.delete')->middleware('auth');
Route::put('cart-update', [CartController::class, 'update'])->name('cart.update')->middleware('auth');
