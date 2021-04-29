<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessoSeletivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processo_seletivo', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('nome');
			$table->string('edital');
			$table->string('edital_caminho');
			$table->unsignedBigInteger('unidade_id');
           		$table->foreign('unidade_id')->references('id')->on('unidade');
			$table->date('inscricao_inicio');
			$table->date('inscricao_fim');
			$table->date('data_prova');
			$table->date('data_resultado');
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
        Schema::dropIfExists('processo_seletivo');
    }
}
