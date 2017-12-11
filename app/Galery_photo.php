<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galery_photo extends Model
{
    protected $table = 'galery_photos';

    protected $fillable = ['id','nombre','galeria_id'];

    public function galeria()
    {
    	$this->belongsTo('App\Galeria','galeria_id','id');
    }
}
