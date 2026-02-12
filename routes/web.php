<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PesertaVerificationController as AdminPesertaVerificationController;
use App\Http\Controllers\Admin\NomorUrutController as AdminNomorUrutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes for participant data form
    Route::get('/peserta/form', [PesertaController::class, 'create'])->name('peserta.form');
    Route::post('/peserta/form', [PesertaController::class, 'store'])->name('peserta.store');
    Route::put('/peserta/{peserta}', [PesertaController::class, 'update'])->name('peserta.update');

    // New route for participant schedule and details
    Route::get('/peserta/jadwal', [PesertaController::class, 'showJadwal'])->name('peserta.jadwal');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Routes for Participant Data Management (now handled by UserController)
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::patch('/users/{peserta}/verify', [AdminUserController::class, 'verify'])->name('users.verify');
    Route::get('/peserta/{peserta}/pdf', [AdminUserController::class, 'downloadPDF'])->name('users.pdf');
    Route::patch('/peserta/{peserta}/jadwal', [AdminNomorUrutController::class, 'updateJadwal'])->name('peserta.jadwal.update');

    // Routes for sequence number generation
    Route::post('/nomor-urut/generate', [AdminNomorUrutController::class, 'generate'])->name('nomor-urut.generate');
    Route::post('/nomor-urut/reset', [AdminNomorUrutController::class, 'reset'])->name('nomor-urut.reset');

    // Routes for Account Verification Management (now handled by PesertaVerificationController)
    Route::get('/verifikasi', [AdminPesertaVerificationController::class, 'index'])->name('verifikasi.index');
    Route::patch('/verifikasi/{user}/activate', [AdminPesertaVerificationController::class, 'activate'])->name('verifikasi.activate');
    Route::delete('/verifikasi/{user}/destroy', [AdminPesertaVerificationController::class, 'destroy'])->name('verifikasi.destroy');

    Route::get('/dashboard', function() {
        return redirect()->route('dashboard');
    });
});


require __DIR__.'/auth.php';
