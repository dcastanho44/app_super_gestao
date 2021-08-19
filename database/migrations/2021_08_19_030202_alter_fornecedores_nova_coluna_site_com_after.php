<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovaColunaSiteComAfter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('site', 100)->after('nome')->nullable(); //colocando uma nova coluna depois da coluna nome da tabela
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
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->dropColumn('site');
        });
    }
}
