<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['prefix' => '/', 'middleware' => 'admin'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');
});

Route::get('/', [ClientHomeController::class, 'index'])->name('/');
