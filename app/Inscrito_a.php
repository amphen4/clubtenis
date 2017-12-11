<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscrito_a extends Model
{

	public $timestamps = false;
    protected	$table = 'inscritos_a';

    protected	$fillable = ['id','nombre'];
}
