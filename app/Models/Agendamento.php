<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'agendamento';
    protected $fillable = [
      'id',
      'id_etapa',
      'data_hora',
      'excluido',
      'id_usuario'
    ];

	public $timestamps = true;
}
