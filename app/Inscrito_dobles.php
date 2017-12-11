<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscrito_dobles extends Model
{

	public $timestamps = false;
    protected	$table = 'inscritos_dobles';

    protected	$fillable = ['id','nombre'];
}
