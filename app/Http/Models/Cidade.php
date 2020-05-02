<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidade';
    protected $fillable = [
    	'id',
        'id_estado',
        'nome',
        'ibge',
        'excluido',
    ]; 
	public $timestamps = true;

	public function state() {
      return $this->belongsTo('App\Http\Models\Estado', 'id');
    }
    
}