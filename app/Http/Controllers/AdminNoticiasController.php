<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Noticia;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use DateTime;
use App\Galeria;

class AdminNoticiasController extends Controller
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
        $noticias = Noticia::all();
        return view('admin.mostrarNoticias',['noticias' => $noticias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.crearNoticia',['galerias' => Galeria::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, ['titulo' => 'required|string|max:100',
                                   'texto' => 'nullable|string',
                                   'imagen' => 'required|image|max:3000|mimes:jpeg', 
                                   'destacado' => 'nullable|string',
                                   'descripcion' => 'required|string|max:180',
                                   'galeria' => 'required|numeric'
                                  ]);
        $noticia = new Noticia;
        $noticia->titulo = $request->titulo;
        $noticia->texto = $request->texto;
        $noticia->descripcion = $request->descripcion;
        if($request->galeria == '-1'){}
        else $noticia->galeria()->save(Galeria::findOrFail($request->galeria));
        if($request->destacado == 'on'){
            $noticia->destacado = 1;
        }else{
            $noticia->destacado = 0;
        }
        $fecha = new DateTime;
        $noticia->fecha_hora = $fecha->format('Y-m-d H:i:s');
        $noticia->admin_id = Auth::user()->id;
        $noticia->save();
        $file = $request->file('imagen');
        $nombreImagen = 'noticia-'.$noticia->id.'.jpg';
        if($file)
        {
            Storage::disk('noticias')->put($nombreImagen, File::get($file));
            $noticia->imagen = $nombreImagen;
            $noticia->save();
        }
        return redirect('/admin/noticias');

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
        $noticia = Noticia::find($id);
        if($noticia)
        {
            return view('admin.editarNoticia',['noticia' => $noticia, 'galerias' => Galeria::all()->whereNotIn('noticia_id',[$noticia->id])]);
        }
        else
        {
            return redirect('admin/home');
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
        
        $this->validate($request, ['titulo' => 'required|string|max:100',
                                   'texto' => 'required|string',
                                   'imagen' => 'nullable|image|max:3000|mimes:jpeg', 
                                   'destacado' => 'nullable|string',
                                   'descripcion' => 'required|string|max:180',
                                   'galeria' => 'required|numeric'
                                  ]);
        $noticia = Noticia::find($id);
        if($noticia)
        {
            $noticia->titulo = $request->titulo;
            $noticia->texto = $request->texto;
            $noticia->descripcion = $request->descripcion;
            if($request->galeria == -1){
                if($noticia->galeria){
                    $noticia->galeria->noticia_id = null;
                    $noticia->galeria->save();
                }
            }
            else{
                $galeria = Galeria::findOrFail($request->galeria);
                $galeria->noticia_id = $noticia->id;
                $galeria->save();
            }
            if( isset($request->imagen) )
            {
                $file = $request->file('imagen');
                $nombreImagen = 'noticia-'.$noticia->id.'.jpg';
                if($file)
                {
                    Storage::disk('noticias')->put($nombreImagen, File::get($file));
                    $noticia->imagen = $nombreImagen;
                    
                }
            }
            if($request->destacado == 'on'){
                $noticia->destacado = 1;
            }else{
                $noticia->destacado = 0;
            }
            $fecha = new DateTime;
            $noticia->fecha_hora = $fecha->format('Y-m-d H:i:s');
            $noticia->save();
            return redirect('admin/noticias');
        }
        else
        {
            return error(404);
        }
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
