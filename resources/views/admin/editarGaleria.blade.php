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
                <h2>Editar Galeria: </h2>
                
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
                
                <div class="col-md-8 center-margin">
                  <form enctype="multipart/form-data" class="form-horizontal form-label-left" method="POST" action="{{url('admin/galerias/'.$galeria->id)}}">
                  	{{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="fallback">
                        <input name="file[]" accept="image/jpeg" type="file" multiple />
                    </div>
                    <br>
                    
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