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

Route::get('/', 'PagesController@getIndex');
Route::get('pacote', 'PagesController@getPacote');
Route::get('carrinho', 'PagesController@getCarrinho');
Route::get('checkout', 'PagesController@getCheckout');
