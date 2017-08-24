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
Route::get('produto', 'PagesController@getProduto');

//pruduto
Route::get('produto/{id}','ProdutoController@show')->name('produto.show');

Route::resource('pacote','ProdutoController');
Route::get('/add/{id}','ProdutoController@adicionarCarrinho')->name('produto.addCarrinho');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
