<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class LinguagensFerramentas extends Model
{
    use Notifiable;
    protected $table = 'ferramentas_linguagens';
    protected $fillable = [
        'id', 'nome', 'ativado', 'excluido',
    ];
    public $timestamps = true;
}
