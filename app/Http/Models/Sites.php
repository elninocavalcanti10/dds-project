<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Sites extends Model
{
    use Notifiable;
    protected $table = 'site';
    protected $fillable = [
        'id', 'nome', 'estado', 'cidade', 'excluido',
    ];
    public $timestamps = true;
}
