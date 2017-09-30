<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Produto;
use Cart;
class ProdutoController extends Controller
{
    
    public function index(){
        $produtos = Produto::where('produtos.status','Ativo')->paginate(10);    
        
        return view('paginas_cliente.pacote')->withProdutos($produtos);
    }    
 
    public function show($id){   
        $produto = Produto::find($id);

        $imagens = DB::table('imagens')
        ->where('imagens.id_produto','=',$id)->get();

        // $veiculos = DB::table('produto_veiculo')
        // ->join('tipo_veiculos','tipo_veiculos.id','=','produto_veiculo.id_veiculo')
        // ->select('produto_veiculo.id_veiculo as id_veiculo','tipo_veiculos.capacidade as capacidade','tipo_veiculos.nome','tipo_veiculos.qtd as qtd_veic')
        // ->where('produto_veiculo.id_produto','=',$id)->get();
 
        return view('paginas_cliente.produto')->withProduto($produto)->withImagens($imagens)->withVeiculos($veiculos)->withDatas($datas);
    }

    public function addCarrinho($id, Request $request){

        $messages = [
            'date_format' => 'O campo :attribute precisa ter um formato válido. Por favor, você pode verificar isso?'
        ];
        
        $validator = Validator::make($request->all(),[
            'veiculo' => 'required|numeric|integer|exists:tipo_veiculos,id',
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
            $idveiculo = $request->input('veiculo');
            $qtdVeic = $request->input('qtdVeic');

            $produto = Produto::find($id);
            $veiculo = Produto::find($id)->veiculos()->where('id_tipo_veiculo',$idveiculo)->first();
            
            Cart::add($produto->id, $produto->nome, $qtd,$veiculo->pivot->preco , ['imagem' => $produto->imagemCapa,'data' => $data,'horario' => $horario,'veiculo' => $veiculo->nome,'qtdVeic' => $qtdVeic]);
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
        ->join('tipo_veiculos','tipo_veiculos.id','=','item_pedido.id_tipo_veiculo')                
        ->select(DB::raw("CAST(tipo_veiculos.qtd AS SIGNED) - count(item_pedido.id_tipo_veiculo) as qtd, DATE_FORMAT(item_pedido.data_passeio,'%d/%m/%Y') as data_passeio"),'item_pedido.id_tipo_veiculo','tipo_veiculos.capacidade')        
        ->whereBetween('item_pedido.data_passeio', [Carbon::today()->addDay(3)->toDateString(),Carbon::today()->addYear()->toDateString()])
        ->where('item_pedido.id_produto','=',$id)        
        ->where('item_pedido.id_tipo_veiculo','=',$veic)        
        ->groupBy('item_pedido.data_passeio','item_pedido.id_tipo_veiculo','tipo_veiculos.capacidade')       
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

    public function getMinMax(){

    }

}
