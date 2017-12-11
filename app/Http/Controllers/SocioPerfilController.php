<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use Illuminate\Validation\Rule;

class SocioPerfilController extends Controller
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
        return view('socio.perfil');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->perfil);
        $this->validate($request, ['nombre' => 'required|string|max:30',
                                   'username' => ['required','string','max:30', Rule::unique('socios')->ignore(Auth::user()->id)
                                                    ],
                                   'email' => ['required','string','email','max:255', Rule::unique('socios')->ignore(Auth::user()->id)],
                                   'password' => 'nullable|string|min:4|confirmed', 
                                   'apellido_pat' => 'required|string|max:30', 
                                   'apellido_mat' => 'required|string|max:30', 
                                   'perfil' => 'nullable|image|max:2000|mimes:jpeg', 
                                   'profesion' => 'nullable|string|max:30', 
                                   'fono_contacto' => 'nullable|string|max:30', 
                                   'direccion' => 'nullable|string|max:30'
                                  ]);
        //dd($request);
        $socio = Auth::user();
        $socio->nombre = $request->nombre;
        $socio->username = $request->username;
        $socio->email = $request->email;
        if(!empty($request->password))
        {
            
            $socio->password = bcrypt($request->password);
        }

        $socio->apellido_pat = $request->apellido_pat;
        $socio->apellido_mat = $request->apellido_mat;
        if($request->perfil)
        {
            $file = $request->file('perfil');
            $filename = 'perfil-'.Auth::user()->id.'.jpg';
            if($file)
            {
                Storage::disk('img-perfil')->put($filename, File::get($file));
            }
        }
        if($request->profesion)
        {
            $socio->profesion = $request->profesion;
        }
        if($request->fono_contacto)
        {
            $socio->fono_contacto = $request->fono_contacto;
        }
        if($request->direccion)
        {
            $socio->direccion = $request->direccion;
        }
        $socio->save();

        return redirect('/socio/perfil')->with('mensaje','Perfil actualizado correctamente!');
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

    
    public function mostrarImagen($filename)
    {
        if(Storage::disk('img-perfil')->exists($filename))
        {
            $file = Storage::disk('img-perfil')->get($filename);
        }
        else
        {
            $file = Storage::disk('img-perfil')->get('sinfoto.jpg');
        }
        return new Response($file,200);
    }
}
