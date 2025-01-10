<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignatureController;


Route::redirect('/', '/login');


Auth::routes();

Route::middleware('auth')->group(function(){
    Route::resource('mahasiswa', MahasiswaController::class); 
});


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get("/mahasiswa/laporan/print", [MahasiswaController::class, 'print'])->name('mahasiswa.print');
Route::post('/signature/save', [SignatureController::class, 'save'])->name('signature.save');
Route::get('/mahasiswa/laporan/pdf', [LaporanController::class, 'exportPdf'])->name('laporan.export.pdf');

