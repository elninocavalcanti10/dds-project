<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Projeto', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->BigIncrements('id');
            $table->string('nome',100);
            $table->unsignedBigInteger('id_equipe')->nullable();
            $table->unsignedBigInteger('id_site')->nullable();
            $table->integer('status_projeto')->nullable();
            $table->string('id_etapas', 250)->nullable();
            $table->string('id_ferramenta', 250)->nullable();
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
        Schema::dropIfExists('projeto');
    }
}
