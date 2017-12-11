@extends('admin.layout.gentelella')

@section('content')

    

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Galerias de fotos en el sistema </h2>
        <div class="pull-right">
          <a href="{{url('/admin/galerias/create')}}" class="btn btn-primary">Nueva Galeria</a>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <table class="table table-bordered">
          <thead>
            <tr>
            
              <th>ID</th>
              <th>Nombre</th>
              <th>Nro. de Fotos</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($galerias as $galeria)
            
            <tr>
              <td>{{$galeria->id}}</td>
              <td>{{$galeria->nombre}}</td>
              <td>{{$galeria->galery_photo()->count()}}</td>
              <td><a href="{{url('/admin/galerias/'.$galeria->id.'/edit')}}" class="btn btn-warning btn-xs">Editar</a><button disabled class="btn btn-danger btn-xs">Eliminar</button></td>
            </tr>
            
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
</div>
<div id="lptm" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">¿Está seguro?</h4>
          </div>
          <form id="formwea" data-parsley-validate role="form" method="POST" action="{{ url('/admin/torneos/cerrar') }}">
            {{ csrf_field() }}
            <input type="hidden" id="input" name="id" value="">
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              

              <button type="submit" class="btn btn-primary">Continuar</button>
              
            </div>
          </form>
        </div>
      </div>
  </div>
@endsection
@section('js')
$<script>
$(document).ready(function(){
    $("#botonModal").click(function(){
        $(".bs-example-modal-sm").modal("show");
        $('#input').val($(this).val());
    });
    
        
});
</script>
@endsection