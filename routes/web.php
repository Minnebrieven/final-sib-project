<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiUserController;
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


Route::get('/dashboard',[DashboardController::class,'index'])->middleware('peran:admin-manager-staff')->name('dashboard');

Route::get('/table', function () {
    return view('private.table');
})->middleware('auth');

Route::resource('/user',UserController::class)->middleware('peran:admin');

Route::get('/access-denied', function () {
    return view('private.access_denied');
})->middleware('auth');

Route::get('/generate-pdf', [TransaksiController::class, 'generatePDF']);
Route::get('/transaksi-pdf', [TransaksiController::class, 'transaksiPDF']);

Route::get('/generate-pdf', [BeritaController::class, 'generatePDF']);
Route::get('/berita-pdf', [BeritaController::class, 'beritaPDF']);


Route::resource('/berita', BeritaController::class)->middleware('peran:admin-manager-staff');
Route::resource('/sampah', SampahController::class)->middleware('peran:admin-manager-staff');
Route::resource('/detail_transaksi', DetailTransaksiController::class)->middleware('peran:admin-manager-staff');
Route::resource('/jenissampah', JenisSampahController::class)->middleware('peran:admin-manager-staff');
Route::resource('/kategoriberita', KategoriBeritaController::class)->middleware('peran:admin-manager-staff');
Route::resource('/transaksi', TransaksiController::class)->middleware('peran:admin-manager-staff');
Route::resource('/metode_pembayaran', MetodePembayaranController::class)->middleware('peran:admin-manager-staff');
Route::resource('/transaksiku', TransaksiUserController::class)->middleware('auth');

Route::get('/news', [BeritaController::class, 'news']);
Route::get('/news/{id}', [BeritaController::class, 'showNews']);



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

//-----Rest API----
Route::get('/api-users', [UserController::class, 'apiUsers']);
Route::get('/api-user/{id}', [UserController::class, 'apiUserDetail']);