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
Route::get('/search', 'SearchPagesController\SearchController@show')->name('search');
//=== End pages  ==== //

Route::get('/search/{seotitle}', 'SearchPagesController\SearchdisplayController@show');
Route::post('/search/{seotitle}', 'ViewPagesController\ViewPostController@addcomments');


//==== Main pages site === //
Route::get('/', 'MainPagesController\MainController@index');

//=== End pages  ==== //


Route::get('blog','BlogPagesController\BlogController@index')->name('blog');
Route::get('blog/category/{Blog_Category}', 'BlogPagesController\BlogCategoryControllers@catagory')->name('blog/category');
Route::get('blog/{seo_url}','BlogPagesController\BlogsViewController@show');
Route::post('blog/{seo_url}', 'BlogPagesController\BlogCommentController@addcomments');
Route::post('blog/{seo_url}/comments', 'BlogPagesController\BlogsViewController@showcomment' );





//==== End contact === //


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
 



});
