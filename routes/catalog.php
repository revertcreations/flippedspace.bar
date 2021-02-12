<?php

use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

Route::get('/catalog/user-submission', function(){
    return view('users.catalog.submission');
})->name('catalog.user.submission')->middleware('auth');


Route::get('/catalog/{category?}', [CatalogController::class, 'index'])->name('catalog.index')->middleware('auth');
Route::post('/catalog/{category?}', [CatalogController::class, 'search'])->name('catalog.search')->middleware('auth');

