<?php

use App\Http\Controllers\Users\Listing;

use Illuminate\Support\Facades\Route;

Route::get('/listings', [Listing::class, 'index'])->name('listings')->middleware('auth');
Route::post('/listings', [Listing::class, 'store'])->name('listings.store')->middleware('auth');
Route::put('/listings/{listing}', [Listing::class, 'update'])->name('listings.update')->middleware('auth');
Route::post('/listings/{listing}', [Listing::class, 'destroy'])->name('listings.destroy')->middleware('auth');
Route::get('/listings/{listing}', [Listing::class, 'show'])->name('listings.show')->middleware('auth');
Route::get('/listings/{listing}/edit', [Listing::class, 'edit'])->name('listings.edit')->middleware('auth');
Route::get('/listings/create', [Listing::class, 'create'])->name('listings.create')->middleware('auth');
Route::put('/listings/{listing}/publish', [Listing::class, 'publish'])->name('listings.publish')->middleware('auth');
Route::put('/listings/{listing}/unpublish', [Listing::class, 'unpublish'])->name('listings.unpublish')->middleware('auth');
