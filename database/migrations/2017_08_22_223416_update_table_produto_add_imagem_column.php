<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableProdutoAddImagemColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('produto', function (Blueprint $table) {
            $table->string('imagemCapa')->nullable()->after('duracao');
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
        Schema::table('produto', function (Blueprint $table) {
            $table->dropColumn('imagemCapa');
        });
    }
}
