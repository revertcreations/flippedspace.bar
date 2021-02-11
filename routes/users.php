<?php

use App\Http\Controllers\User\SettingController;
use Illuminate\Support\Facades\Route;


Route::get('/settings', [SettingController::class, 'index'])->middleware('auth')->name('settings');

