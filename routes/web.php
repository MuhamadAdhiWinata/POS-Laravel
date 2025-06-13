<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\TransaksiController;
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

// Route::get('/',[HomeController::class,'index']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth:operator')->group(function () {
    Route::get('/', fn() => view('dashboard'))->name('dashboard');

        // BARANG
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/barang/form_input', [BarangController::class, 'form'])->name('barang.form_input');
    Route::post('/barang/post', [BarangController::class, 'post'])->name('barang.post');
    Route::get('barang/edit/{id}', [BarangController::class,'edit'])->name('barang.edit');
    Route::post('barang/update/{id}', [BarangController::class,'update'])->name('barang.update');
    Route::get('barang/delete/{id}', [BarangController::class,'delete'])->name('barang.delete');

    // KATEGORI
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/form_input', fn () => view('kategori.form_input'))->name('kategori.form_input');
    Route::post('/kategori/post', [KategoriController::class, 'post'])->name('kategori.post');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');

    // Operator
    Route::prefix('operator')->group(function () {
        Route::get('/', [OperatorController::class, 'index'])->name('operator.index');
        Route::get('/form_input', [OperatorController::class, 'create'])->name('operator.form_input');
        Route::post('/post', [OperatorController::class, 'post'])->name('operator.post');
        Route::get('/edit/{id}', [OperatorController::class, 'edit'])->name('operator.edit');
        Route::post('/update/{id}', [OperatorController::class, 'update'])->name('operator.update');
        Route::get('/delete/{id}', [OperatorController::class, 'delete'])->name('operator.delete');
    });

    //Transaksi
    Route::prefix('transaksi')->middleware('auth:operator')->group(function () {
        Route::get('/', [TransaksiController::class, 'create'])->name('transaksi.create');
        Route::post('/', [TransaksiController::class, 'store'])->name('transaksi.store');
        Route::get('/selesai', [TransaksiController::class, 'selesaiBelanja'])->name('transaksi.selesai');
        Route::get('/hapus/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
        Route::get('/json', [TransaksiController::class, 'index'])->name('transaksi.json'); // opsional
        Route::get('/laporan', [TransaksiController::class, 'laporan'])->name('transaksi.laporan');
        Route::post('/laporan', [TransaksiController::class, 'laporanProses'])->name('transaksi.laporan.proses');
    });

});
