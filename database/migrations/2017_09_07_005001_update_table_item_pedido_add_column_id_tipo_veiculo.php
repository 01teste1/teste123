<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableItemPedidoAddColumnIdTipoVeiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('item_pedido', function (Blueprint $table) {
            $table->integer('id_tipo_veiculo')->unsigned();
            $table->foreign('id_tipo_veiculo')->references('id')->on('tipo_veiculo');
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
        Schema::table('item_pedido', function (Blueprint $table) {
            $table->dropColumn('id_tipo_veiculo');
            $table->dropForeign(['id_tipo_veiculo']);
        });
    }
}
