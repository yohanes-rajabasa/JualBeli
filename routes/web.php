<?php

use App\Http\Controllers\CartTransactionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\InsertProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SellerController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('register', [RegisterController::class, 'create']);
Route::post('register/customer', [RegisterController::class, 'customer']);
Route::post('register/seller', [RegisterController::class, 'seller']);

Route::get('profile', [ProfileController::class, 'create']);
Route::put('profile/edit', [ProfileController::class, 'update']);

Route::get('/transaction',[CartTransactionController::class,'index']);
Route::delete('/transaction/cart/delete/{id}',[CartTransactionController::class,'deleteCart']);
Route::post('/transaction',[CartTransactionController::class,'calcPrice']);
Route::post('/transaction/cart/minQuantity',[CartTransactionController::class,'minQuantity']);
Route::post('/transaction/cart/addQuantity',[CartTransactionController::class,'addQuantity']);
Route::post('/transaction/cart/checkout',[CartTransactionController::class,'checkout']);

Route::get('/profile', function () {
    return view('profile');
});

// product detail
Route::get('product/{id}/detail',[ProductDetailController::class,'showProductDetail']);

// login customer
Route::get('/auth/login/customer',[LoginController::class,'showLoginCustomer'])->name('login');
Route::post('/auth/login/customer',[LoginController::class,'performLogin']);

// login seller
Route::get('/auth/login/seller',[LoginController::class,'showLoginSeller']);
Route::post('/auth/login/seller',[LoginController::class,'performLogin']);

// logout
Route::get('/logout',[LoginController::class,'performLogout']);

Route::middleware(['auth', 'seller'])->group(function () {
    Route::get('/seller',[SellerController::class, 'sellerPageView']);
    Route::get('/seller/insert-product',[SellerController::class, 'insertProductView']);
    Route::post('/seller/insert-product',[SellerController::class, 'insertProduct']);
    Route::delete('/deleteProduct/{id}',[SellerController::class, 'deleteProduct']);
});
