<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use PagSeguro;

class PagesController extends Controller
{
    public function getIndex(){
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
        return view('paginas_cliente.carrinho');
    }
      public function getCheckout(){
        return view('paginas_cliente.checkout');
    }
      public function getProduto(){
         return view('paginas_cliente.produto');
    }
    
}
