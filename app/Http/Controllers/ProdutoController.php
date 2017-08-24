<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
class ProdutoController extends Controller
{
    //publi
    public function index(){
        $produtos = Db::table('produto')
        ->select('produto.id','produto.nome','produto.preco_carro','produto.imagemCapa') 
        ->where('produto.status','=','Ativo')
        ->paginate(9);
        return view('paginas_cliente.pacote')->withProdutos($produtos);
    }

    public function show($id){
        $produto = Db::table('produto')->find($id);
        return view('paginas_cliente.produto')->withProduto($produto);
    }

    public function adicionarCarrinho($id){
        
        Cart::add($items->id, $items->nome, $items->qtd, $items->preco);
    }
}
