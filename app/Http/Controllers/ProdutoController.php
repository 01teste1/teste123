<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
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

        $veiculos = DB::table('produto_veiculo')
        ->join('tipo_veiculo','tipo_veiculo.id','=','produto_veiculo.id_veiculo')
        ->select('produto_veiculo.id_veiculo as id_veiculo','tipo_veiculo.capacidade as capacidade','tipo_veiculo.nome','tipo_veiculo.qtd as qtd_veic')
        ->where('produto_veiculo.id_produto','=',$id)->get();
 
        return view('paginas_cliente.produto')->withProduto($produto)->withImagens($imagens)->withVeiculos($veiculos)->withDatas($datas);
    }

    public function addCarrinho($id, Request $request){

        $messages = [
            'date_format' => 'O campo :attribute precisa ter um formato válido. Por favor, você pode verificar isso?'
        ];
        
        $validator = Validator::make($request->all(),[
            'veiculo' => 'required|numeric|integer|exists:tipo_veiculo,id',
            'data' => 'required|date_format:d/m/Y',
            'quantidade' => 'required|numeric|integer|max:10|min:1',
            'horario' => 'required|date_format:H:i'
        ],$messages);        
        
        if($validator->fails()){
            return $validator->errors();
        }else{     
            $qtd = $request->input('quantidade');       
            $data = $request->input('data');       
            $horario = $request->input('horario');       
            $veiculo = $request->input('veiculo');
            $qtdVeic = $request->input('qtdVeic');
            $veiculoNome = Db::table('tipo_veiculo')->select('nome')->find($veiculo);
            
            $item = Db::table('produto')->find($id);
            Cart::add($item->id, $item->nome, $qtd, $item->preco_carro, ['imagem' => $item->imagemCapa,'data' => $data,'horario' => $horario,'veiculo' => $veiculoNome->nome,'qtdVeic' => $qtdVeic]);
        }

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

    public function getDataUnavailable($id, Request $request){
        $veic = $request->input('data');
        $data = DB::table('item_pedido')
        ->join('tipo_veiculo','tipo_veiculo.id','=','item_pedido.id_tipo_veiculo')                
        ->select(DB::raw("CAST(tipo_veiculo.qtd AS SIGNED) - count(item_pedido.id_tipo_veiculo) as qtd, DATE_FORMAT(item_pedido.data_passeio,'%d/%m/%Y') as data_passeio"),'item_pedido.id_tipo_veiculo','tipo_veiculo.capacidade')        
        ->whereBetween('item_pedido.data_passeio', [Carbon::today()->addDay(3)->toDateString(),Carbon::today()->addYear()->toDateString()])
        ->where('item_pedido.id_produto','=',$id)        
        ->where('item_pedido.id_tipo_veiculo','=',$veic)        
        ->groupBy('item_pedido.data_passeio','item_pedido.id_tipo_veiculo','tipo_veiculo.capacidade')       
        ->get();        
        $datas = array();
        foreach($data as $veic ){
            if($veic->qtd <= 0){
                $datas['bloqueado'][] = $veic->data_passeio;                
            }else{
                $datas['vendidos']['data'][] = $veic->data_passeio;
                $datas['vendidos']['qtd'][] = $veic->qtd;
            }
        }
        
        return $datas;
    }

}
