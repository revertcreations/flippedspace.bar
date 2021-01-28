<?php

use App\Http\Controllers\Users\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

