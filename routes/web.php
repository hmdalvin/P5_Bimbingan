<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RakBukuController;
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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {


    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['admin'])->group(function () {
        Route::get('admin', [AdminController::class, 'index']);
        Route::get('/laporan/pdf', [LaporanController::class, 'generate']);
        Route::resource('rakbuku', RakBukuController::class);
    });

    Route::get('user', [UserController::class, 'index']);
    Route::get('/laporan/pdf', [LaporanController::class, 'generate']);
    Route::resource('laporan', LaporanController::class);
});

require __DIR__ . '/auth.php';
