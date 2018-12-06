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

Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');

Route::middleware('auth:api')->group(function () {
    Route::get('user', 'PassportController@details');
    Route::get('user/{id}', 'PassportController@details');
});


// List articles
Route::get('articles', 'ArticleController@index');
// List single article
Route::get('article/{id}', 'ArticleController@show');
// Create new article
Route::post('article', 'ArticleController@store');
// Update article
Route::put('article/{id}', 'ArticleController@update');
// Delete article
Route::delete('article/{id}', 'ArticleController@destroy');


Route::get('carts', 'CartController@index');
// List single article
Route::get('cart/{id}', 'CartController@show');
// Create new article
Route::post('cart', 'CartController@store');
// Update article
Route::put('cart/{id}', 'CartController@update');
// Delete article
Route::delete('cart/{id}', 'CartController@destroy');



Route::get('foods', 'FoodController@index');
// List single article
Route::get('food/{id}', 'FoodController@show');



