@extends('socio.layout.gentelella')

@section('content')
	@forelse($torneos as $torneo)
		
					  <div class="col-md-6 col-sm-6 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>{{$torneo->nombre}}</i></h4>
                            <div class="left col-xs-7">
                              
                              <ul class="list-unstyled">
                              	<li><i class="fa fa-info-circle"></i> Inscripciones: {{ucwords($torneo->estado)}}</li>
                              	<li><i class="fa fa-group"></i> Inscritos: {{$torneo->nro_inscritos}}
                                @isset($torneo->maxinscritos)
                                (max: {{$torneo->nro_inscritos}})
                                @endisset
                                </li>
                                <li><i class="fa fa-tags"></i> Modalidad: <strong> {{ucwords($torneo->modalidad)}} </strong></li>
                                <li><i class="fa fa-calendar"></i> Fecha inicio: {{$torneo->fecha_inicio}}</li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="{{ asset('templates/gentelella/production') }}/images/torneo-{{$torneo->modalidad}}.jpg" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                          	@if($torneo->modalidad == 'singles')
                          	  @if(Auth::user()->getJugadorSingles())
                          	  	  
                          	  	  @if(Auth::user()->getJugadorSingles()->torneo()->where('torneo_id',$torneo->id)->first())
                                	@if($torneo->estado == 'abierto')
                                	<button id="botonModalDes" value="{{$torneo->id}}"  type="button" class="btn btn-warning btn-xs" > <i class="fa fa-user">
                                	</i> Desinscribirse</button>
                                	@else
                                	<button disabled type="button" class="btn btn-success btn-xs" > <i class="fa fa-user">
                                	</i> Inscrito</button>
                                	@endif
                          	  	  @else
                          	  	  	<button id="botonModal" value="{{$torneo->id}}" type="button" class="btn btn-success btn-xs" > <i class="fa fa-user">
                                	</i> Inscribirse</button>
                          	  	  @endif
                          	  @endif
                          	@else
                          	  @if(Auth::user()->getJugadorDobles())
                          	  	  @if(Auth::user()->getJugadorDobles()->torneo()->where('torneo_id',$torneo->id)->first())
                          	  	    @if($torneo->estado == 'abierto')
                                	<button id="botonModalDes" value="{{$torneo->id}}"  type="button" class="btn btn-warning btn-xs" > <i class="fa fa-user">
                                	</i> Desinscribirse</button>
                                	@else
                                	<button disabled type="button" class="btn btn-success btn-xs" > <i class="fa fa-user">
                                	</i> Inscrito</button>
                                	@endif
                          	  	  @else
                          	  	  	<button id="botonModal" value="{{$torneo->id}}" type="button" class="btn btn-success btn-xs" > <i class="fa fa-user">
                                	</i> Inscribirse</button>
                          	  	  @endif
                          	  @endif
                          	@endif
                              
                              <a  href="{{url('/socio/torneos/'.$torneo->slug)}}" class="btn btn-primary btn-xs">
                                <i class="fa fa-trophy"> </i> Ver mas detalles
                              </a>
                          </div>
                        </div>
                      </div>
        
    @empty
    <p>No hay torneos.</p>
    @endforelse
    <div id="lptm" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog modal-sm">
	      <div class="modal-content">

	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
	          </button>
	          <h4 class="modal-title" id="myModalLabel2">¿Está seguro?</h4>
	        </div>
	        <form id="formwea" data-parsley-validate role="form" method="POST" action="{{ url('/socio/torneos/inscribir') }}">
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
    $("#botonModalDes").click(function(){
        $(".bs-example-modal-sm").modal("show");
        $('#input').val($(this).val());
        $('#formwea').attr('action','{{ url('/socio/torneos/desinscribir') }}');
    });
        
});
</script>
@endsection