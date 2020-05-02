<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewCollumnsEquipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipe', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('resp_lev_requisitos', 10)->nullable();
            $table->string('resp_projeto', 10)->nullable();
            $table->string('resp_implemetacao', 10)->nullable();
            $table->string('resp_teste', 10)->nullable();
            $table->string('resp_gerencia_proj', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
