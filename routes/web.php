<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\KriteriaController;
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
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/table', function () {
    return view('table');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::resource('data-user', DataUserController::class);
Route::resource('data-guru', DataGuruController::class);
Route::resource('data-periode', PeriodeController::class);
Route::resource('data-kriteria', KriteriaController::class);
