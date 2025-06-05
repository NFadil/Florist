<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/produk', [ProductController::class, 'index'])->name('Produk.show');

// Route::get('/produk', function () {
//     return view('Homepage.Produk');
// });
Route::get('/', function () {
    return view('Homepage.Hero');
});
Route::get('/beranda', function () {
    return view('Homepage.Beranda');
});
Route::get('/keranjang', function () {
    return view('Homepage.Keranjang');
});
Route::get('/about', function () {
    return view('Homepage.TentangKami');
});
Route::get('/pesanan', function () {
    return view('Homepage.Pesanan');
});
Route::get('/login', function () {
    return view('Homepage.Login');
});
Route::get('/registrasi', function () {
    return view('Homepage.Registrasi');
});

Route::get('/admin', function () {
    return view('AdminPage.Dashboard');
});
