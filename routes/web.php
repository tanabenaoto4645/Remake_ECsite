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

Route::get('/products', 'ProductController@index');
Route::get('', 'ProductController@index');
Route::get('/addProduct', 'ProductController@add')->middleware('admin');
Route::get('/products/sort', 'ProductController@sortPrducts');
Route::post('/products/sort', 'ProductController@sortPrducts');
Route::get('/products/{product}/edit', 'ProductController@edit')->middleware('admin');
Route::get('/products/{product}', 'ProductController@show');
Route::get('/categories/{category}', 'CategoryController@index');
Route::get('/review', 'ProductController@review');
Route::group(['middleware' => ['auth']], function(){
    Route::get('/user/{user}/edit', 'UserController@edit');
    Route::get('/user/{user}/orders', 'UserController@orders');
    Route::get('/user/{user}/postReview', 'UserController@postReview');
    Route::post('/user/{user}/postReview', 'UserController@storeReview');
    Route::get('/user/cart', 'UserController@cart');
    Route::get('/user/cart/remove/{rowId}', 'UserController@removeCart');
    Route::get('/user/cart/reset', 'UserController@resetCart');
    Route::get('/products/addCart/{product_id}', 'UserController@addCart');
    Route::get('/products/getLikedByUserAttribute/{product}', 'ProductController@getLikedByUser');
    Route::get('/user/like', 'UserController@like');
    Route::get('/user/like/remove/{rowId}', 'UserController@removeLike');
    Route::get('/user/like/reset', 'UserController@resetLike');
    Route::get('/products/addLike/{product_id}', 'UserController@addLike');
    Route::get('/paymentComplete', 'PaymentController@payment')->name('payment');
    Route::get('/complete', 'PaymentController@complete')->name('complete');
    Route::get('/user/{user}', 'UserController@mypage');
});
Route::get('orders', 'ProductController@orders')->middleware('admin');

Route::post('/addProduct', 'ProductController@store')->middleware('admin');
Route::put('/products/{product}', 'ProductController@update');
Route::put('/user/{user}', 'UserController@update');
Auth::routes();

Route::get('/mail/send', 'MailController@send');
Route::get('/insta', 'InstaController@index');