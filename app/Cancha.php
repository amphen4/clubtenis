<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancha extends Model
{
    protected	$table = 'canchas';

    protected	$fillable = ['nombre','iluminacion'];

    public function partido()
    {
        return $this->hasMany('App\Partido');
    }

    // Relacion Muchos a muchos
    public function socio()
	{
		return $this->belongsToMany('App\Socio')->withPivot('hora_inicio', 'hora_termino','fecha')->withTimestamps();
	}
}
