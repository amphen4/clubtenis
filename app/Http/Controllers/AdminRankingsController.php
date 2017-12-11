<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Player;
use App\Ranking;
use App\Partido;

class AdminRankingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['admin','auth:admin']);
    }

    public function mostrarFormulario($modalidad)
    {
        if($modalidad == 'singles' || $modalidad == 'dobles')
        {
            $ranking = Ranking::where('modalidad',$modalidad)->first();
            $players = $ranking->player()->get();
            
            return view('admin.resultadoRanking',['modalidad' => $modalidad, 'players' => $players, 'ranking' => $ranking]);
        } 
        return redirect('admin/home');
        
    }

    public function registrar(Request $request)
    {
            
            $this->validate($request, ['jugador1' => 'required', 'jugador2' => 'required|different:jugador1', 'marcador' => 'required|max:30', 'ganador' => 'required', 'fecha_hora' => 'required|date']); 
            //dd($request);

            $nuevoPartido = new Partido(['marcador' => $request->marcador, 'ganador_id' => $request->ganador, 'ranking_id' => $request->ranking_id, 'fecha_hora' => $request->fecha_hora]);

            $nuevoPartido->save();

            $player1 = Player::find($request->jugador1);
            $player2 = Player::find($request->jugador2);
            $ranking = Ranking::find($request->ranking_id);
            if($player1->id == $request->ganador)
            {
                $player1->puntos = $player1->puntos + $ranking->puntos_partido_ganado;
                $player2->puntos = $player2->puntos + $ranking->puntos_partido_perdido;
                $player1->partidos_ganados++;
                $player2->partidos_perdidos++;
            }
            else
            {
                $player1->puntos = $player1->puntos + $ranking->puntos_partido_perdido;
                $player2->puntos = $player2->puntos + $ranking->puntos_partido_ganado;
                $player1->partidos_perdidos++;
                $player2->partidos_ganados++;
            }
            $player1->partidos_jugados++;
            $player2->partidos_jugados++;
            $player1->save();
            $player2->save();
            $nuevoPartido->player()->attach($player1);
            $nuevoPartido->player()->attach($player2);
            
            $ranking->actualizar();
            //$nuevoPartido->save();
            return redirect('/admin/home');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
