<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
class ProdutoController extends Controller
{
    public function show($id){
        $produto = Db::table('produto')->find($id);
        
        $imagens = Db::table('imagens')
        ->where('imagens.id_produto','=',$id)->get();

        return view('paginas_cliente.produto')->withProduto($produto)->withImagens($imagens);
    }

    public function adicionarCarrinho($id){ 
        $items = Db::table('produto')->find($id);
        Cart::add($items->id, $items->nome, '1', $items->preco_carro);
    }
}
