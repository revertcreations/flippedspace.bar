<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart/{listing}/add', [CartController::class, 'store'])->name('cart.add');
Route::post('cart/{listing}/remove', [CartController::class, 'destroy'])->name('cart.item.remove');
