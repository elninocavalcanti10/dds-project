<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Etapas extends Model
{
    use Notifiable;
    protected $table = 'etapas';
    protected $fillable = [
        'id', 
        'nome', 
        'user', 
        'data_prevista',
        'data_entrega',
        'obs_dt_prevista', 
        'obs_dt_entrega', 
        'excluido',
    ];
    public $timestamps = true;
}
