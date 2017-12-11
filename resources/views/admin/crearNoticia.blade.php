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
                <h2>Crear Noticia</h2>
                
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
                
                <div class="col-md-8 center-margin">
                  <form enctype="multipart/form-data" class="form-horizontal form-label-left" method="POST" action="{{ url('/admin/noticias') }}">
                  	{{ csrf_field() }}
                    <div class="form-group">
                      <label>Titulo</label>
                      <input name="titulo" type="text" class="form-control" placeholder="Titulo de la Noticia">
                    </div>
                    <div class="form-group">
                      <label>Descripcion</label>
                      <input name="descripcion" type="text" class="form-control" placeholder="Breve texto sobre la noticia">
                    </div>
                    <div class="form-group">
                      <label>Texto</label>
                      <textarea name="texto" class="resizable_textarea form-control" placeholder="Texto de la noticia"></textarea>
                    </div>
                    <div class="form_group">
                    	<label>Imagen *jpg, max: 3 MB.</label>
                    	<input type="file" name="imagen" class="form-control">
                    </div>
                    <br>
                    <div class="form_group">
                      <label>Galeria de Fotos asociada:</label>
                      <select name="galeria" class="form-control">
                        <option value="-1" >No asociar ninguna</option>
                        @foreach($galerias as $galeria)
                        <option value="{{$galeria->id}}">{{$galeria->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                    <br>
                    <div class="form_group">
                    	<label>Destacado</label>
                    	<br>
                        
                        <input name="destacado" type="checkbox" class="js-switch" />
                        
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