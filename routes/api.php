<?php

use App\Http\Controllers\BuyerTrukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukSellerController;
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
Route::resource('/produk',ProdukController::class);
Route::resource('/produk-seller',ProdukSellerController::class);
