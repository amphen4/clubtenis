<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Noticia extends Model
{
    use Sluggable;
    
    protected	$table = 'noticias';

    protected	$fillable = ['id','titulo','texto','fecha_hora','destacado','imagen','admin_id','descripcion','slug'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'titulo'
            ]
        ];
    }
    public function admin()
    {
    	return $this->belongsTo('App\Admin','admin_id', 'id');
    }
    public function galeria()
    {
        return $this->hasOne('App\Galeria','noticia_id','id');
    }
}
