<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', [LaporanController::class, 'index'])->name('home');
Route::get('/lacak', [LaporanController::class, 'track'])->name('laporan.track');
Route::resource('laporan', LaporanController::class)->only(['index', 'store', 'show']);

// Admin & Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Admin Laporan
    Route::get('/admin/laporan', [AdminController::class, 'index_laporan'])->name('admin.laporan.index');
    Route::get('/admin/laporan/{id}', [AdminController::class, 'laporan_detail'])->name('admin.laporan.detail');
    Route::patch('/admin/laporan/{id}/status', [AdminController::class, 'update_status'])->name('admin.laporan.update_status');
    Route::post('/admin/laporan/{id}/comment', [AdminController::class, 'store_comment'])->name('admin.laporan.comment');

    // Admin Pengaduan
    Route::get('/admin/pengaduan', [AdminController::class, 'index_pengaduan'])->name('admin.pengaduan.index');
    Route::get('/admin/pengaduan/{id}', [AdminController::class, 'pengaduan_detail'])->name('admin.pengaduan.detail');

    // Master Data
    Route::resource('admin/instansi', InstansiController::class)->names('admin.instansi');
    Route::resource('admin/kategori', KategoriController::class)->names('admin.kategori');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
