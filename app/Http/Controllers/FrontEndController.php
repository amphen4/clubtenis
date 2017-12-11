<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\Noticia;
use App\Inscrito_dobles;
use App\Inscrito_a;
use App\Inscrito_b;

class FrontEndController extends Controller
{
    public function home()
    {
        
    	$files = Storage::disk('carrousel')->files();
        //dd($files);
    	foreach($files as $file)
    	{
    		$nombres[] = $file;
    	}
    	$noticiasRecientes = Noticia::orderBy('fecha_hora','desc')->limit(5)->get();
        //dd($noticiasRecientes);
    	
    	return view('frontend.home',['fotos' => $nombres, 'noticiasRecientes' => $noticiasRecientes]);
    }
    public function mostrarImagenCarrousel($filename)
    {
        if(Storage::disk('carrousel')->exists($filename))
        {
            $file = Storage::disk('carrousel')->get($filename);
            return new Response($file,200);
        }
        return error(404);
        
    }
    public function mostrarImagenOtros($filename)
    {
        if(Storage::disk('otros')->exists($filename))
        {
            $file = Storage::disk('otros')->get($filename);
            return new Response($file,200);
        }
        return error(404);
        
    }
    public function mostrarImagenNoticias($filename)
    {
        if(Storage::disk('noticias')->exists($filename))
        {
            $file = Storage::disk('noticias')->get($filename);
            return new Response($file,200);
        }
        return error(404);
        
    }
    public function mostrarImagenGaleria($filename)
    {
        if(Storage::disk('galeria')->exists($filename))
        {
            $file = Storage::disk('galeria')->get($filename);
            return new Response($file,200);
        }
        return error(404);
        
    }
    /*
    public function mostrarListas()
    {
        return view('frontend.listas',['inscritos_a' => Inscrito_a::all(), 'inscritos_b' => Inscrito_b::all(), 'inscritos_dobles' => Inscrito_dobles::all()]);
    }
    */
    public function mostrarNoticia($slug)
    {
        $noticia = Noticia::where('slug',$slug)->first();
            
        if($noticia)
        {
            $fotos = array();
            if($noticia->galeria){
                $fotos = $noticia->galeria->galery_photo;
            }
            
            return view('frontend.noticia',['noticia' => $noticia, 'noticiasRecientes' => Noticia::orderBy('fecha_hora','desc')->limit(10)->get(), 'fotos' => $fotos]);
        }
        else
        {
            return abort(404);
        }
    }
}
