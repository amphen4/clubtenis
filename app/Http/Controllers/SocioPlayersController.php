<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Player;
use Illuminate\Support\Facades\Auth;
use App\Ranking;

class SocioPlayersController extends Controller
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create($modalidad) // Muestra el formulario para crear un Jugador, diferenciando singles y dobles.
    {
        if(strcmp($modalidad,'singles')==0 && Auth::user()->getJugadorSingles()==null){

            return view('socio.playersCreate', ['modalidad' => 'singles']);
        }
        if(strcmp($modalidad,'dobles')==0 && Auth::user()->getJugadorDobles()==null){

            return view('socio.playersCreate', ['modalidad' => 'dobles']);
        }
        return view('socio.players');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->tipo=='singles')
        {
            $this->validate($request, ['fecha_nacimiento' => 'required|date', 'nombre' => 'max:30', 'apellido_pat' => 'max:30', 'apellido_mat' => 'max:30']); 
            $nuevoPlayer = new Player($request->all());
            $nuevoPlayer->save();
            return redirect('/socio/home');
        }
        if($request->tipo=='dobles')
        {
            $this->validate($request, [ 'nombre' => 'max:30', 'apellido_pat' => 'max:30', 'apellido_mat' => 'max:30', 'pareja_nombre' => 'max:30', 'pareja_apellido_pat' => 'max:30', 'pareja_apellido_mat' => 'max:30']); 
            $nuevoPlayer = new Player($request->all());
            
            $nuevoPlayer->save();

            return redirect('/socio/home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($modalidad)
    {
        if($modalidad=='singles'){
            $ranking = Ranking::where('modalidad',$modalidad)->first();
            return view('socio.playersShow',['player' => Auth::user()->getJugadorSingles(), 'ranking' => $ranking, 'modalidad' => $modalidad]);
        }
        if($modalidad=='dobles'){
            $ranking = Ranking::where('modalidad',$modalidad)->first();
            return view('socio.playersShow',['player' => Auth::user()->getJugadorDobles(), 'ranking' => $ranking, 'modalidad' => $modalidad]);
        }
        return redirect('/socio/home');
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
