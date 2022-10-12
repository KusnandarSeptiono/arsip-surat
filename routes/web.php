<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;

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

Route::get('/', [ArsipController::class, 'index'])->name('arsipindex');
Route::get('buat-arsip-baru', [ArsipController::class, 'create'])->name('buat_arsip');
Route::post('arsip-store', [ArsipController::class, 'store'])->name('arsip_store');
Route::get('lihat-arsip/{id}', [ArsipController::class, 'show'])->name('lihat_arsip');
Route::get('unduh{file}', [ArsipController::class, 'download'])->name('unduh_arsip');
Route::get('edit{id}', [ArsipController::class, 'edit'])->name('edit_arsip');
Route::post('arsip/update/{id}', [ArsipController::class, 'update'])->name('arsip_update');
Route::get('arsip/destroy/{id}', [ArsipController::class, 'destroy'])->name('arsip_delete');
Route::get('about', [ArsipController::class, 'about'])->name('about');
Route::post('cari-arsip', [ArsipController::class, 'search'])->name('cari');
