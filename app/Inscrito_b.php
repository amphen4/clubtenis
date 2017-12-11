<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscrito_b extends Model
{
	public $timestamps = false;
    protected	$table = 'inscritos_b';

    protected	$fillable = ['id','nombre'];
}
