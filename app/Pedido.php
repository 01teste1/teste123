<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //
    protected $fillable = ['nome_cliente','data_compra','valor_total','embarque','endereco','telefone','obs','email'];
    protected $table = 'pedido';
}
