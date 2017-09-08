<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Cart;
class ProdutoController extends Controller
{
    
    public function index(){
        $produtos = DB::table('produto')
        ->select('*') 
        ->where('produto.status','=','Ativo')
        ->paginate(10);
        return view('paginas_cliente.pacote')->withProdutos($produtos);
    }
 
    public function show($id){   
        $produto = DB::table('produto')->find($id);
        
        $imagens = DB::table('imagens')
        ->where('imagens.id_produto','=',$id)->get();

        $veiculo = DB::table('produto_veiculo')
        ->join('tipo_veiculo','tipo_veiculo.id','=','produto_veiculo.id_veiculo')
        ->select('produto_veiculo.id_veiculo as id_veiculo','tipo_veiculo.capacidade as capacidade','tipo_veiculo.nome')
        ->where('produto_veiculo.id_produto','=',$id)->get();

        $data = DB::table('item_pedido')
        ->join('tipo_veiculo','tipo_veiculo.id','=','item_pedido.id_tipo_veiculo')                
        ->select('item_pedido.data_passeio',DB::raw('CAST(tipo_veiculo.qtd AS SIGNED) - count(item_pedido.id_tipo_veiculo) as qtd'),'item_pedido.id_tipo_veiculo','tipo_veiculo.capacidade')        
        ->whereBetween('item_pedido.data_passeio', [Carbon::today()->toDateString(),Carbon::today()->addYear()->toDateString()])
        ->where('item_pedido.id_produto','=',$id)        
        ->groupBy('item_pedido.data_passeio','item_pedido.id_tipo_veiculo','tipo_veiculo.capacidade')       
        ->get();

        return view('paginas_cliente.produto')->withProduto($produto)->withImagens($imagens)->withVeiculo($veiculo)->withData($data);
    }

    public function addCarrinho($id){ 
        $item = Db::table('produto')->find($id);
        Cart::add($item->id, $item->nome, '1', $item->preco_carro, ['imagem' => $item->imagemCapa]);
    }

    public function atualizarCarrinho($id,$qtd){ 
        Cart::update($id,$qtd);
    }

    public function removerDoCarrinho($id){ 
        Cart::remove($id);
    }

    public function limparCarrinho(){ 
        Cart::destroy();
    }
}
