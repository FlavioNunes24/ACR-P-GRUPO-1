<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password', 'pais','data_nasc','saldo','tipo_utilizador'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	protected $table = 'users';
	
	public function tipo_utilizador()
	{
		return $this->belongsTo('App\tipo_utilizadores', 'tipo_utilizador');
	}
	
	public function compra()
	{
		return $this->hasMany('App\Compra', 'utilizador_id');
	}
	

}
