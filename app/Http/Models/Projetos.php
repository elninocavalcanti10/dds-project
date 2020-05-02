<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Projetos extends Model
{
    use Notifiable;
    protected $table = 'projeto';
    protected $fillable = [
        'id', 
        'nome', 
        'id_equipe', 
        'id_ferramenta', 
        'id_site', 
        'excluido',
    ];
    public $timestamps = true;
}
