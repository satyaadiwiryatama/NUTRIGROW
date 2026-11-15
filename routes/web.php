<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/isi-piringku/ibu-hamil', [PageController::class, 'hamil'])->name('hamil');
Route::get('/isi-piringku/ibu-menyusui', [PageController::class, 'menyusui'])->name('menyusui');
Route::get('/mpasi/{usia?}', [PageController::class, 'mpasi'])->name('mpasi');
Route::get('/about-me', [PageController::class, 'about'])->name('about');
