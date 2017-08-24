<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function show($id){
        $produto = Db::table('produto')->find($id);
        
        $imagens = Db::table('imagens')
        ->where('imagens.id_produto','=',$id)->get();

        return view('paginas_cliente.produto')->withProduto($produto)->withImagens($imagens);
    }
}
