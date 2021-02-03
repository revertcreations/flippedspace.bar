<?php

use App\Http\Controllers\Users\Listings\ArtisanColorwayListingController;

use Illuminate\Support\Facades\Route;

Route::get('/listings/artisans', [ArtisanColorwayListingController::class, 'index'])->name('listings.artisans')->middleware('auth');
Route::post('/listings/artisans', [ArtisanColorwayListingController::class, 'store'])->name('listings.artisans.store')->middleware('auth');
Route::put('/listings/artisans/{artisan_colorway_listing}', [ArtisanColorwayListingController::class, 'update'])->name('listings.artisans.update')->middleware('auth');
Route::post('/listings/artisans/{artisan_colorway_listing}', [ArtisanColorwayListingController::class, 'destroy'])->name('listings.artisans.destroy')->middleware('auth');
Route::get('/listings/artisans/{artisan_colorway_listing}', [ArtisanColorwayListingController::class, 'show'])->name('listings.artisans.show')->middleware('auth');
Route::get('/listings/artisans/{artisan_colorway_listing}/edit', [ArtisanColorwayListingController::class, 'edit'])->name('listings.artisans.edit')->middleware('auth');
Route::get('/listings/artisans/create/{users_artisan_colorway}', [ArtisanColorwayListingController::class, 'create'])->name('listings.artisans.create')->middleware('auth');
Route::put('/listings/artisans/{artisan_colorway_listing}/publish', [ArtisanColorwayListingController::class, 'publish'])->name('listings.artisans.publish')->middleware('auth');
Route::put('/listings/artisans/{artisan_colorway_listing}/unpublish', [ArtisanColorwayListingController::class, 'unpublish'])->name('listings.artisans.unpublish')->middleware('auth');
