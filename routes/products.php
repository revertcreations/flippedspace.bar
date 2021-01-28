<?php

use App\Http\Controllers\Products\Artisans\ArtisanColorwayController;
use Illuminate\Support\Facades\Route;


Route::get('/products/artisans', [ArtisanColorwayController::class, 'index'])->name('products.artisans.index')->middleware('auth');
