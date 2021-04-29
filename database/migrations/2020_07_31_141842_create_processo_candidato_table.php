<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessoCandidatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processo_candidato', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('candidato_id');
            $table->foreign('candidato_id')->references('id')->on('candidato');
			$table->unsignedBigInteger('processo_seletivo_id');
            $table->foreign('processo_seletivo_id')->references('id')->on('processo_seletivo');
			$table->date('data_inscricao');
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
        Schema::dropIfExists('processo_candidato');
    }
}
