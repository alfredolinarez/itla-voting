<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\CitizensController;
use App\Http\Controllers\ElectivePositionsController;
use App\Http\Controllers\ElectoralPartiesController;
use App\Http\Controllers\ElectionsController;
use App\Http\Controllers\VotesController;
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



Route::middleware('auth')->group(function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('user-only')->group(function() {
        Route::get('/positions', [VotesController::class, 'index'])->name('positions');
        Route::get('/candidates/{elective_position}', [VotesController::class, 'candidates'])->name('candidates');
        Route::post('/vote/{elective_position}', [VotesController::class, 'vote'])->name('vote');
    });

    Route::prefix('/admin')->middleware('admin-only')->group(function() {
        Route::view('/', 'admin.home')->name('admin.home');

        Route::resource('candidates', CandidatesController::class)->except('create', 'show');
        Route::resource('elective-positions', ElectivePositionsController::class)->except('create', 'show');
        Route::resource('electoral-parties', ElectoralPartiesController::class)->except('create', 'show');
        Route::resource('citizens', CitizensController::class)->except('create', 'show');
        Route::resource('elections', ElectionsController::class)->except('create');
    });
});

Route::middleware('guest')->group(function() {
    Route::view('/', 'validation')->name('validate');
    Route::post('/', [VotesController::class, 'login']);

    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login' , [AuthController::class, 'login']);
});
