<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProdutoVeiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_veiculo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_produto')->unsigned();
            $table->foreign('id_produto')->references('id')->on('produto');
            $table->integer('id_veiculo')->unsigned();
            $table->foreign('id_veiculo')->references('id')->on('veiculo');
            $table->integer('qtd_veiculo')->unsigned();            
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
        Schema::dropIfExists('produto_veiculo');
    }
}
