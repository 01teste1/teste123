<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Produto;
use App\Pedido;
use Cart;
use PagSeguro;
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
            
            if(isset($veiculo)){
                Cart::add($produto->id, $produto->nome, $qtd,$veiculo->pivot->preco , ['imagem' => $produto->imagemCapa,'data' => $data,'horario' => $horario,'id_tipo_veiculo' => $veiculo->id,'veiculo' => $veiculo->nome,'qtdVeic' => $qtdVeic]);
            }
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

    public function criarPedido(Request $request){

        $validator = Validator::make($request->all(),[
            'cidade' => 'required',
            'nome-cliente' => 'required|string|min:3|max:23',
            'sobrenome-cliente' => 'required|string|min:3|max:23',
            'nome-hotel' => 'required|string|min:3',
            'end-hotel' => 'required|string|min:5',
            'obs' => 'max:500',
            'email' => 'required|email',
            'telefone' => 'required|string|min:10'            
        ]);       

        // $dados['nome_cliente'] = $request->input('nome-cliente') . ' ' . $request->input('sobrenome-cliente');
        // $dados['valor_total'] = Cart::total();
        // $dados['data_compra'] = Carbon::today()->toDateString();
        // $dados['embarque'] = $request->input('nome-hotel');
        // $dados['endereco'] = $request->input('end-hotel');
        // $dados['telefone'] = $request->input('telefone');
        // $dados['obs'] = $request->input('obs');
        // $dados['email'] = $request->input('email');

        // $pedido = Pedido::create($dados);

        $carrinho = Cart::content();        
        
        // $pedido['items'] = [];
        // foreach($carrinho as $items){
        //     $item['id'] = $items->id;
        //     $item['description'] = $items->name;
        //     $item['quantity'] = $items->qty;
        //     $item['amount'] = $items->price;

        //     array_push($pedido['items'],$item);
        // }
        
        $data['items'] = [];
        foreach($carrinho as $items){
            $item['id'] = $items->id;
            $item['description'] = $items->name;
            $item['quantity'] = $items->qty;
            $item['amount'] = $items->price;

            array_push($data['items'],$item);
        }
       
        $data['sender']['email'] = $request->input('email');
        $data['sender']['name'] = $request->input('nome-cliente') . ' ' . $request->input('sobrenome-cliente');
        $data['sender']['phone'] = $request->input('telefone');
        // $data['sender']['email'] = $request->input('email');

        $checkout = PagSeguro::checkout()->createFromArray($data);
        $credentials = PagSeguro::credentials()->get();
        $information = $checkout->send($credentials); 
        $code = $information->getCode();
        

        
        return $code;    
        
        
        // $pedido = Cart::content();
        
        // $data['items'] = [];
        // foreach($pedido as $items){
        //     $item['itemId'] = $items->id;
        //     $item['itemDescription'] = $items->name;
        //     $item['itemAmount'] = $items->price;            
        //     $item['itemQuantity'] = $items->qty;

        //     array_push($data['items'],$item);
        // }

        // // $data['sender']['email'] = $request->input('email');
        // $data['sender']['name'] = $request->input('nome-cliente') . ' ' . $request->input('sobrenome-cliente');
        // $data['sender']['phone'] = $request->input('telefone');
        // // $data['sender']['email'] = $request->input('email');

               
        // $installments = explode("x",$request->input('pagseguro.installments'));
        // try {
        //     $pagseguro = PagSeguro::setReference('#1234788')
        //     ->setSenderInfo([
        //         'senderName' => $data['sender']['name'], //Deve conter nome e sobrenome
        //         'senderPhone' => '(12) 3664-2525', //$data['sender']['phone'], Código de área enviado junto com o telefone
        //         'senderEmail' => 'c15285378256444357335@sandbox.pagseguro.com.br',
        //         'senderHash' => $request->input('senderHash'),
        //         'senderCPF' => $request->input('cpf') //Ou CNPJ se for Pessoa Júridica
        //         ])
        //     ->setCreditCardHolder([
        //         'creditCardHolderName' => $request->input('pagseguro.cc_holder'), //Deve conter nome e sobrenome
        //         //'creditCardHolderPhone' => '(32) 1324-1421', //Código de área enviado junto com o telefone
        //         'creditCardHolderCPF' => $request->input('cpf'), //Ou CNPJ se for Pessoa Júridica
        //         'creditCardHolderBirthDate' => $request->input('pagseguro.data_nascimento'),
        //     ])
        //     ->setBillingAddress([
        //         'billingAddressStreet' => 'Rua/Avenida',
        //         'billingAddressNumber' => 'Número',
        //         'billingAddressDistrict' => 'Bairro',
        //         'billingAddressPostalCode' => '12345-678',
        //         'billingAddressCity' => 'cidade',
        //         'billingAddressState' => 'SP'
        //     ])
        //     ->setItems($data['items'])
        //     ->send([
        //         'paymentMethod' => $request->input('pagseguro.option'),
        //         'creditCardToken' => $request->input('creditCardToken'),
        //         'installmentQuantity' => $installments[0],
        //         'installmentValue' => $installments[1],
        //     ]); 

        // }
        // catch(\Artistas\PagSeguro\PagSeguroException $e) {
        //     $e->getCode(); //codigo do erro
        //     $e->getMessage(); //mensagem do erro
        // }      
    }

    public function getDataUnavailable($id, Request $request){
        $veic = $request->input('data');
        $data = DB::table('item_pedido')
        ->join('tipo_veiculos','tipo_veiculos.id','=','item_pedido.id_tipo_veiculo')                
        ->select(DB::raw("CAST(tipo_veiculos.qtd AS SIGNED) - count(item_pedido.id_tipo_veiculo) as qtd, DATE_FORMAT(item_pedido.data_passeio,'%d/%m/%Y') as data_passeio"),'item_pedido.id_tipo_veiculo','tipo_veiculos.capacidade')        
        ->whereBetween('item_pedido.data_passeio', [Carbon::today()->addDay(3)->toDateString(),Carbon::today()->addYear()->toDateString()])
        ->where('item_pedido.id_produto','=',$id)        
        ->where('item_pedido.id_tipo_veiculo','=',$veic)        
        ->groupBy('item_pedido.data_passeio','item_pedido.id_tipo_veiculo','tipo_veiculos.capacidade','tipo_veiculos.qtd')       
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

    public function notificacao(Request $request){
        
        $teste = PagSeguro::notification($request->notificationCode, $request->notificationType);
        dd($teste);

    }

}
