<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stage', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->BigIncrements('id');
            $table->string('nome',255);
            $table->string('codigo',20);
            $table->text('detalhes');
            $table->text('local');
            $table->text('linguagens_ferramentas')->nullable();
            $table->tinyInteger('status');
            $table->text('observacao');
            $table->string('nome_gestor',50);
            $table->dateTime('data_termino');
            $table->tinyInteger('excluido')->default(0);
            $table->unsignedBigInteger('id_Project');
            //$table->foreign('id_categoria')->references('id')->on('categorias');
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
        Schema::dropIfExists('step');
    }
}
