<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Torneo;

class SocioTorneosController extends Controller
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
        $torneos = Torneo::all();

        return view('socio.mostrarTorneos',['torneos' => $torneos]);
    }

    
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
                    $partidos[] = Torneo::find($torneo->id)->partido()->where([ ['torneo_id','=',$torneo->id],['ronda','=',$rondas[$i-1]] ])->orderBy('nro','asc')->get();
                }
                
                return view('socio.verTorneo', ['torneo' => $torneo, 'rondas' => $rondas, 'nro_rondas' => $nro_rondas, 'partidos' => $partidos]);
            }
            return view('socio.verTorneo', ['torneo' => $torneo]);
        }
        else
        {
            return abort(404);
        }
        
    }

    public function inscribir(Request $request)
    {
        $this->validate($request, ['id' => 'required|exists:torneos']);
        $torneo = Torneo::find($request->id);
        if($torneo->modalidad == 'singles')
        {
            $player = Auth::user()->getJugadorSingles();
            if($player)
            {
                $torneo->player()->attach($player->id);
                $torneo->nro_inscritos++;
                $torneo->save();
            }
            else
            {
                return redirect('socio/home')->with('mensaje','Error: No tiene jugador -singles- creado aún');
            }
        } 
        else
        {
            $player = Auth::user()->getJugadorDobles();
            if($player)
            {
                $torneo->player()->attach($player->id);
                $torneo->nro_inscritos++;
                $torneo->save();
            }
            else
            {
                return redirect('socio/home')->with('mensaje','Error: No tiene jugador -dobles- creado aún');
            }
        }
        return redirect('socio/home')->with('mensaje','Inscrito correctamente!');
    }
    public function desinscribir(Request $request) // vulnerabilidad (en inscr tmbn): que no este inscrito y mas vulner..
    {
        
        $this->validate($request, ['id' => 'required|exists:torneos']);
        $torneo = Torneo::find($request->id);
        if($torneo->modalidad == 'singles')
        {
            $player = Auth::user()->getJugadorSingles();
            if($player)
            {
                $torneo->player()->detach($player->id);
                $torneo->nro_inscritos--;
                $torneo->save();
            }
            else
            {
                return redirect('socio/home')->with('mensaje','Error: No tiene jugador -singles- creado aún');
            }
        } 
        else
        {
            $player = Auth::user()->getJugadorDobles();
            if($player)
            {
                $torneo->player()->detach($player->id);
                $torneo->nro_inscritos--;
                $torneo->save();
            }
            else
            {
                return redirect('socio/home')->with('mensaje','Error: No tiene jugador -dobles- creado aún');
            }
        }
        return redirect('socio/home')->with('mensaje','Desinscrito correctamente!');
    }
}
