<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Inscrito_dobles;
use App\Inscrito_a;
use App\Inscrito_b;
use Illuminate\Support\Facades\DB;

class TemporalController extends Controller
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
    public function mostrarListas()
    {
        $lista_a = Inscrito_a::all();
        $lista_b = Inscrito_b::all();
        $lista_dobles = Inscrito_dobles::all();
        return view('admin.listas',['a' => $lista_a, 'b' => $lista_b, 'dobles' => $lista_dobles]);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardarListas(Request $request)
    {
        if(!isset($request->json))
        {
            return redirect('/admin/listas');
        }
        //dd($request);
        DB::table($request->tipo)->truncate();
        $listas = json_decode($request->json);
        foreach($listas as $j)
        {
            switch($request->tipo){
                case "inscritos_a":
                    $nuevo = new Inscrito_a;
                    $nuevo->nombre = $j->nombre;
                    $nuevo->save();
                    break;
                case "inscritos_b":
                    $nuevo = new Inscrito_b;
                    $nuevo->nombre = $j->nombre;
                    $nuevo->save();
                    break;
                case "inscritos_dobles":
                    $nuevo = new Inscrito_dobles;
                    $nuevo->nombre = $j->nombre;
                    $nuevo->save();
                    break;
            }
             
        }
        return redirect('/admin/listas');
    }

    
}
