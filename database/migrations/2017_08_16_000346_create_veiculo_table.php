<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo');
            $table->string('luxo');
            $table->integer('id_colaborador')->unsigned();
            $table->foreign('id_colaborador')->references('id')->on('colaborador');
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
        Schema::dropIfExists('veiculo');
    }
}
