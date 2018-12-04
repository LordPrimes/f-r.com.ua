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
//=== End pages  ==== //

Route::get('/search/{seotitle}', 'ViewPagesController\ViewDisplayController@show');
Route::post('/search/{seotitle}', 'ViewPagesController\ViewPostController@addcomments');


//==== Main pages site === //
Route::get('/', 'MainPagesController\MainController@index');

//=== End pages  ==== //


Route::get('/blog','BlogPagesController\BlogController@index');
Route::get('/blog/category/{Blog_Category}', 'BlogPagesController\BlogCategoryController@catagory');
Route::get('/blog/{seo_url}','BlogPagesController\BlogsViewController@show');






//==== End contact === //


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
 



});
