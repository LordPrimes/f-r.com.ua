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

//==== Main search site === //
Route::get('/search', 'SearchPagesController\SearchdisplayController@index');
Route::get('/search/{seotitle}', 'SearchPagesController\SearchdisplayController@show');
//=== End pages  ==== //

Route::get('/backet', 'BacketPagesController\BacketDisplayController@index');


//==== Main pages site === //
Route::get('/', 'MainPagesController\MainController@index');

//=== End pages  ==== //

//==== Pages Catalog site === //
Route::get('/catalog','CatalogPagesController\CatalogController@index');

//==== End Catalog  === //

//==== Pages About site === //
Route::get('/about','AboutPagesController\AboutController@index');
//==== End About === //

//==== Pages payment site === //
Route::get('/payment','PaymentPagesController\PaymentController@index');
//==== End payment === //

//==== Pages exchangesite === //
Route::get('/exchange','ExchangePagesController\ExchangeController@index');
//==== End exchange === //

//==== Pages contact === //
Route::get('/contact','ContactPagesController\ContactController@index');
//==== End contact === //

//==== Pages blog === //
Route::get('/blog','BlogPagesController\BlogController@index');
//==== End contact === //
