<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableProdutoRemoveColumnPrecos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produto', function (Blueprint $table) {            
            $table->dropColumn('preco_carro');  
            $table->dropColumn('preco_mini_van');  
            $table->dropColumn('preco_van');  
            $table->dropColumn('preco_micro_onibus');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produto', function (Blueprint $table) {
            $table->decimal('preco_carro',6,2);
            $table->decimal('preco_mini_van',6,2);
            $table->decimal('preco_van',6,2);
            $table->decimal('preco_micro_onibus',6,2);
        });
    }
}
