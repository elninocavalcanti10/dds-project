<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Equipes extends Model
{
    use Notifiable;
    protected $table = 'equipe';
    protected $fillable = [
        'id', 
        'nome', 
        'ativado',
        'resp_lev_requisitos', 
        'resp_projeto', 
        'resp_implemetacao', 
        'resp_teste', 
        'resp_gerencia_proj', 
        'excluido',
    ];
    public $timestamps = true;
}
