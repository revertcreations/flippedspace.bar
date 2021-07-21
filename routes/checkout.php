<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
