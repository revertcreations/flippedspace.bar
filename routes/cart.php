<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart/add/{listing}', [CartController::class, 'store'])->name('cart.add');
Route::post('cart/destroy/{listing}', [CartController::class, 'destroy'])->name('cart.destroy');
