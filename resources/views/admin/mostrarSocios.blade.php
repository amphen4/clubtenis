@extends('admin.layout.gentelella')

@section('content')

    

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Socios Registrados </h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <table class="table table-bordered">
          <thead>
            <tr>
            
              <th>Nombre</th>
              <th>Apellido Pat</th>
              <th>Apellido Mat</th>
              <th>Rut</th>
              <th>Correo electrónico</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($socios as $socio)
            
            <tr>
              <td>{{$socio->nombre}}</td>
              <td>{{$socio->apellido_pat}}</td>
              <td>{{$socio->apellido_mat}}</td>
              <td>{{$socio->rut}}</td>
              <td>{{$socio->email}}</td>
              <td><button  disabled class="btn btn-warning btn-xs">Editar</button><button disabled class="btn btn-danger btn-xs">Eliminar</button></td>
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