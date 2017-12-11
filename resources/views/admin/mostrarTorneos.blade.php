@extends('admin.layout.gentelella')

@section('content')

    

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Torneos </h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <table class="table table-bordered">
          <thead>
            <tr>
            
              <th>Nombre Torneo</th>
              <th>Modalidad</th>
              <th>Inscritos</th>
              <th>Estado</th>
              <th>Visibilidad</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($torneos as $torneo)
            
            <tr>
              <td><a href="{{url('/admin/torneos/'.$torneo->slug)}}">{{$torneo->nombre}}</a></td>
              <td>{{$torneo->modalidad}}</td>
              <td>{{$torneo->nro_inscritos}}</td>
              <td>{{$torneo->estado}}</td>
              <td>{{$torneo->visibilidad}}</td>
              <td>@if($torneo->estado == 'abierto' && $torneo->nro_inscritos > 1 && $torneo->nro_inscritos < 129)
                  <button  value="{{$torneo->id}}" class="btn btn-success btn-xs botonModal">Cerrar</button>
                  @endif
              <a href="{{url('/admin/torneos/'.$torneo->slug.'/edit')}}" class="btn btn-warning btn-xs">Editar</a><button class="btn btn-danger btn-xs">Eliminar</button></td>
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
    $(".botonModal").click(function(){
        $(".bs-example-modal-sm").modal("show");
        $('#input').val($(this).val());
    });
    
        
});
</script>
@endsection