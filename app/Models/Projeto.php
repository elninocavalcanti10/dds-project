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
}
