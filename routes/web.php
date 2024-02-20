<?php

use App\Models\Buku;
use App\Models\Koleksi;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;


use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UlasanBukuController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\PdfController;

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
    $search = request('search') ?? '';
    $bukus = Buku::where('judul', 'like', "%{$search}%")
        ->orWhere('penulis', 'like', "%{$search}%")
        ->orWhere('penerbit', 'like', "%{$search}%")
        ->get();

    return view('welcome', compact('bukus', 'search'));
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('bukus', BukuController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('kategoribuku', KategoriBukuController::class);
    Route::resource('users', UserController::class);
    Route::resource('ulasanbuku', UlasanBukuController::class);
    Route::resource('koleksi', KoleksiController::class);
    Route::resource('peminjaman', PeminjamanController::class);
    Route::get('pdf', [PdfController::class, 'index'])->name('pdf.index');



});



require __DIR__.'/auth.php';
