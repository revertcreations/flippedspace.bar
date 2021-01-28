<?php

use App\Http\Controllers\Users\Listings\ArtisanColorwayListingController;

use Illuminate\Support\Facades\Route;

Route::get('/listings/artisans', [ArtisanColorwayListingController::class, 'index'])->name('listings.artisans')->middleware('auth');
// Route::get('/listings/artisans/{artisan}/create', [ArtisanColorwayListingController::class, 'create'])->name('listings.artisans.create')->middleware('auth');

Route::get('/listings/artisans/{artisan_listing_id}', [ArtisanColorwayListingController::class, 'show'])->name('listings.artisans.show')->middleware('auth');
Route::post('/listings/artisans/{artisan_listing_id}', [ArtisanColorwayListingController::class, 'store'])->name('listings.artisans.store')->middleware('auth');
Route::put('/listings/artisans/{artisan_listing_id}', [ArtisanColorwayListingController::class, 'update'])->name('listings.artisans.update')->middleware('auth');
Route::post('/listings/artisans/{artisan_listing_id}', [ArtisanColorwayListingController::class, 'destroy'])->name('listings.artisans.destroy')->middleware('auth');
Route::get('/listings/artisans/{artisan_listing_id}/edit', [ArtisanColorwayListingController::class, 'edit'])->name('listings.artisans.edit')->middleware('auth');


Route::get('/listings/artisans/create/{artisan}', [ArtisanColorwayListingController::class, 'create'])->name('listings.artisans.create')->middleware('auth');


Route::post('/listings/artisans/{artisan_listing_id}/publish', [ArtisanColorwayListingController::class, 'publish'])->name('listings.artisans.publish')->middleware('auth');
Route::post('/listings/artisans/{artisan_listing_id}/unpublish', [ArtisanColorwayListingController::class, 'unpublish'])->name('listings.artisans.unpublish')->middleware('auth');
