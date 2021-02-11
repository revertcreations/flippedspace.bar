<?php

use App\Http\Controllers\User\CollectibleImageController;
use App\Http\Controllers\User\CollectibleController;
use App\Http\Controllers\User\CollectionController;

use Illuminate\Support\Facades\Route;

Route::get('/collection', [CollectionController::class, 'index'])->name('collection')->middleware('auth');

Route::get('/collection/artisans', [CollectibleController::class, 'index'])->name('collections.artisans.index')->middleware('auth');
Route::post('/collection/artisans', [CollectibleController::class, 'store'])->name('collections.artisans.store')->middleware('auth');
Route::get('/collection/artisans/{users_artisan_colorway_id}', [CollectibleController::class], 'show')->name('collections.artisans.show')->middleware('auth');

Route::post('/collection/artisans/{users_artisan_colorway_id}', [CollectibleController::class, 'destroy'])->name('collections.artisans.destroy')->middleware('auth');

Route::post('/collection/artisans/{users_artisan_colorway_id}/images', [CollectibleImageController::class, 'store'])->name('collections.artisans.images.store')->middleware('auth');
Route::post('/collection/artisans/images/destroy', [CollectibleImageController::class, 'destroy'])->name('collections.artisans.images.destroy')->middleware('auth');
Route::put('/collection/artisans/images/set_cover', [CollectibleImageController::class, 'set_cover'])->name('collections.artisans.images.set_cover')->middleware('auth');
