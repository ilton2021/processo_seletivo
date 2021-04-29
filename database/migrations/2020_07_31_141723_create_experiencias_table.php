<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencias', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('candidato_id');
            $table->foreign('candidato_id')->references('id')->on('candidato');
			$table->string('empresa');
			$table->string('cargo');
			$table->string('atribuicao');
			$table->string('comentario');
			$table->date('data_inicio');
			$table->date('data_fim');
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
        Schema::dropIfExists('experiencias');
    }
}
