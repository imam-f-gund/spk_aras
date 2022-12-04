<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerangkinganController;
use App\Http\Controllers\PerhituganController;
use App\Http\Controllers\PeriodeController;
use Illuminate\Support\Facades\Auth;
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
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return view('login');;
    }
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('cek-login', [AuthController::class, 'cek_login'])->name('cek_login');

Route::get('/table', function () {
    return view('table');
});

// route middleware auth
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('data-user', DataUserController::class);
    Route::resource('data-guru', DataGuruController::class);
    Route::resource('data-periode', PeriodeController::class);
    Route::resource('data-kriteria', KriteriaController::class);
    Route::resource('penilaian', PenilaianController::class);
    Route::resource('perhitungan', PerhituganController::class);
    Route::resource('perangkingan', PerangkinganController::class)->only([
        'index', 'show',
    ]);

    Route::post('import-nilai', [PenilaianController::class, 'import'])->name('import-nilai');
});
