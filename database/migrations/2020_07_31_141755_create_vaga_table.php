<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVagaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaga', function (Blueprint $table) {
            		$table->bigIncrements('id');
			$table->string('codigo_vaga');
			$table->string('nome');
			$table->string('categoria_profissional');
			$table->string('carga_horaria');
			$table->string('salario_bruto');
			$table->string('requisitos');
			$table->string('criterios');
			$table->string('insalubridade');
			$table->string('status');
			$table->unsignedBigInteger('processo_seletivo_id');
            		$table->foreign('processo_seletivo_id')->references('id')->on('processo_seletivo');
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
        Schema::dropIfExists('vaga');
    }
}
