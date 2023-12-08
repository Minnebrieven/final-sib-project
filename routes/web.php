<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/table', function () {
    return view('private.table');
});



Route::resource('/berita', BeritaController::class);
Route::resource('/sampah', SampahController::class);
Route::resource('/detail_transaksi', DetailTransaksi::class);
Route::resource('/jenissampah', JenisSampahController::class);
Route::resource('/kategoriberita', KategoriBeritaController::class);
Route::resource('/transaksi', TransaksiController::class);
Route::resource('/metode_pembayaran', MetodePembayaranController::class);



/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('public.home');
});

Route::get('/home', function () {
    return view('public.home');
});

Route::get('/menu', function () {
    return view('public.menu');
});

Route::get('/organik', function () {
    return view('public.organik');
});

Route::get('/nonorganik', function () {
    return view('public.nonorganik');
});

Route::get('/services', function () {
    return view('public.services');
});

Route::get('/Tim', function () {
    return view('public.Tim');
});

Route::get('/contact', function () {
    return view('public.contact');
});
