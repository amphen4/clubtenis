@extends('admin.layout.gentelella')

@section('css')
<!-- bootstrap-daterangepicker -->
<link href="{{ asset('templates/gentelella') }}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="{{ asset('templates/gentelella') }}/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
@endsection

@section('titulo_pagina','Ingreso nuevo resultado')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Ingreso Resultado<small>{{ 'Modalidad: '.$modalidad }}</small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" role="form" method="POST" action="{{ url('/admin/rankings/resultado') }}">
          {{ csrf_field() }}

          
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jugador 1</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="jugador1" onchange="cambiarOption1(this);" id="select1" class="form-control">
              	<option selected disabled>Elige una opcion...</option>
              	@foreach($players as $player)
              	@if($modalidad == 'singles')
                <option value="{{$player->id}}">{{$player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat}}</option>
                @else
                <option value="{{$player->id}}">{{$player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat.' - '.$player->pareja_nombre.' '.$player->pareja_apellido_pat.' '.$player->pareja_apellido_mat}}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jugador 2</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="jugador2" onchange="cambiarOption2(this);" id="select2" class="form-control">
              	<option selected disabled>Elige una opcion...</option>
              	@foreach($players as $player)
              	@if($modalidad == 'singles')
                <option value="{{$player->id}}">{{$player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat}}</option>
                @else
                <option value="{{$player->id}}">{{$player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat.' - '.$player->pareja_nombre.' '.$player->pareja_apellido_pat.' '.$player->pareja_apellido_mat}}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Marcador</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="marcador" type="text"  required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ganador</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="ganador" class="form-control">
                <option  id="option1"></option>
                <option id="option2"></option>
              </select>
            </div>
          </div>

          <div class='form-group'>
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha y Hora</label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	                <div class='input-group date' id='myDatepicker'>
	                    <input type='text' name="fecha_hora" class="form-control" placeholder="Año-Mes-Dia Hora:Minutos:Segundos Ej: 2017-07-07 22:00:00"/>
	                    <span class="input-group-addon">
	                       <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                </div>
	            </div>
	       </div>

          <input type="hidden" name="modalidad" value="{{$modalidad}}">
          <input type="hidden" name="ranking_id" value="{{$ranking->id}}">
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script>
function cambiarOption1(sel)
{
    option = document.getElementById("option1");
    option.text = $("#select1 option:selected").text();
    option.value = sel.value;
}
function cambiarOption2(sel)
{
    option = document.getElementById("option2");
    option.text = $("#select2 option:selected").text();
    option.value = sel.value;
}
</script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('templates/gentelella') }}/vendors/moment/min/moment.min.js"></script>
<script src="{{ asset('templates/gentelella') }}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->    
<script src="{{ asset('templates/gentelella') }}/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script>
    $('#myDatepicker').datetimepicker({
  		format: 'YYYY-MM-DD HH:mm:ss'
  	});
</script>
@endsection