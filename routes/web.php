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
Route::get('/addProduct', 'ProductController@add');
Route::get('/products/{product}', 'ProductController@show');
Route::get('/categories/{category}', 'CategoryController@index');
Route::get('/user/cart', 'UserController@cart');
Route::get('/user/cart/remove/{rowId}', 'UserController@remove');
Route::get('/user/cart/reset', 'UserController@reset');
Route::get('/products/addCart/{product_id}', 'UserController@addCart');

Route::post('/addProduct', 'ProductController@store');
Auth::routes();