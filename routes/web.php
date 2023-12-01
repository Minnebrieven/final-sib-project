<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DataTransaksiController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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
})->middleware('auth');

Route::resource('/user',UserController::class)->middleware('peran:admin');

Route::get('/access-denied', function () {
    return view('private.access_denied');
})->middleware('auth');

Route::resource('/berita', BeritaController::class)->middleware('peran:manager-staff');
Route::resource('/datatransaksi', DataTransaksiController::class)->middleware('peran:manager-staff');
Route::resource('/jenissampah', JenisSampahController::class)->middleware('peran:manager-staff');
Route::resource('/kategoriberita', KategoriBeritaController::class)->middleware('peran:manager-staff');
Route::resource('/penjual', PenjualController::class)->middleware('peran:manager-staff');
Route::resource('/transaksi', TransaksiController::class)->middleware('peran:manager-staff');



/*Route::get('/', function () {
    return view('welcome');
});
*/

// Route::get('/', function () {
//     return view('public.home');
// });

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

Route::get('/after-register', function () {
    return view('public.after_register');
});

Route::get('/Tim', function () {
    return view('public.Tim');
});

Route::get('/contact', function () {
    return view('public.contact');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
