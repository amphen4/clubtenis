<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Player;
use App\Ranking;
use App\Partido;

class SocioRankingsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['socio','auth:socio']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function misResultados()
    {
        
        $rankings = Ranking::all();
        $listas = null;
        $playersUser = null;
        foreach ($rankings as $ranking)
        {
            
            
            $player = Auth::user()->player()->where('ranking_id',$ranking->id)->first();
            if($player)
            {
                $playersUser[] = Auth::user()->player()->where('ranking_id',$ranking->id)->first();
                $listas[]= $player->partido()->where('ranking_id',$ranking->id)->orderBy('fecha_hora','desc')->get();
            }
            else
            {
                $playersUser[] = null;
                $listas[] = null;
            }

        }
        //if(!$listas) return view('socio.home',['mensajes' => ['No participas en ningun ranking aun'] ]);
        return view('socio.resultadosRanking',['rankings' => $rankings , 'listas' => $listas, 'playersUser' => $playersUser]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $rankings = Ranking::all();
        foreach ($rankings as $ranking)
        {
            $listas[]= $ranking->player()->orderBy('puntos','desc')->get();
            $playersUser[] = Auth::user()->player()->where('ranking_id',$ranking->id)->first();
            
        }
        
        return view('socio.indexRankings',['rankings' => $rankings , 'listas' => $listas, 'playersUser' => $playersUser]);
    }

    public function inscribir($modalidad)
    {
        if($modalidad == 'singles')
        {
            
            if(Auth::user()->getJugadorSingles())
            {
                if(Auth::user()->getJugadorSingles()->ranking_id == null)
                {
                    $ranking = Ranking::where('modalidad','singles')->first();
                    $ranking->ingresarJugador(Auth::user()->getJugadorSingles());
                    return redirect(url('/socio/rankings'));
                }
                return redirect(url('/socio/home'));
            }
        }
        if($modalidad == 'dobles')
        {
            if(Auth::user()->getJugadorDobles())
            {
                if(Auth::user()->getJugadorDobles()->ranking_id == null)
                {
                    $ranking = Ranking::where('modalidad','dobles')->first();
                    $ranking->ingresarJugador(Auth::user()->getJugadorDobles());
                    redirect(url('/socio/rankings'));
                }
                return redirect(url('/socio/home'));
            }
        }
        return redirect(url('/socio/home'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
