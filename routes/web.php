<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ImagesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductsController::class);
Route::resource('images', ImagesController::class);

// Route::get('/productos', function () {
//     return view('productos');
// });

// Route::get('/productos/{id}/img', function () {
//     return 
// })