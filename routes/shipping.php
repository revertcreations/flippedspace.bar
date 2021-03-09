<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

Route::post('/address/validate', [AddressController::class, 'validateAddress'])->name('address.validate');

