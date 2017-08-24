<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Cart;

class PagesController extends Controller
{
    public function getIndex(){
        Carbon::setLocale('pt_BR');
        $data = Carbon::now()->addDay(2)->toDateString();

        return view('paginas_cliente.index')->withData($data);
    }
     public function getPacote(){
        $produtos = Db::table('produto')
        ->select('produto.id','produto.nome','produto.preco_carro','produto.imagemCapa') 
        ->where('produto.status','=','Ativo')
        ->paginate(10);
        return view('paginas_cliente.pacote')->withProdutos($produtos);
    }
    public function getCarrinho(){
        Cart::add('Teste 1', 'Product 1', 1, 9.99);
        Cart::add('Teste 3', 'Product 3', 10, 5.95);

        return view('paginas_cliente.carrinho');
    }
      public function getCheckout(){
        return view('paginas_cliente.checkout');
    }
      public function getProduto(){
         return view('paginas_cliente.produto');
    }
    
}
