<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableColaboradorAddCampos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('colaborador', function (Blueprint $table) {
            $table->string('agencia')->before('conta_banco');
            $table->string('nome_banco')->after('telefone2');
            $table->string('email')->after('nome');
            $table->string('telefone2')->nullable()->change();
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
        Schema::table('colaborador', function (Blueprint $table) {
            $table->dropColumn('agencia')->before('conta_banco');
            $table->dropColumn('nome_banco')->after('telefone2');
            $table->dropColumn('email')->after('nome');
            $table->string('telefone2')->change();
        });
    }
}
