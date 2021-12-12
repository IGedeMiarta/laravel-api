<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BuyerTrukController;
use App\Http\Controllers\ProdukSellerController;

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
    return view('welcome');
});


Route::resource('/truk',BuyerTrukController::class);
Route::resource('/kategori',KategoriController::class);
Route::resource('/produk',ProdukController::class);
Route::resource('/order',OrdersController::class);

Route::get('/produk-seller/{id_seller}',[ProdukSellerController::class,'index']);
Route::get('/produk-seller-get/{id_seller}/{id_produk}',[ProdukSellerController::class,'show']);
