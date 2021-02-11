<?php

use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

Route::get('/catalog/user-submission', function(){
    return view('users.catalog.submission');
})->name('catalog.user.submission')->middleware('auth');


Route::get('/catalog/{category}', [CatalogController::class, 'show'])->name('catalog.search')->middleware('auth');

