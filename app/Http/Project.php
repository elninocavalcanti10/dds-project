<?php
namespace App\Http;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Project extends Model
{
    protected $table = 'project';
    protected $fillable = [
      'id',
      'nome',
      'imagem',
      'status',
      'excluido',
    ];


	public $timestamps = true;

}