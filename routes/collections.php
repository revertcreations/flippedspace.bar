<?php

use App\Http\Controllers\Users\Collections\Artisans\ArtisanColorwayImageController;
use App\Http\Controllers\Users\Collections\CollectionController;
use App\Http\Controllers\Users\Collections\Artisans\ArtisanColorwayController;
// use App\Http\Controllers\Products\Artisans\ArtisanColorwaysController;
use Illuminate\Support\Facades\Route;


Route::get('/collections', [CollectionController::class, 'index'])->middleware('auth');

Route::get('/collections/artisans', [ArtisanColorwayController::class, 'index'])->name('collections.artisans.index')->middleware('auth');
Route::post('/collections/artisans', [ArtisanColorwayController::class, 'store'])->name('collections.artisans.store')->middleware('auth');
Route::get('/collections/artisans/{users_artisan_colorway_id}', [ArtisanColorwayController::class], 'show')->name('collections.artisans.show')->middleware('auth');

Route::post('/collections/artisans/{users_artisan_colorway_id}', [ArtisanColorwayController::class, 'destroy'])->name('collections.artisans.destroy')->middleware('auth');

Route::post('/collections/artisans/{users_artisan_colorway_id}/images', [ArtisanColorwayImageController::class, 'store'])->name('collections.artisans.images.store')->middleware('auth');
Route::post('/collections/artisans/images/destroy', [ArtisanColorwayImageController::class, 'destroy'])->name('collections.artisans.images.destroy')->middleware('auth');
Route::put('/collections/artisans/images/set_cover', [ArtisanColorwayImageController::class, 'set_cover'])->name('collections.artisans.images.set_cover')->middleware('auth');
