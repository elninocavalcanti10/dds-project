<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtapasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etapas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->BigIncrements('id');
            $table->unsignedBigInteger('id_projeto');
            $table->string('nome',255);
            $table->string('codigo',20);
            $table->text('detalhes_item');
            $table->text('local');
            $table->tinyInteger('status');
            $table->string('nome_gestor',100);
            $table->tinyInteger('excluido')->default(0);
            $table->dateTime('data_termino')->nullable();
            $table->string('ling_ferramentas', 250);
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
        Schema::dropIfExists('etapas');
    }
}
