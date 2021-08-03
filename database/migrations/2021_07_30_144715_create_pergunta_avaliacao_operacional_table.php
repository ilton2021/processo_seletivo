<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerguntaAvaliacaoOperacionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pergunta_avaliacao_operacional', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('avaliacao_operacional_id');
           	$table->foreign('avaliacao_operacional_id')->references('id')->on('avaliacao_operacional');
            $table->integer('processo_seletivo_id');
            $table->integer('candidato_id');
            $table->string('resposta');
            $table->string('pergunta');
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
        Schema::dropIfExists('pergunta_avaliacao_operacional');
    }
}
