<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteGroup;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index']);

// Hak Akses Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/guruAdmin', [GuruController::class, 'index'])->name('guru');
    Route::get('/guru/detail/{idGuru}', [GuruController::class, 'detail']);
    Route::get('/guru/add', [GuruController::class, 'add']);
    Route::post('/guru/insert', [GuruController::class, 'insert']);
    Route::get('/guru/edit/{id_guru}', [GuruController::class, 'edit']);
    Route::post('/guru/update/{id_guru}', [GuruController::class, 'update']);
    Route::get('/guru/hapus/{id_guru}', [GuruController::class, 'hapus']);

    Route::get('/siswaAdmin', [SiswaController::class, 'index']);
    Route::get('/siswa/print', [SiswaController::class, 'print']);
    Route::get('/siswa/printPdf', [SiswaController::class, 'printPdf']);

    Route::get('/user', [UserController::class, 'index']);


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// Hak Akses User
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/siswa', [SiswaController::class, 'index']);
});

// Hak Akses Guru
Route::middleware(['auth', 'guru'])->group(function () {
    Route::get('/guru', [GuruController::class, 'index'])->name('guru');
});
