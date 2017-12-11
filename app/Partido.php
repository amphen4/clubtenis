<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected	$table = 'partidos';

    protected	$fillable = ['id','partido_relacionado_id','nro','ronda','jugado','torneo_id','ranking_id','marcador','ganador_id','fecha_hora','cancha_id'];

    public function torneo()
    {
    	return $this->belongsTo('App\Torneo')->withDefault();
    }
    public function ranking()
    {
    	return $this->belongsTo('App\Ranking')->withDefault();
    }
    public function cancha()
    {
    	return $this->belongsTo('App\Cancha')->withDefault();
    }

    // Relacion recursiva
    public function partidosRelacionados()
	{
	    return $this->hasMany('App\Partido', 'partido_relacionado_id', 'id'); // (nombre modelo, clave foranea en la otra tabla, clave primaria local)
	}

	public function partido()
	{
	    return $this->belongsTo('App\Partido', 'partido_relacionado_id', 'id')->withDefault(); // (modelo Padre, clave foranea, clave primaria del padre)
	}

	// Relacion gana
	public function  ganador()
	{
		return $this->belongsTo('App\Player', 'ganador_id', 'id');
	}

	// Relacion Muchos a muchos
    public function player()
	{
		return $this->belongsToMany('App\Player')->withTimestamps();
	}
}
