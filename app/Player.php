<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Player extends Model
{
    protected	$table = 'players';

    protected	$fillable = ['id','usuario_id','socio_id','nombre','apellido_pat','apellido_mat','tipo','nivel_categoria','pareja_nombre','pareja_apellido_pat','pareja_apellido_mat','brazo_habil','reves','fecha_nacimiento','modalidad','posicion','puntos','partidos_jugados','torneos_jugados','torneos_ganados'];

    

    public function usuario()
    {
    	return $this->belongsTo('App\Usuario')->withDefault();
    }
    public function socio()
    {
    	return $this->belongsTo('App\Socio')->withDefault();
    }

    public function  partido_ganado()
	{
		return $this->hasMany('App\Partido', 'ganador_id', 'id');
	}

	public function  torneo_ganado()
	{
		return $this->hasMany('App\Torneo', 'campeon_id', 'id');
	}

	// Relaciones Muchos a Muchos
	public function torneo()
	{
		return $this->belongsToMany('App\Torneo');
	}
	public function partido()
	{
		return $this->belongsToMany('App\Partido')->withTimestamps();
	}
	public function ranking()
	{
		return $this->belongsTo('App\Ranking')->withDefault();
	}
	
	
}

