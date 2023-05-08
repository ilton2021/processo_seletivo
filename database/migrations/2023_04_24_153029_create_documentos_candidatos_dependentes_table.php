<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosCandidatosDependentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_candidatos_dependentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_processo_seletivo');
            $table->foreign('id_processo_seletivo')->references('id')->on('processo_seletivo');
            $table->string('id_candidato');
            $table->string('id_documento');
            $table->string('caminho');
            $table->string('nome_arquivo');
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
        Schema::dropIfExists('documentos_candidatos_dependentes');
    }
}
