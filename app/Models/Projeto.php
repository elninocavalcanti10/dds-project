<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $table = 'projeto';
    protected $fillable = [
      'id',
      'nome',
      'imagem',
      'excluido',
      'terminou',
      'id_user'
    ];
	public $timestamps = true;

  public function etapas() {
    return $this->hasMany('App\Models\Etapas', 'id_projeto', 'id')->with('etapaUser');
  }
  public function user() {
    return $this->belongsTo('App\User', 'id_user', 'id');
  }

}
