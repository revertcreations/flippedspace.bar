<?php

use Illuminate\Support\Facades\Route;

Route::get('/catalog/user-submission', function(){
    return view('users.catalog.submission');
})->name('catalog.user.submission')->middleware('auth');
