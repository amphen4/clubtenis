<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocioArriendosController extends Controller
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

    public function mostrarCalendario()
    {


    	return view('socio.calendario');
    }
}
