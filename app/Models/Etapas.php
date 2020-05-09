<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etapas extends Model
{
   protected $table = 'etapas';
    protected $fillable = [
      'id',
      'nome',
      'codigo',
      'detalhes_item',
      'local',
      'status',
      'nome_gestor',
      'excluido',
      'id_projeto',
      'data_termino',
      'ling_ferramentas',
    ];


	public $timestamps = true;
}
