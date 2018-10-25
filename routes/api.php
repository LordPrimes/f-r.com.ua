<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('product')->group(function () {

Route::get('search/', 'SearchController@allproduct');
Route::get('search/{title}', 'SearchController@foundproduct');



});
Route::get('search/{id}', 'SearchController@show');



