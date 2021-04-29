<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidato', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('nome');
			$table->string('cpf');
			$table->string('email');
			$table->string('fone_fixo');
			$table->string('celular');
			$table->string('naturalidade');
			$table->string('estado_nasc');
			$table->string('cidade_nasc');
			$table->date('data_nasc');
			$table->string('escolaridade');
			$table->string('status_escolaridade');
			$table->string('formacao');
			$table->string('cursos');
			$table->string('sexo');
			$table->string('estado_civil');
			$table->string('deficiencia');
			$table->string('arquivo_deficiencia');
			$table->string('habilitacao');
			$table->string('periodo');
			$table->string('outra_cidade');
			$table->string('arquivo_nome');
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
        Schema::dropIfExists('candidato');
    }
}
