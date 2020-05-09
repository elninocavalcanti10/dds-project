<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamento', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->BigIncrements('id');
            $table->dateTime('data_hora');
            $table->unsignedBigInteger('id_etapa');
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
        Schema::dropIfExists('agendamento');
    }
}
