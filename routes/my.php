<?php

use App\Http\Controllers\My\CollectionsController;
use App\Http\Controllers\ArtisanColorwaysController;
use App\Http\Controllers\My\DashboardController;
use App\Http\Controllers\UserArtisanColorwayImagesController;
use App\Http\Controllers\UserArtisanColorwayListingsController;
use App\Http\Controllers\UserArtisanColorwaysController;
use Illuminate\Support\Facades\Route;


Route::get('/my/dashboard', [DashboardController::class, 'index'])
                ->middleware('auth')
                ->name('dashboard');

Route::get('/my/collections', [CollectionsController::class, 'index'])->middleware('auth');
Route::get('/my/collections/artisans', [ArtisanColorwaysController::class, 'show']);
Route::post('/my/collections/artisans/store', [UserArtisanColorwaysController::class, 'store'])->name('myArtisans.store');
Route::post('/my/collections/artisans/destroy', [UserArtisanColorwaysController::class, 'destroy'])->name('myArtisans.destroy');
Route::post('/my/collections/artisans/images/store', [UserArtisanColorwayImagesController::class, 'store'])->name('myArtisanImages.add');

Route::get('/my/listings/artisans', [UserArtisanColorwayListingsController::class, 'index'])->name('my.listings.artisans');
Route::get('/my/listings/artisans/{user_artisan_colorway_id}', [UserArtisanColorwayListingsController::class, 'show'])->name('my.listings.artisans.show');
Route::post('/my/listings/artisans/{user_artisan_colorway_id}', [UserArtisanColorwayListingsController::class, 'store'])->name('my.listings.artisans.store');

