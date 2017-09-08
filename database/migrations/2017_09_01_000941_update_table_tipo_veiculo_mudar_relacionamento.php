<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableTipoVeiculoMudarRelacionamento extends Migration
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
            $table->dropForeign(['id_veiculo']);
            $table->dropColumn('id_veiculo');  
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
            $table->foreign('id_veiculo')->references('id')->on('veiculo');
            $table->integer('id_veiculo')->unsigned();
        });
    }
}
