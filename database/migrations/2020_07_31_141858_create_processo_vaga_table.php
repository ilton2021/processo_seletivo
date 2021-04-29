<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessoVagaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processo_vaga', function (Blueprint $table) {
        		$table->bigIncrements('id');
			$table->unsignedBigInteger('processo_seletivo_id');
            		$table->foreign('processo_seletivo_id')->references('id')->on('processo_seletivo');
			$table->unsignedBigInteger('vaga_id');
	                $table->foreign('vaga_id')->references('id')->on('vaga');
            		$table->string('taxa');
			$table->string('qtdVagas');
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
        Schema::dropIfExists('processo_vaga');
    }
}
