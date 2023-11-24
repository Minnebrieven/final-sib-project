<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DataTransaksiController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/', function () {
    return view('private.dashboard');
});

Route::get('/dashboard', function () {
    return view('private.dashboard');
});

Route::get('/table', function () {
    return view('private.table');
});



Route::resource('/berita', BeritaController::class);
Route::resource('/datatransaksi', DataTransaksiController::class);
Route::resource('/jenissampah', JenisSampahController::class);
Route::resource('/kategoriberita', KategoriBeritaController::class);
Route::resource('/penjual', PenjualController::class);
Route::resource('/transaksi', TransaksiController::class);



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

Route::get('/about', function () {
    return view('public.about');
});

Route::get('/departments', function () {
    return view('public.departments');
});

Route::get('/services', function () {
    return view('public.services');
});

Route::get('/Tim', function () {
    return view('public.Tim');
});

Route::get('/cp', function () {
    return view('public.contact');
});
