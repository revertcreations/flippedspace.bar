<?php

use App\Http\Controllers\My\CollectionsController;
use App\Http\Controllers\ArtisanColorwaysController;
use App\Http\Controllers\My\DashboardController;
use App\Http\Controllers\UserArtisanColorwaysController;
use Illuminate\Support\Facades\Route;


Route::get('/my/dashboard', [DashboardController::class, 'index'])
                ->middleware('auth')
                ->name('dashboard');

Route::get('/my/collections', [CollectionsController::class, 'index'])->middleware('auth');
Route::get('/my/collections/artisans', [ArtisanColorwaysController::class, 'show']);
Route::post('/my/collections/artisans/store', [UserArtisanColorwaysController::class, 'store'])->name('myArtisans.store');
Route::post('/my/collections/artisans/destroy', [UserArtisanColorwaysController::class, 'destroy'])->name('myArtisans.destroy');
