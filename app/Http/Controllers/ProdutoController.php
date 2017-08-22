<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    //publi
    public function index(){
        $produtos = Db::table('produto')
        ->join('imagens','produto.id','=','imagens.id_produto')
        ->select('produto.nome','produto.preco_carro','imagens.nome as imagem')    
        ->where('produto.status','=','Ativo') 
        ->where('imagens.nome','like','%capa%') 
        ->paginate(9);
        return view('paginas_cliente.pacote')->withProdutos($produtos);
    }
}
