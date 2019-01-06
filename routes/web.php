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
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('categories/{id}/editsubcategory', 'Voyager\DisplaySubCategoryController@index')->name('voyager.categories.editsubcategory');
    Route::post('categories/{id}/creatsubcategory', 'Voyager\CreateSubCategoryController@index')->name('creatsubcategory');
    Route::get('robots','Voyager\RobotsController@index');
    Route::post('robots/edit','Voyager\RobotsController@edit')->name('robots');

});
Route::group(['namespace' => 'Shop\SearchPagesController'] , function(){
    Route::get('search', 'SearchController@show')->name('search');
    Route::post('typehead', 'SearchautocompleteController@autocomplete' )->name('autocomplete');

});

Route::group(['namespace' => 'Shop\ShoppingCartPagesController'] , function(){
    Route::get('cart', 'ShoppingCartController@show')->name('cart.show');
    Route::post('carts', 'ShoppingCartController@addcart')->name('cart.addcart');
    Route::post('/carts/{product}', 'ShoppingCartController@update')->name('cart.update');
    Route::delete('carts/{product}','ShoppingCartController@destroy')->name('cart.destroy');
    Route::post('orders', 'OrdersController@index')->name('orders'); 

});

Route::group(['namespace' => 'SitemapePagesController'] , function(){
    Route::get('sitemap.xml', 'MainSitemap@index');
     
 });
Route::group(['namespace' => 'Blog\BlogCorePagesController'] , function(){  
    Route::get('blog','BlogController@index')->name('blog');
    Route::get('blog/popular','EventController@index')->name('blog.popular');
    Route::get('blog/recommend','EventController@index')->name('blog.recommend');
    Route::get('blog/category/{Blog_Category}', 'BlogCategoryControllers@catagory')->name('blog/category');
    Route::get('blog/{seo_url}','BlogsViewController@show');
    Route::post('blog/{seo_url}', 'BlogCommentController@addcomments');
        
});
Route::group(['namespace' => 'CorePagesController'] , function(){
        Route::get('/', 'MainController@index')->name('main');
        Route::get('leaders', 'EventController@index')->name('leaders');
        Route::get('popular', 'EventController@index')->name('popular');
        Route::get('contact', 'ThemingController@index')->name('contact');
        Route::get('question', 'QuestionController@index')->name('question');
        Route::get('about', 'ThemingController@index')->name('about');
        Route::get('payment', 'ThemingController@index')->name('payment');
        Route::get('exchange', 'ThemingController@index')->name('exchange');
        Route::get('catalog/{Category}', 'CategoryController@Category')->name('shop.category');
        Route::get('catalog','CategoryController@index')->name('catalog');
        Route::post('{seotitle}', 'ViewPostController@addcomments');
        Route::get('{seo_title}', 'ViewdisplayController@show')->name('viewproducts');

});
        
        








