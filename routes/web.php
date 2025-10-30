<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;

// CRUD Produk
Route::resource('produk', ProdukController::class);

// CRUD Transaksi
Route::resource('transaksi', TransaksiController::class);
