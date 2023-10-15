<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\HistoryLelangController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\HistoryLelang;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'masyarakat')->group(function () {
    Route::get('/lelang/my', [LelangController::class, 'show_by_masyarakat'])->name('lelang.saya');
    Route::get('/lelang/{barang}', [LelangController::class, 'detail'])->name('lelang.detail');
    Route::post('/lelang/{barang}', [LelangController::class, 'tawarkan'])->name('lelang.tawarkan');
    Route::get('/lelang/{barang}/edit', [LelangController::class, 'edit_tawaran'])->name('lelang.edit-tawaran');
    Route::patch('/lelang/{barang}', [LelangController::class, 'update_tawaran'])->name('lelang.update-tawaran');
});

Route::middleware('auth', 'petugas')->group(function () {
    Route::prefix('data')->group(function () {
        // Route::resource('penawaran', HistoryLelangController::class);
        Route::resource('lelang', LelangController::class);
        Route::patch('/lelang/buka/{lelang}', [LelangController::class, 'buka'])->name('lelang.buka');
        Route::patch('/lelang/tutup/{lelang}', [LelangController::class, 'tutup'])->name('lelang.tutup');
        // Route::patch('/pilih-pemenang', [LelangController::class, 'pilih_pemenang'])->name('lelang.pilih-pemenang');
        // Route::patch('/batal-pilih', [LelangController::class, 'batal_pilih'])->name('lelang.batal-pilih');


        // Route::post('/lelang/{id_barang}', [LelangController::class, 'store'])->name('lelang.store');
        // Route::get('/penawaran', [LelangController::class, 'index_penawaran'])->name('penawaran.index');
        // Route::get('/lelang/{barang}', [LelangController::class, 'detail'])->name('lelang.detail');
        // Route::post('/lelang/{barang}', [LelangController::class, 'tawarkan'])->name('lelang.tawarkan');
    });
});

Route::middleware('auth', 'petugas-admin')->group(function () {
    Route::prefix('data')->group(function () {
        Route::resource('barang', BarangController::class);
        Route::get('/laporan-lelang', [LelangController::class, 'laporan_lelang'])->name('laporan.lelang');
        Route::get('/laporan-penawaran', [LelangController::class, 'laporan_penawaran'])->name('laporan.penawaran');
        Route::get('/export-excel', [ExportController::class, 'exportExcelRil'])->name('export-excel');
    });
    // Route::get('/data/barang', [BarangController::class, 'index'])->name('barang.index');
    // Route::get('/data/barang/new', [BarangController::class, 'create'])->name('barang.create');
    // Route::post('/data/barang', [BarangController::class, 'store'])->name('barang.store');
    // Route::get('/data/barang/{barang}', [BarangController::class, 'show'])->name('barang.show');
    // Route::get('/data/barang/edit/{barang}', [BarangController::class, 'edit'])->name('barang.edit');
    // Route::patch('/data/barang/edit/{barang}', [BarangController::class, 'update'])->name('barang.update');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::prefix('data')->group(function () {
        Route::get('/user/{level}', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/{level}/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user/{level}', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/{level}/{id_user}', [UserController::class, 'edit'])->name('user.edit');
        Route::patch('/user/{level}/{id_user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{level}/{id_user}', [UserController::class, 'destroy'])->name('user.destroy');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
