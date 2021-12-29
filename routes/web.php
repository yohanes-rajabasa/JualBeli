<?php

use App\Http\Controllers\CartTransactionController;
use App\Http\Controllers\ProductDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('register', [RegisterController::class, 'create']);
Route::post('register/customer', [RegisterController::class, 'customer']);
Route::post('register/seller', [RegisterController::class, 'seller']);

Route::get('profile', [ProfileController::class, 'create']);
Route::put('profile/edit', [ProfileController::class, 'update']);

Route::get('/transaction',[CartTransactionController::class,'index']);
Route::post('/transaction',[CartTransactionController::class,'ajax']);



Route::get('/seller-page',function(){
    return view('seller-page');
});
Route::get('/profile', function () {
    return view('profile');
});

// product detail
Route::get('product/detail',[ProductDetailController::class,'showProductDetail']);
