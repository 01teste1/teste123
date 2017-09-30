<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function veiculos(){
        return $this->belongsToMany(Tipo_veiculo::class,'precos_produtos','id_produto','id_tipo_veiculo')->withPivot('preco');
    }
}
