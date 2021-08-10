<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuadroAvisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quadro_avisos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descricao');
            $table->unsignedBigInteger('processo_seletivo_id');
           	$table->foreign('processo_seletivo_id')->references('id')->on('processo_seletivo');
            $table->string('arquivo');
            $table->string('caminho_arquivo');
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
        Schema::dropIfExists('quadro_avisos');
    }
}
