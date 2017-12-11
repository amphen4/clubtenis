@extends('admin.layout.gentelella')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Ruts registrados en el sistema </h2>
        <div class="pull-right">
          <button id="botonAgregar" class="btn btn-primary">Agregar Nuevo Rut</button>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <table class="table table-bordered">
          <thead>
            <tr>
            
              <th>RUT</th>
              <th>Registro de Socio</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($lista as $socio)
            
            <tr>
              <td>{{$socio->rut}}</td>
              <td>{{$socio->nro_registro}}</td>
              <td><button  value="{{$socio->rut}}" class="btn btn-danger btn-sm botonEliminar">Eliminar</button></td>
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
          <form id="formwea" data-parsley-validate role="form" method="POST" action="{{ url('/admin/eliminarRut') }}">
            {{ csrf_field() }}
            <input type="hidden" id="input" name="rut" value="">
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              

              <button type="submit" class="btn btn-primary">Continuar</button>
              
            </div>
          </form>
        </div>
      </div>
  </div>
  <div id="wao" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Agregar Rut</h4>
          </div>
          <form id="formwea" data-parsley-validate role="form" method="POST" action="{{ url('/admin/agregarRut') }}">
            
            <div class="modal-body">
              {{ csrf_field() }}
              <div class="form-group">
                  <label  class="col-md-4 control-label">Rut nuevo:</label>

                  <div class="col-md-6">
                      <input  type="text" class="form-control" name="rut" maxlength="10" >
                  </div>
              </div>
              <br>
              <div class="form-group">
                  <label  class="col-md-4 control-label">Nro. registro:</label>

                  <div class="col-md-6">
                      <input  type="number" class="form-control" name="nro_registro" min="1" >
                  </div>
              </div>
              <br>
            </div>
            <br>
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
<script>
    $('.botonEliminar').click(function(){
      $('#lptm').modal('show');
      $('#input').val($(this).val());
    });
    $('#botonAgregar').click(function(){
      $('#wao').modal('show');
    });
</script>
@endsection