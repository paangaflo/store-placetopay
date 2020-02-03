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

Route::get('/', 'HomeController@index');

Auth::routes(['reset' => false]);

Route::get('/products', 'ProductController@index');

Route::get('/checkout/{product}/create', 'CheckoutController@create');

Route::post('/checkout', 'CheckoutController@store');

Route::get('/checkout/{order}', 'CheckoutController@show');

Route::get('/checkout/list/{type}', 'CheckoutController@index');

Route::get('/payment/{order}', 'PaymentController@show');

Route::post('/payment', 'PaymentController@create');

Route::get('/payment/status/{order}', 'PaymentController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('lang/{locale}', 'LocalizationController@index');
