<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->longText('descricao');
            $table->text('detalhes');
            $table->string('duracao');
            $table->decimal('preco_carro',6,2);
            $table->decimal('preco_mini_van',6,2);
            $table->decimal('preco_van',6,2);
            $table->decimal('preco_micro_onibus',6,2);
            $table->integer('id_categoria')->unsigned();            
            $table->string('status');            
            $table->timestamps();
            $table->foreign('id_categoria')->references('id')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto');
    }
}
