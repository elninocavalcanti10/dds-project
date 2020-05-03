<?php
namespace App\Http;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Stage extends Model
{
    protected $table = 'stage';
    protected $fillable = [
      'id',
      'nome',
      'codigo',
      'detalhes',
      'local',
      'linguagens_ferramentas',
      'status',
      'observacao',
      'nome_gestor',
      'data_termino',
      'nome_gestor',
      'id_Project',
      'excluido',
    ];


  public $timestamps = true;

}