<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FkProjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::table('projeto', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('id_equipe')->references('id')->on('equipe');
            $table->foreign('id_site')->references('id')->on('site');
        });*/
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
