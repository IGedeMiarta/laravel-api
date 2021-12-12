<?php

use App\Http\Controllers\BuyerTrukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukSellerController;
use App\Models\ProdukSeller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/truk',BuyerTrukController::class);
Route::resource('/kategori',KategoriController::class);
Route::resource('/produk',ProdukController::class);
Route::resource('/order',OrdersController::class);

Route::get('/produk-seller/{id_seller}',[ProdukSellerController::class,'index']);
Route::get('/produk-seller-get/{id_seller}/{id_produk}',[ProdukSellerController::class,'show']);
