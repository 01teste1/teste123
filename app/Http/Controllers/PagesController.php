<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex(){
        return view('paginas_cliente.index');
    }
     public function getPacote(){
        return view('paginas_cliente.pacote');
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
