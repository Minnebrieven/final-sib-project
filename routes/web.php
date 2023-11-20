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

Route::get('/about', function () {
    return view('public.about');
});

Route::get('/departments', function () {
    return view('public.departments');
});

Route::get('/services', function () {
    return view('public.services');
});

Route::get('/doctors', function () {
    return view('public.doctors');
});

Route::get('/cp', function () {
    return view('public.contact');
});
