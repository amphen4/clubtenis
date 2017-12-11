<?php

namespace App;

use App\Notifications\SocioResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

class Socio extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'rut', 'nombre', 'apellido_pat', 'apellido_mat', 'password', 'direccion', 'fono_contacto', 'profesion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SocioResetPassword($token));
    }
    // Relacion Uno a muchos
    public function  player()
    {
        return $this->hasMany('App\Player','socio_id');
    }
    public function getJugadorSingles()
    {
        if( collect($this->player->where('tipo','singles'))->isNotEmpty() )
        {
            
            return $this->player->where('tipo','singles')->first();
        }
        return null;
    }
    public function getJugadorDobles()
    {

        if( collect($this->player->where('tipo','dobles'))->isNotEmpty() )
        {
            return $this->player->where('tipo','dobles')->first();
        }
        return null;
    }
    
}
