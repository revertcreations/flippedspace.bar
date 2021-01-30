<?php

use App\Http\Controllers\Users\SettingController;
use Illuminate\Support\Facades\Route;


Route::get('/settings', [SettingController::class, 'index'])->middleware('auth')->name('settings');

