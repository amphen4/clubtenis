<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = 'galerias';

    protected $fillable = ['id','titulo','noticia_id'];

    public function galery_photo()
	{
	    return $this->hasMany('App\Galery_photo', 'galeria_id', 'id'); // (nombre modelo, clave foranea en la otra tabla, clave primaria local)
	}
	public function noticia()
	{
		return $this->belongsTo('App\Noticia','noticia_id','id');
	}
}
