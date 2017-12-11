@extends('admin.layout.gentelella')
@section('css')
<!-- Switchery -->
<link href="{{ asset('templates/gentelella') }}/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<!-- iCheck -->
    <link href="{{ asset('templates/gentelella') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="{{ asset('templates/gentelella') }}/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Crear un Galeria</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p>En un navegador de escritorio, puede arrastrar y soltar las fotos dentro del cuadro de abajo. O bien puede hacer click en un espacio en blanco dentro del mismo cuadro para comenzar a seleccionar foto.</p>
                    <div class="form-group">
                      <label>Título</label>
                      <input name="titulo"  form="formulario" type="text" class="form-control" placeholder="Titulo de la Galeria">
                    </div>
                    <form enctype="multipart/form-data" files="true" id="formulario" method="POST" action="{{url('admin/galerias')}}" >
                      {{ csrf_field() }}
                      <div class="fallback">
                        <input name="file[]" accept="image/jpeg" type="file" multiple />
                      </div>
                    </form>
                    <br>
                    <button id="submit" form="formulario" class="btn btn-primary" type="submit">Enviar</button>
                    <br />
                    <br />
                    <br />
                    <br />
                  </div>
                </div>
              </div>
            </div>

@endsection
@section('js')
    <!-- Switchery -->
    <script src="{{ asset('templates/gentelella') }}/vendors/switchery/dist/switchery.min.js"></script>
    <!-- iCheck -->
    <script src="{{ asset('templates/gentelella') }}/vendors/iCheck/icheck.min.js"></script>
    <!-- Dropzone.js -->
    <script src="{{ asset('templates/gentelella') }}/vendors/dropzone/dist/min/min.dropzone.js"></script>
    
@endsection