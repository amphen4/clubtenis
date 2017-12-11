<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected	$table = 'rankings';

    protected	$fillable = ['id','nombre','nro_participantes','modalidad','puntos_partido_ganado','puntos_partido_perdido'];

    public function partido()
    {
        return $this->hasMany('App\Partido');
    }
    public function player()
	{
		return $this->hasMany('App\Player');
	}
    public function actualizar()
    {
        $lista = $this->player()->orderBy('puntos','desc')->get();
        $i = 1;
        
        foreach($lista as $player)
        {
            if($i == 1)
            {
                $player->posicion = $i;
                $player->save();
                $ptos_anterior = $player->puntos;
                $pos_anterior = $i;
                $i++;
            }
            else
            {
                if($player->puntos == $ptos_anterior)
                {
                    $player->posicion = $pos_anterior;
                    $player->save();
                }
                else
                {
                    $pos_anterior = $i;
                    $ptos_anterior = $player->puntos;
                    $player->posicion = $i;
                    $player->save();
                }
                $i++;
            }
        }
    }
    public function ingresarJugador($player)
    {
        $this->nro_participantes++;
        $player->ranking()->associate($this);
        $player->save();
        $this->actualizar();
        $this->save();
    }
    
}
