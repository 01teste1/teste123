<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_veiculo extends Model
{
    public function produtos(){
        return $this->belongsToMany(Produto::class,'precos_produtos','id_tipo_veiculo','id_produto')->withPivot('preco');
    }
}
