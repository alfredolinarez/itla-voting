<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('validation');
});

Route::prefix('/login')->group (function(){
    Route::view('/', 'login')->name('login');
});

Route::prefix('/home')->group (function(){
    Route::view('/', 'home')->name('home');
});

