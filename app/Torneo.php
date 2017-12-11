<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Torneo extends Model
{
    use Sluggable;

    protected	$table = 'torneos';

    protected	$fillable = ['id','nombre','nro_inscritos','estado','fecha_inicio','organizador','arbitro','visibilidad','max_inscritos','modalidad'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }
    
    public function partido()
    {
        return $this->hasMany('App\Partido');
    }

    public function ganador()
    {
    	return $this->belongsTo('App\Player','campeon_id', 'id')->withDefault();
    }

    // Relacion Muchos a muchos
    public function player()
	{
		return $this->belongsToMany('App\Player');
	}
}
