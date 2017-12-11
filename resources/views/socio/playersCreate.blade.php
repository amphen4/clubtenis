@extends('socio.layout.gentelella')

@section('css')
<!-- bootstrap-daterangepicker -->
<link href="{{ asset('templates/gentelella') }}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="{{ asset('templates/gentelella') }}/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
@endsection
@section('content')

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Crear Jugador <small>{{ 'Modalidad: '.$modalidad }}</small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" role="form" method="POST" action="{{ url('/socio/players') }}">
          {{ csrf_field() }}

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input readonly="readonly" name="nombre" value="{{ Auth::user()->nombre }}" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido Paterno</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input readonly="readonly" name="apellido_pat" value="{{ Auth::user()->apellido_pat }}" type="text" id="last-name" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Materno</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input readonly="readonly" name="apellido_mat" value="{{ Auth::user()->apellido_mat }}" id="middle-name" class="form-control col-md-7 col-xs-12" type="text" >
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Modalidad</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="tipo" type="text" value="{{ $modalidad }}" class="form-control" readonly="readonly" placeholder="{{ $modalidad }}">
            </div>
          </div>
          @if($modalidad=='singles')
          <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Nacimiento</label>
              <div class="controls">
                <div class='col-md-6 col-sm-6 col-xs-12 input-group date form-group'  id='myDatepicker2'>
                    <input name="fecha_nacimiento" type='text' required="required" class="form-control" placeholder="Año-Mes-Dia   Ej: 1995-02-30"  />
                    <span class="input-group-addon ">
                       <span class="fa fa-calendar-o"></span>
                    </span>
                </div>
              </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Brazo hábil</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="brazo_habil" class="form-control">
                <option>derecho</option>
                <option>izquierdo</option>
                <option>ambidiestro</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Revés</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="reves" class="form-control">
                <option>una mano</option>
                <option>dos manos</option>
              </select>
            </div>
          </div>
          @endif

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nivel categoría</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="nivel_categoria" class="form-control">
                <option selected disabled>Elige una opcion...</option>
                @if($modalidad=='singles')
                <option>cuarta</option>
                <option>tercera</option>
                <option>segunda</option>
                <option>primera</option>
                <option>honor</option>
                <option>cuarta senior</option>
                <option>tercera senior</option>
                <option>segunda senior</option>
                <option>primera senior</option>
                @else
                <option>dobles cuarta</option>
                <option>dobles tercera</option>
                <option>dobles segunda</option>
                <option>dobles primera</option>
                <option>dobles honor</option>
                <option>dobles cuarta senior</option>
                <option>dobles tercera senior</option>
                <option>dobles segunda senior</option>
                <option>dobles primera senior</option>
                @endif
              </select>
            </div>
          </div>
          @if($modalidad=='dobles')
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre pareja dobles</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="pareja_nombre" type="text"  required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido Paterno pareja dobles</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input  name="pareja_apellido_pat" type="text"  required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Materno pareja dobles</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="pareja_apellido_mat"  required="required" class="form-control col-md-7 col-xs-12" type="text" >
            </div>
          </div>
          @endif

          <input type="hidden" name="socio_id" value="{{Auth::user()->id}}">
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
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('templates/gentelella') }}/vendors/moment/min/moment.min.js"></script>
<script src="{{ asset('templates/gentelella') }}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->    
<script src="{{ asset('templates/gentelella') }}/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- Parsley -->
<script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
<script>
$('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>
@endsection