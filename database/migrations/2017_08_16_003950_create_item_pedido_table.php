<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_pedido', function (Blueprint $table) {
            $table->increments('id');
            $table->string('data_passeio');
            $table->decimal('preco',6,2);
            $table->integer('qtd_pessoas');
            $table->integer('id_colaborador')->unsigned()->nullable();
            $table->foreign('id_colaborador')->references('id')->on('colaborador');
            $table->integer('id_veiculo')->unsigned()->nullable();
            $table->foreign('id_veiculo')->references('id')->on('veiculo');            
            $table->integer('id_produto')->unsigned();
            $table->foreign('id_produto')->references('id')->on('produto');            
            $table->integer('id_pedido')->unsigned();
            $table->foreign('id_pedido')->references('id')->on('pedido');            
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
        Schema::dropIfExists('item_pedido');
    }
}
