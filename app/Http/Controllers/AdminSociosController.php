<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Socio;
use Illuminate\Support\Facades\DB;

class AdminSociosController extends Controller
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
        $socios = Socio::all();
        return view('admin.mostrarSocios',['socios' => $socios]);
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
    public function mostrarRuts()
    {
        $lista = DB::table('rutsocios')->get();
        return view('admin.verRutSocios',['lista' => $lista]);

    }
    public function eliminarRut(Request $request)
    {

        DB::table('rutsocios')->where('rut','=',$request->rut)->delete();
        return redirect('/admin/ruts');
    }
    public function agregarRut(Request $request)
    {
        $this->validate($request, [
            'rut' => 'required|unique:rutsocios,rut|max:10',
            'nro_registro' => 'required'
        ]);
        DB::table('rutsocios')->insert(['rut' => $request->rut, 'nro_registro' => $request->nro_registro]);
        return redirect('/admin/ruts');
    }
}
