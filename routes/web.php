<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/produk', [ProductController::class, 'index'])->name('Produk.show');
Route::get('/categories/{category:slug}', [ProductController::class, 'category'])->name('Produk.Category');

//login
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [UserController::class, 'index'])->name('login');
    Route::post('/login', [UserController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    //admin
    Route::get('/admin', [AdminController::class, 'index'])->middleware('userakses:admin')->name('Admin.Admin');
    Route::get('/profile', [ProfileController::class, 'index'])->middleware('userakses:admin')->name('Profile.show');
    Route::get('/galery', [GaleryController::class, 'index'])->middleware('userakses:admin')->name('Galery.show');
    Route::get('/promo', [PromoController::class, 'index'])->middleware('userakses:admin')->name('Promo.show');
    Route::get('/pesanan-admin', [PesananController::class, 'adminshow'])->middleware('userakses:admin')->name('Pesanan.show');
    Route::get('/transaksi-admin', [PesananController::class, 'admintransaksi'])->middleware('userakses:admin')->name('Transakasi.show');
    Route::get('/category-admin', [CategoryController::class, 'index'])->middleware('userakses:admin')->name('Categori.admin');

    //user
    Route::post('/keranjang', [KeranjangController::class, 'store'])->middleware('userakses:customer')->name('keranjang.store');
    Route::get('/keranjang', [KeranjangController::class, 'index'])->middleware('userakses:customer')->name('Keranjang.show');
    Route::post('/keranjang/update', [KeranjangController::class, 'update'])->middleware('userakses:customer')->name('keranjang.update');
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->middleware('userakses:customer')->name('keranjang.destroy');

    Route::post('/pesan', [PesananController::class, 'store'])->middleware('userakses:customer')->name('Pesanan.store');
    Route::get('/pesanan', [PesananController::class, 'index'])->middleware('userakses:customer')->name('User.Pesanan');

    //produk admin
    Route::get('/produk-admin', [ProductController::class, 'adminshow'])->middleware('userakses:admin')->name('Produk.admin');
    Route::get('/tambah-produk', [ProductController::class, 'create'])->middleware('userakses:admin')->name('TambahProduk.admin');
    Route::post('/tambah-produk', [ProductController::class, 'store'])->middleware('userakses:admin')->name('Tambah.produk');
    Route::delete('/produk-gambar/{id}', [ProductController::class, 'hapusGambar'])->name('produk.gambar.destroy');
    Route::delete('/produkdelete/{id}', [ProductController::class, 'destroy'])->middleware('userakses:admin')->name('delete.produk');
    Route::put('/update-produk/{slug}', [ProductController::class, 'update'])->middleware('userakses:admin')->name('update.produk');
    Route::get('/edit-produk/{slug}', [ProductController::class, 'edit'])->middleware('userakses:admin')->name('UpdateProduk.admin');

});

//rederect login
Route::get('/home', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect('/admin');
    } elseif ($user->role === 'customer') {
        return redirect('/produk');
    }
    return redirect('/logout');
});

Route::get('/', function () {
    return view('Homepage.Hero');
});
Route::get('/beranda', function () {
    return view('Homepage.Beranda');
});
Route::get('/about', function () {
    return view('Homepage.TentangKami');
});

Route::get('/registrasi', function () {
    return view('Homepage.Registrasi');
});
