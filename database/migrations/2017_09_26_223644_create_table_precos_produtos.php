<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePrecosProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precos_produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_produto')->unsigned();
            $table->foreign('id_produto')->references('id')->on('produto');
            $table->integer('id_tipo_veiculo')->unsigned();
            $table->foreign('id_tipo_veiculo')->references('id')->on('tipo_veiculo');
            $table->decimal('preco',6,2);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('precos_produtos');
    }
}
