<?php

use App\Http\Controllers\ArtisanColorwayListingsController;
use App\Http\Controllers\My\CollectionsController;
use App\Http\Controllers\ArtisanColorwaysController;
use App\Http\Controllers\My\DashboardController;
use App\Http\Controllers\UsersArtisanColorwayImagesController;
use App\Http\Controllers\UsersArtisanColorwayListingController;
use App\Http\Controllers\UsersArtisanColorwaysController;
use Illuminate\Support\Facades\Route;


Route::get('/my/dashboard', [DashboardController::class, 'index'])
                ->middleware('auth')
                ->name('dashboard');

Route::get('/my/collections', [CollectionsController::class, 'index'])->middleware('auth');
Route::get('/my/collections/artisans', [ArtisanColorwaysController::class, 'show']);
Route::post('/my/collections/artisans/store', [UsersArtisanColorwaysController::class, 'store'])->name('myArtisans.store');
Route::post('/my/collections/artisans/destroy', [UsersArtisanColorwaysController::class, 'destroy'])->name('myArtisans.destroy');
Route::post('/my/collections/artisans/images/store', [UsersArtisanColorwayImagesController::class, 'store'])->name('myArtisanImages.add');

Route::get('/my/listings/artisans', [UsersArtisanColorwayListingController::class, 'index'])->name('my.listings.artisans');
Route::get('/my/listings/artisans/{user_artisan_colorway_id}', [UsersArtisanColorwayListingController::class, 'show'])->name('my.listings.artisans.show');
Route::post('/my/listings/artisans/{users_artisan_colorway_id}', [UsersArtisanColorwayListingController::class, 'store'])->name('my.listings.artisans.store');


Route::post('/my/listings/artisans/{users_artisan_colorway_id}/publish', [ArtisanColorwayListingsController::class, 'publish'])->name('my.listings.artisans.publish');
Route::post('/my/listings/artisans/{users_artisan_colorway_id}/unpublish', [ArtisanColorwayListingsController::class, 'unpublish'])->name('my.listings.artisans.unpublish');
