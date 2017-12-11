@extends('admin.layout.gentelella')
@section('css')
<!-- Switchery -->
<link href="{{ asset('templates/gentelella') }}/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<!-- iCheck -->
    <link href="{{ asset('templates/gentelella') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
@endsection
@section('content')

			<div class="x_panel">
              <div class="x_title">
                <h2>Editar Noticia: {{$noticia->titulo}}</h2>
                
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
                
                <div class="col-md-8 center-margin">
                  <form enctype="multipart/form-data" class="form-horizontal form-label-left" method="POST" action="{{url('admin/noticias/'.$noticia->id)}}">
                  	{{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                      <label>Titulo</label>
                      <input name="titulo" value="{{$noticia->titulo}}" type="text" class="form-control" placeholder="Titulo de la Noticia">
                    </div>
                    <div class="form-group">
                      <label>Descripcion</label>
                      <input name="descripcion" value="{{$noticia->descripcion}}" type="text" class="form-control" placeholder="Breve texto sobre la noticia">
                    </div>
                    <div class="form-group">
                      <label>Texto</label>
                      <textarea name="texto"  class="resizable_textarea form-control" placeholder="Texto de la noticia">{{$noticia->texto}}</textarea>
                    </div>
                    <div class="form_group">
                      <label>Imagen actual</label>
                      <br>
                      <div class="col-md-4">
                        <div class="thumbnail">
                          
                            <img src="{{url('imagenes/noticias/'.$noticia->imagen)}}" alt="Lights" style="width:100%">
                            <div class="caption">
                              <p>{{$noticia->imagen}}</p>
                            </div>
                          
                        </div>
                      </div>
                      <br>
                    	<label>Nueva Imagen (dejar en blanco si desea mantener imagen)*jpg, max: 3 MB.</label>
                    	<input type="file" name="imagen" class="form-control">
                    </div>
                    <br>
                    <div class="form_group">
                      <label>Galeria de Fotos asociada:</label>
                      <select name="galeria" class="form-control">
                        @if($noticia->galeria)
                        <option value="{{$noticia->galeria->id}}" selected>{{$noticia->galeria->nombre}}</option>
                        @endif
                        <option value="-1" >No asociar ninguna</option>
                        @foreach($galerias as $galeria)
                        <option value="{{$galeria->id}}">{{$galeria->titulo}}</option>
                        @endforeach
                      </select>
                    </div>
                    <br>
                    <div class="form_group">
                    	<label>Destacado</label>
                    	<br>
                        @if($noticia->destacado)
                        <input name="destacado" type="checkbox" class="js-switch" checked/>
                        @else
                        <input name="destacado" type="checkbox" class="js-switch" />
                        @endif
                        
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Enviar</button>
                  </form>
                </div>

                
              </div>
            </div>

@endsection
@section('js')
    <!-- Switchery -->
    <script src="{{ asset('templates/gentelella') }}/vendors/switchery/dist/switchery.min.js"></script>
    <!-- iCheck -->
    <script src="{{ asset('templates/gentelella') }}/vendors/iCheck/icheck.min.js"></script>
@endsection