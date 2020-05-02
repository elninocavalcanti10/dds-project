<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';
    protected $fillable = [
    	'id',
        'codigo',
        'nome',
        'sigla',
        'excluido',
    ]; 
	   public $timestamps = true;

    public function city() {
      return $this->hasMany('App\Http\Models\Cidade', 'id_estado', 'id');
    }

}