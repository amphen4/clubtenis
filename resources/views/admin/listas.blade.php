@extends('admin.layout.gentelella')

@section('content')
			<!-- Start to do list -->
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Inscritos Dobles</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div id="lista_dobles" class="">
                    <ul class="to_do list">
                    @foreach($dobles as $j)
                      <li>
                        <p class="nombre">
                           {{$j->nombre}} </p><button class="btn btn-danger btn-xs btnELIMINAR">Eliminar</button>
                      </li>
                    @endforeach
                    </ul>
                    <hr>

                  </div>
                  <button class="btn btn-primary xs" data-toggle="modal" data-target=".bs-example-modal-sm" data-wow="lista_dobles">Agregar</button> <hr>
                  <form id="formulario_dobles" action="{{url('/admin/listas')}}" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" value="inscritos_dobles" name="tipo">
                  <input name="json" id="inpD" type="hidden">
                  <button type="submit" id="btnGC-lista_dobles" class="btn btn-default btnGC">Guardar Cambios</button>
                  </form>
                </div>
                
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Inscritos Singles A</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div id="lista_singles_a" class="">
                    <ul class="to_do list">
                    @foreach($a as $j)
                      <li>
                        <p class="nombre">
                           {{$j->nombre}} </p><button class="btn btn-danger btn-xs btnELIMINAR">Eliminar</button>
                      </li>
                    @endforeach
                    </ul>
                    <hr>

                  </div>
                  <button class="btn btn-primary xs" data-toggle="modal" data-target=".bs-example-modal-sm" data-wow="lista_singles_a">Agregar</button> <hr>
                  <form id="formulario_singles_a" action="{{url('/admin/listas')}}" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" value="inscritos_a" name="tipo">
                  <input name="json" id="inpA" type="hidden">
                  <button type="submit" id="btnGC-lista_singles_a" class="btn btn-default btnGC">Guardar Cambios</button>
                  </form>
                </div>
                
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Inscritos Singles B</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div id="lista_singles_b" class="">
                    <ul class="to_do list">
                    @foreach($b as $j)
                      <li>
                      	
                        <p class="nombre">{{$j->nombre}} </p><button class="btn btn-danger btn-xs btnELIMINAR">Eliminar</button>
                        
                      </li>
                    @endforeach
                    </ul>
                  </div>
                  <button class="btn btn-primary xs" data-toggle="modal" data-target=".bs-example-modal-sm" data-wow="lista_singles_b">Agregar</button> <hr>
                  <form id="formulario_singles_b" action="{{url('/admin/listas')}}" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" value="inscritos_b" name="tipo">
                  <input name="json" id="inpB" type="hidden">
                  <button type="submit" id="btnGC-lista_singles_b" class="btn btn-default btnGC">Guardar Cambios</button>
                  </form>
                </div>
              </div>
            </div>
            <!-- End to do list -->
<div id="modalWow" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
	  <div class="modal-content">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
	      </button>
	      <h4 class="modal-title" id="myModalLabel2">Agregando Inscrito</h4>
	    </div>
	    <div class="modal-body">
	      <input type="text" id="inp">
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	      <button type="button" value="" class="btn btn-success" id="btnGUARDAR">Guardar</button>
	    </div>

	  </div>
	</div>
</div>
@endsection

@section('js')
<script src="http://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<script>
var options = {
    valueNames: [ 'nombre' ],
    item: '<li><p class="nombre"></p><button class="btn btn-danger btn-xs btnELIMINAR">Eliminar</button></li>'
};

var listaDobles = new List('lista_dobles', options);
var listaSinglesA = new List('lista_singles_a', options);
var listaSinglesB = new List('lista_singles_b', options);

$('.btn-default').hide();



$('#modalWow').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var dato = button.data('wow'); // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this);
      modal.find('#btnGUARDAR').val(dato);
});

$('#btnGUARDAR').click(function(){
    	$('.bs-example-modal-sm').modal('hide');
    	$('#btnGC-'+$(this).val()).show();
      switch($(this).val()){
        case 'lista_dobles':
            listaDobles.add({nombre: $('#inp').val()})
            listaDobles.reIndex();
            break;
        case 'lista_singles_a':
            listaSinglesA.add({nombre: $('#inp').val()})
            listaSinglesA.reIndex();
            break;
        case 'lista_singles_b':
            listaSinglesB.add({nombre: $('#inp').val()})
            listaSinglesB.reIndex();
            break;
      }

      $('.btnELIMINAR').on('click', function(){
          var nombre = $(this).parent().find('.nombre').text();
          var divLista = $(this).parent().parent().parent();
          var div = divLista.parent();
          div.find('.btnGC').show();
          switch(divLista.attr('id')){
            case 'lista_dobles':
                listaDobles.remove('nombre', nombre);
                listaDobles.reIndex();
                break;
            case 'lista_singles_a':
                listaSinglesA.remove('nombre', nombre);
                listaSinglesA.reIndex();
                break;
            case 'lista_singles_b':
                listaSinglesB.remove('nombre', nombre);
                listaSinglesB.reIndex();
                break;
          }
        
      });
      return;
});

$('.btnELIMINAR').on('click', function(){
      var nombre = $(this).parent().find('.nombre').text();
      var divLista = $(this).parent().parent().parent();
      var div = divLista.parent();
      div.find('.btnGC').show();
      switch(divLista.attr('id')){
        case 'lista_dobles':
            listaDobles.remove('nombre', nombre);

            break;
        case 'lista_singles_a':
            listaSinglesA.remove('nombre', nombre);
            break;
        case 'lista_singles_b':
            listaSinglesB.remove('nombre', nombre);
            break;
      }
  
  });
$('#formulario_singles_b').submit(function(){
  
  $('#inpB').val( JSON.stringify(listaSinglesB));
  
});
$('#formulario_singles_a').submit(function(){
  
  $('#inpA').val( JSON.stringify(listaSinglesA));
  
});
$('#formulario_dobles').submit(function(){
  
  $('#inpD').val( JSON.stringify(listaDobles));
  
});
</script>
@endsection