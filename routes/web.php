<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ImagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Middleware\RedirectIfNotAdmin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::resource()

Route::controller(StoreController::class)->group(function () {
    Route::get('/', 'getRandomProducts')->name('getRandomProducts');
});

Route::resource('products', ProductsController::class)->middleware(RedirectIfNotAdmin::class);
Route::resource('images', ImagesController::class)->middleware(RedirectIfNotAdmin::class);

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::any('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::any('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/home', 'home')->name('home');
    Route::any('/logout', 'logout')->name('logout');
});

Route::controller(VerificationController::class)->group(function () {
    Route::get('/email/verify', 'notice')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verify')->name('verification.verify');
    Route::any('/email/resend', 'resend')->name('verification.resend');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
});

Route::controller(StoreController::class)->group(function () {
    Route::get('/tienda', [StoreController::class, 'getProducts'])->name('store.getProducts');
    Route::get('/tienda/{id}', [StoreController::class, 'getProduct'])->name('store.getProduct');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/carrito', [CartController::class, 'getCartItems'])->name('cart.getCartItems');
});