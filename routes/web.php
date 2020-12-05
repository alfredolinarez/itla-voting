<?php

use App\Http\Controllers\AuthController;
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


Route::view('/', 'validation')->name('index');

Route::middleware('auth')->group(function() {
    Route::view('/home', 'home')->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login' , [AuthController::class, 'login']);
});

Route::prefix('/homeadministrator')->group (function(){
    Route::view('/', 'homeadministrator')->name('homeadministrator');
});

Route::prefix('/crudcandidatos')->group (function(){
    Route::view('/', 'crudcandidatos')->name('crudcandidatos');
});

Route::prefix('/crudciudadanos')->group (function(){
    Route::view('/', 'crudciudadanos')->name('crudciudadanos');
});

Route::prefix('/crudpartidos')->group (function(){
    Route::view('/', 'crudpartidos')->name('crudpartidos');
});

Route::prefix('/crudpuestos')->group (function(){
    Route::view('/', 'crudpuestos')->name('crudpuestos');
});


// Route::prefix('/candidatos')->group(function() {
//     Route::view('/', 'candidatos')->name('candidatos');
// });

