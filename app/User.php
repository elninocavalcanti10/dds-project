<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'id',
        'name', 
        'email', 
        'password', 
        'permissoes', //7:Gerente; 1:Stakeholders(Insere data de previsão de término das etapas - Não vê Painel ADMIN e Config.) 
        'excluido',
    ];

    public $timestamps = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userEtapas() {
      return $this->hasMany('App\Models\Etapas', 'id_user', 'id');
    }
    public function projetoUser() {
      return $this->hasMany('App\Models\Projeto', 'id_user', 'id');
    }
}
