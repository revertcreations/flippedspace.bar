<?php

use App\Http\Controllers\User\CollectibleImageController;
use App\Http\Controllers\User\CollectibleController;
use App\Http\Controllers\User\CollectionController;

use Illuminate\Support\Facades\Route;

Route::get('/collection', [CollectionController::class, 'index'])->name('collection')->middleware('auth');

Route::post('/collection', [CollectibleController::class, 'store'])->name('collection.store')->middleware('auth');
Route::get('/collection/{category}/{$catalog_key}', [CollectibleController::class], 'show')->name('collection.show')->middleware('auth');

Route::post('/collection/{category}/{$catalog_key}', [CollectibleController::class, 'destroy'])->name('collection.destroy')->middleware('auth');

Route::post('/collection/{category}/{$catalog_key}/images/{cloudinary_public_id}', [CollectibleImageController::class, 'store'])->name('collection.images.store')->middleware('auth');
Route::post('/collection/{category}/{$catalog_key}/images/{cloudinary_public_id}/destroy', [CollectibleImageController::class, 'destroy'])->name('collection.images.destroy')->middleware('auth');
Route::put('/collection/{category}/{$catalog_key}/images/{cloudinary_public_id}/set_cover', [CollectibleImageController::class, 'set_cover'])->name('collection.images.set_cover')->middleware('auth');