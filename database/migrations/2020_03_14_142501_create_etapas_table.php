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
            $table->bigIncrements('id');
            $table->string('nome',255);
            $table->integer('iteracoes')->nullable();
            $table->dateTime('data_prevista')->nullable();
            $table->dateTime('data_entrega')->nullable();
            $table->string('obs_dt_prevista',255)->nullable();
            $table->string('obs_dt_entrega',255)->nullable();
            $table->tinyInteger('excluido')->default(0);
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
