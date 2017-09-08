<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableTipoVeiculoAddRelacionamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('produto_veiculo', function (Blueprint $table) {            
            $table->integer('id_veiculo')->unsigned();
            $table->foreign('id_veiculo')->references('id')->on('tipo_veiculo');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('produto_veiculo', function (Blueprint $table) {
            $table->dropColumn('tipo_veiculo');
            $table->dropForeign(['id_veiculo']);
        });
    }
}
