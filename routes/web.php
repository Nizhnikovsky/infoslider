<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'MainPageController@index');
Route::get('/about', 'AboutController@index');

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', 'BlogController@index');
    Route::get('/{tag_id}', 'BlogController@getPostsByTag');
});
Route::get('/post/{slug}', 'BlogController@getPost');

Route::group(['prefix' => 'portfolio'], function () {
    Route::get('/', 'PortfolioController@index');
    Route::get('/{slug}', 'PortfolioController@show');
});
Route::get('/contacts', 'ContactsController@index');
Route::get('/prices', 'PricesController@index');
Route::post('/contacts/mail', 'ContactsController@sendMessage');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
