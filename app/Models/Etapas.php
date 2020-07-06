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
      'id_user',
    ];
	public $timestamps = true;

  public function projeto() {
    return $this->belongsTo('App\Models\Projeto', 'id');
  }

  public function etapaUser() {
    return $this->belongsTo('App\User', 'id_user', 'id');
  }

}
