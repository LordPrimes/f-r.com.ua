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
Route::group(['namespace' => 'Shop\SearchPagesController'] , function(){
    Route::get('search', 'SearchController@show')->name('search');
    Route::get('search/{seotitle}', 'SearchdisplayController@show');
    Route::post('search/{seotitle}', 'ViewPostController@addcomments');
    // Route::get('{pages}','SearchdisplayController@show');
});

Route::group(['namespace' => 'Shop\ShoppingCartPagesController'] , function(){
    
    Route::get('cart', 'ShoppingCartController@show')->name('cart.show');
    Route::post('carts', 'ShoppingCartController@addcart')->name('cart.addcart');
    Route::post('/carts/{product}', 'ShoppingCartController@update')->name('cart.update');
    Route::delete('carts/{product}','ShoppingCartController@destroy')->name('cart.destroy');
  

    
});
Route::group(['namespace' => 'Shop\Mail'] , function(){
    
   Route::post('mailcheked', 'MailControllers@index');
  

    
});
Route::group(['namespace' => 'SitemapePagesController'] , function(){
     
 Route::get('sitemap.xml', 'MainSitemap@index');
     
 });
 



Route::get('/', 'CorePagesController\MainController@index')->name('main');
Route::get('/category/{Category}', 'CorePagesController\CategoryController@Category')->name('shop.category');
Route::get('/category','CorePagesController\CategoryController@Category')->name('category');




Route::get('blog','Blog\BlogMainPagesController\BlogController@index')->name('blog');
Route::get('blog/category/{Blog_Category}', 'Blog\BlogMainPagesController\BlogCategoryControllers@catagory')->name('blog/category');
Route::get('blog/{seo_url}','Blog\BlogViewPagesController\BlogsViewController@show');
Route::post('blog/{seo_url}', 'Blog\BlogViewPagesController\BlogCommentController@addcomments');









Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
 



});
