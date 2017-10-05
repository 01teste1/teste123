<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablePedidoUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedido', function (Blueprint $table) {
            $table->dropForeign(['id_cliente']);
            $table->dropColumn('id_cliente'); 
            $table->string('email')->after('obs');
            $table->string('nome_cliente')->after('data_compra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedido', function (Blueprint $table) {
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('users');
            $table->dropColumn('email');
            $table->dropColumn('nome_cliente');
        });
    }
}
