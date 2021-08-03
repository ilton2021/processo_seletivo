<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaoLiderancaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao_lideranca', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
			$table->string('cpf');
			$table->string('cargo');
            $table->string('email');
			$table->string('funcao');
			$table->string('setor');
            $table->date('data');
			$table->string('justificativa_rh');
            $table->string('justificativa_gestor');
            $table->unsignedBigInteger('processo_seletivo_id');
           	$table->foreign('processo_seletivo_id')->references('id')->on('processo_seletivo');
            $table->integer('id_candidato');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacao_lideranca');
    }
}
