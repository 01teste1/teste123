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
// Route::get('pacote', 'PagesController@getPacote')->name('pacote');
Route::get('carrinho', 'PagesController@getCarrinho');
Route::get('checkout', 'PagesController@getCheckout');

//route select produto_veiculo
Route::get('/select_veiculo','AdminProdutoVeiculoController@fill_select_veiculo');

//pacotes
Route::get('/pacotes', 'ProdutoController@index')->name('pacotes');
Route::get('/pacote/{id}','ProdutoController@show')->name('produto.show');

Route::get('/produto/data/{id}','ProdutoController@getDataUnavailable')->name('produto.getData');


//carrinho
Route::get('/carrinho/add/{id}','ProdutoController@addCarrinho')->name('produto.addCarrinho');
Route::get('/carrinho/atualizar/{id}/{qtd}','ProdutoController@atualizarCarrinho')->name('produto.atualizarCarrinho');
Route::get('/carrinho/remover/{id}','ProdutoController@removerDoCarrinho')->name('produto.removerDoCarrinho');
Route::get('/carrinho/limpar','ProdutoController@limparCarrinho')->name('produto.limparCarrinho');

//checkout
Route::post('/pedido','ProdutoController@criarPedido')->name('produto.pedido');
Route::get('/pagamento')->name('pagseguro.redirect');
Route::get('/notificacao')->name('pagseguro.notification');


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
