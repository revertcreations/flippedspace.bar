<?php

use App\Http\Controllers\User\ListingController;
use Illuminate\Support\Facades\Route;

Route::get('/listings', [ListingController::class, 'index'])->name('listings')->middleware('auth');
Route::post('/listings', [ListingController::class, 'store'])->name('listings.store')->middleware('auth');
Route::get('/listings/create/{category?}/{catalog_key?}', [ListingController::class, 'create'])->name('listings.create')->middleware('auth');

Route::put('/listings/{listing}', [ListingController::class, 'update'])->name('listings.update')->middleware('auth');
Route::post('/listings/{listing}', [ListingController::class, 'destroy'])->name('listings.destroy')->middleware('auth');

Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show')->middleware('auth');
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->name('listings.edit')->middleware('auth');

Route::put('/listings/{listing}/publish', [ListingController::class, 'publish'])->name('listings.publish')->middleware('auth');
Route::put('/listings/{listing}/unpublish', [ListingController::class, 'unpublish'])->name('listings.unpublish')->middleware('auth');
