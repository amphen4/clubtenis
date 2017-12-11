<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeria;
use App\Galery_photo;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminGaleriasController extends Controller
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
        return view('admin.mostrarGalerias',['galerias' => Galeria::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.crearGaleria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['titulo' => 'required|string|max:100'
                                  ]);
        $validator = Validator::make($request->all(), [
            'file.*' => 'required|image|mimes:jpeg'
        ]);
        $contador = 0;
        $galeria = new Galeria;
        $galeria->titulo = $request->titulo;
        $galeria->save();
        foreach($request->file('file') as $archivo)
        {
            $contador++;
            
            $foto = new Galery_photo;
            $filename = $archivo->getClientOriginalName();
            Storage::disk('galeria')->put($filename, File::get($archivo));
            //$foto->nombre = Storage::putFile('galeria', File::get($archivo));
            $foto->nombre = $filename;
            //dd($foto->nombre);
            //$galeria->galery_photo()->save($foto);
            $foto->galeria_id = $galeria->id;
            $foto->save();
            $wow[] = $foto->nombre;
        }
        return redirect(url('admin/galerias'));
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
        return view('admin.editarGaleria',['galeria' => Galeria::find($id)]);
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
        $validator = Validator::make($request->all(), [
            'file.*' => 'required|image|mimes:jpeg'
        ]);
        $galeria = Galeria::find($id);
        foreach($request->file('file') as $archivo)
        {
            
            
            $foto = new Galery_photo;
            $filename = $archivo->getClientOriginalName();
            Storage::disk('galeria')->put($filename, File::get($archivo));
            //$foto->nombre = Storage::putFile('galeria', File::get($archivo));
            $foto->nombre = $filename;
            //dd($foto->nombre);
            //$galeria->galery_photo()->save($foto);
            $foto->galeria_id = $galeria->id;
            $foto->save();
            
        }
        $galeria->save();
        return redirect(url('admin/galerias'));
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
