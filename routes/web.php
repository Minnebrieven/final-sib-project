<?php

use Illuminate\Support\Facades\Route;

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
