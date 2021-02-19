<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ListingController::class, 'index'])->name('home');
Route::get('/all', [ListingController::class, 'index'])->name('all');
Route::get('/artisans', [ListingController::class, 'index'])->name('artisans');
Route::get('/keyboards', [ListingController::class, 'index'])->name('keyboards');
Route::get('/keycaps', [ListingController::class, 'index'])->name('keycaps');
Route::get('/switches', [ListingController::class, 'index'])->name('switches');
Route::get('/pcbs', [ListingController::class, 'index'])->name('pcbs');
Route::get('/other', [ListingController::class, 'index'])->name('other');

Route::post('/search/{category?}', [ListingController::class, 'search'])->name('search');
Route::get('/listing/{listing}', [ListingController::class, 'show'])->name('listing.show');
