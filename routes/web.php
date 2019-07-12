<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/classifieds', 'ClassifiedsController@index');
Route::get('/group_buys', 'GroupBuysController@index');
Route::get('/interest_checks', 'InterestChecksController@index');
Route::get('/artisans', 'ArtisansController@index');
Route::get('/classifieds', 'ClassifiedsController@index');
