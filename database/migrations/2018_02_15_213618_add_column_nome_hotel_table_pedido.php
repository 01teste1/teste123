<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnNomeHotelTablePedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pedido', function (Blueprint $table) {            
            $table->string('embarque')->after('valor_total');
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
        Schema::table('pedido', function (Blueprint $table) {            
            $table->dropColumn('embarque')->after('valor_total');
        });
    }
}
