<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Scheduling extends Model
{
    protected $table = 'scheduling';
    protected $fillable = [
      'id',
      'data_prevista',
      'id_stage',
      'excluido',
    ];


  public $timestamps = true;

}