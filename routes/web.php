<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserController;

use App\Models\Menu;


Route::get('/menu', function () {
    return view('menu');
});

Route::get('/detail', function () {
    return view('detail');
});



Route::get('/', [HomeController::class, 'index']);
Route::get('/menu', [MenuController::class, 'menu']);
Route::get('/detail/{id}', [HomeController::class, 'detail']);


Route::middleware('auth')->group(function(){
    Route::get('/AddToCart/{id}', [HomeController::class, 'AddToCart']);
    Route::get('/DelFormCart/{id}', [HomeController::class, 'DelFormCart']);
    Route::get('/DestroyFormCart/{id}', [HomeController::class, 'DestroyFormCart']);
    Route::get('/cart', [HomeController::class, 'cart']);
    Route::get('/riwayat', [HomeController::class, 'riwayat']);
    Route::get('/checkout/{id}', [HomeController::class, 'checkout']);
    Route::get('/checkout-status/{id}', [HomeController::class, 'checkoutStatus']);
});

Route::middleware(['admin'])->group(function(){
    Route::resource('/admin/menu', MenuController::class);
    Route::resource('/admin/pelanggan', UserController::class);
    Route::resource('/admin/laporan', LaporanController::class);
    Route::resource('/admin/kategori', CategoryController::class);
    Route::resource('/admin/order', OrderController::class);
    Route::resource('/admin/pesanan', PesananController::class);
    Route::resource('/admin/komentar', KomentarController::class);

    Route::get('/print/menu', [MenuController::class, 'print']);
    Route::get('/print/pelanggan', [UserController::class, 'print']);
    Route::get('/print/laporan', [LaporanController::class, 'print']);
    Route::get('/print/kategori', [CategoryController::class, 'print']);
    Route::get('/print/order', [OrderController::class, 'print']);
    Route::get('/print/pesanan', [PesananController::class, 'print']);
    Route::get('/print/komentar', [KomentarController::class, 'print']);

});

Route::middleware(['driver'])->group(function(){
    Route::get('driver/pending', [KurirController::class, 'pending']);
    Route::get('driver/selesai', [KurirController::class, 'selesai']);
    Route::post('driver/konfirmasi/{id}', [KurirController::class, 'konfirmasi']);
});

//Admin


Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signout'])->name('signout');

