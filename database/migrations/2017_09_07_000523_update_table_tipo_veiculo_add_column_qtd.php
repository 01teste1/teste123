<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableTipoVeiculoAddColumnQtd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tipo_veiculo', function (Blueprint $table) {            
               $table->integer('qtd')->unsigned();          
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
        Schema::table('tipo_veiculo', function (Blueprint $table) {
            $table->dropColumn('qtd');
        });
    }
}
