<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Torneo;
use App\Partido;
use App\Player;

class AdminTorneosController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $torneos = Torneo::all();

        return view('admin.mostrarTorneos',['torneos' => $torneos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.crearTorneo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre' => 'required|max:190', 'modalidad' => 'required', 'visibilidad' => 'required', 'organizador' => 'required|max:30', 'arbitro' => 'required','fecha_inicio' => 'required|date']);

        $nuevoTorneo = new Torneo(['nombre' => $request->nombre, 'modalidad' => $request->modalidad, 'visibilidad' => $request->visibilidad, 'organizador' => $request->organizador, 'arbitro' => $request->arbitro, 'fecha_inicio' => $request->fecha_inicio]);
        //dd($nuevoTorneo);
        $nuevoTorneo->save();

        return redirect('/admin/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $torneo = Torneo::where('slug',$slug)->first();
        if($torneo)
        {
            if($torneo->estado == 'cerrado')
            {
                $rondas = ['F','SF','CF','Ronda de 16','Ronda de 32','Ronda de 64','Ronda de 128'];
                $nro_rondas = (int) ceil(log($torneo->nro_inscritos,2));
                for($i = $nro_rondas; $i>=1; $i--)
                {
                    $partidos[] = DB::table('partidos')->where([ ['torneo_id','=',$torneo->id],['ronda','=',$rondas[$i-1]] ])->orderBy('nro','asc')->get();
                }
                
                return view('admin.verTorneo', ['torneo' => $torneo, 'rondas' => $rondas, 'nro_rondas' => $nro_rondas, 'partidos' => $partidos]);
            }
            return view('admin.verTorneo', ['torneo' => $torneo]);
        }
        else
        {
            return abort(404);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $torneo = Torneo::where('slug',$slug)->first();
        if($torneo)
        {
            if($torneo->estado == 'cerrado')
            {
                $rondas = ['F','SF','CF','Ronda de 16','Ronda de 32','Ronda de 64','Ronda de 128'];
                $nro_rondas = (int) ceil(log($torneo->nro_inscritos,2));
                for($i = $nro_rondas; $i>=1; $i--)
                {
                    $partidos[] = Torneo::find($torneo->id)->partido()->where([ ['torneo_id','=',$torneo->id],['ronda','=',$rondas[$i-1]] ])->orderBy('nro','asc')->get();
                }
                
                return view('admin.editarTorneo', ['torneo' => $torneo, 'rondas' => $rondas, 'nro_rondas' => $nro_rondas, 'partidos' => $partidos]);
            }
            return view('admin.editarTorneo', ['torneo' => $torneo]);
        }
        else
        {

        }
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
    public function cerrar(Request $request)
    {
        $this->validate($request, ['id' => 'required|exists:torneos']);
        $torneo = Torneo::find($request->id);

        if($torneo->estado == 'abierto')
        {
            $nro_rondas = (int) ceil(log($torneo->nro_inscritos,2));
            $rondas = ['F','SF','CF','Ronda de 16','Ronda de 32','Ronda de 64','Ronda de 128'];
            for($i = 0; $i < $nro_rondas; $i++)
            {
                $nro_partidos = (int) pow(2,$i);
                for($j = 1; $j <= $nro_partidos; $j++)
                {
                    if($i==0)
                    {
                        $nuevoPartido = new Partido(['ronda' => $rondas[$i], 'torneo_id' => $torneo->id, 'nro' => $j]);
                        $nuevoPartido->save();
                    }
                    else
                    {
                        $partidoRelacionado = DB::table('partidos')->where([
                                                                            ['torneo_id', '=', $torneo->id],
                                                                            ['ronda', '=', $rondas[$i-1]],
                                                                            ['nro', '=', ((int) ceil($j/2))]
                                                                        ])->first();
                        $nuevoPartido = new Partido(['ronda' => $rondas[$i], 'torneo_id' => $torneo->id, 'nro' => $j, 'partido_relacionado_id' => $partidoRelacionado->id]);
                        $nuevoPartido->save();
                    }
                }
            }
            $torneo->tamano_cuadro = (int) pow(2,$nro_rondas);
            $torneo->estado = 'cerrado';
            $torneo->save();
        }

        return redirect('admin/torneos');
        

    }
    public function actualizarPartido(Request $request)
    {
        // validar lo esencial

        $this->validate($request, ['partido_id' => 'required|exists:partidos,id',
                                    'torneo_id' => 'required|exists:torneos,id',
                                    'jugador1' => 'required',
                                    'jugador2' => 'required|different:jugador1',
                                    'fecha_hora' => 'required|date',
                                    'accion' => 'required'
                                    ]);
        if($request->accion == 'subir')
        {
            if($request->jugador1 == -1) // Poner partido como jugado=1, asociar al jugador al partido pero no como ganador, pero si pasar al jugador a la siguiente ronda.
            {
                $this->validate($request, ['jugador2' => 'exists:players,id']);
                $partido = Partido::find($request->partido_id);
                
                $partido->player()->attach($request->jugador2);
                $partido->jugado = 1;
                $siguientePartido = $partido->partido()->first();
                $siguientePartido->player()->attach($request->jugador2);
                $partido->fecha_hora = $request->fecha_hora;
                $partido->save();
                $siguientePartido->save();
                $torneo = Torneo::find($request->torneo_id);
                return redirect('/admin/home')->with('mensaje', 'Partido Cerrado con exito!');
            }
            if($request->jugador2 == -1)
            {
                $this->validate($request, ['jugador1' => 'exists:players,id']);

                $partido->player()->attach($request->jugador1);
                $partido->jugado = 1;
                $siguientePartido = $partido->partido()->first();
                $siguientePartido->player()->attach($request->jugador1);
                $partido->fecha_hora = $request->fecha_hora;
                $partido->save();
                $siguientePartido->save();
                //$torneo = Torneo::find($request->torneo_id);
                return redirect('/admin/home')->with('mensaje', 'Partido Cerrado con exito!');

            }
            $partido = Partido::find($request->partido_id);
            $partido->player()->attach($request->jugador1);
            $partido->player()->attach($request->jugador2);
            $partido->fecha_hora = $request->fecha_hora;
            $partido->save();
            return redirect('/admin/home')->with('mensaje', 'Partido Actualizado con exito!');
        }
        if($request->accion == 'cerrar')
        {

            $this->validate($request, ['ganador' => 'required|exists:players,id', 'marcador' => 'required']);
            $partido = Partido::find($request->partido_id);
            $partido->ganador_id = $request->ganador;
            $partido->marcador = $request->marcador;
            $partido->jugado = 1;
            if($partido->partido()->first())
            {
                $siguientePartido = $partido->partido()->first();
                $siguientePartido->player()->attach($request->ganador);
                $siguientePartido->save();
            }
            $partido->save();
            
            return redirect('/admin/home')->with('mensaje', 'Partido Cerrado con exito!');
        }
        return redirect('/admin/home')->with('mensaje', 'Vulneracion!');  
    }
}
