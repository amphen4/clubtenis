@extends('admin.layout.gentelella')

@section('css')
<!-- bootstrap-daterangepicker -->
<link href="{{ asset('templates/gentelella') }}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="{{ asset('templates/gentelella') }}/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
@endsection

@section('content')
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-trophy"></i> {{$torneo->nombre}} </h2>
                    <a href="{{url('/admin/torneos')}}" class="btn btn-info pull-right">Volver a torneos</a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Información</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Inscritos</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Cuadro</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                            synth. Cosby sweater eu banh mi, qui irure terr.</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <table class="table table-bordered jambo_table">
					          <thead>
					            <tr>
					              @if($torneo->modalidad == 'singles')
					              <th>Nombre Jugador</th>
					              @else
					              <th>Pareja</th>
					              @endif
					              <th>Nivel Categoria</th>
					              <th>Opciones</th>
					            </tr>
					          </thead>
					          <tbody>
					            @forelse($torneo->player()->get() as $player)
					            
					            <tr>
					              @if($torneo->modalidad == 'singles')
					              <td><a href="#">{{$player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat}}</a></td>
					              @else
					              <td><a href="#">{{$player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat.' - '.$player->pareja_nombre.' '.$player->pareja_apellido_pat.' '.$player->pareja_apellido_mat}}</a></td>
					              @endif
					              <td>{{$player->nivel_categoria}}</td>
					              @if($torneo->estado == 'abierto')
					              <td><button class="btn btn-danger btn-xs">Eliminar</button></td>
					              @else
					              <td><button disabled class="btn btn-danger btn-xs">Eliminar</button></td>
					              @endif
					            </tr>
					            @empty
					            <tr><td>No hay inscritos.</td></tr>
					            @endforelse
					          </tbody>
					        </table>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        	@if($torneo->estado == 'abierto')
                        	<p>Cuadro no creado. Inscripciones abiertas</p>
                        	@else
		                    <div class="col-xs-2">
		                      <!-- required for floating -->
		                      <!-- Nav tabs -->
		                      <ul class="nav nav-tabs tabs-left">
		                      	@for($i = $nro_rondas; $i>=1; $i--)
		                      		@if($i==$nro_rondas)
		                      			<li class="active"><a href="#{{$i}}" data-toggle="tab">{{$rondas[$i-1]}}</a></li>
		                      		@else
		                      			<li><a href="#{{$i}}" data-toggle="tab">{{$rondas[$i-1]}}</a></li>
		                      		@endif
		                        @endfor
		                      </ul>
		                    </div>

		                    <div class="col-xs-10">
		                      <!-- Tab panes -->
		                      <div class="tab-content">
		                      	@for($i = $nro_rondas; $i>=1; $i--)
		                      		@if($i==$nro_rondas)
		                      			<div class="tab-pane active" id="{{$i}}">
		                      		@else
		                      			<div class="tab-pane" id="{{$i}}">
		                      		@endif

			                          	@foreach($partidos[((int)abs($i-$nro_rondas))] as $partido)

			                        	<div class="col-md-8 col-xs-12">
							                <div class="x_panel">
							                	  <div class="x_title">
								                    <h2>Partido #:{{$partido->nro}} - {{$partido->ronda}}</h2>
								                    
								                    <div class="clearfix"></div>
								                  </div>
								                  <div class="x_content">
								                  	@if($partido->jugado == 0)

								                  		@if($partido->partidosRelacionados()->where('jugado',0)->count() > 0)
								                  			<p>Esperando Ganadores</p>
								                  		@else
								                  		
								                  			<form data-parsley-validate class="form-horizontal form-label-left" role="form" method="POST" action="{{ url('/admin/torneos/partido') }}">
									                  		
										                    @if($partido->player()->count() > 1)
										                    <input type="hidden" name="accion" value="cerrar">
										                    @else
										                    <input type="hidden" name="accion" value="subir">
										                    @endif

										                    <input type="hidden" name="partido_id" value="{{$partido->id}}">
										                    <input type="hidden" name="torneo_id" value="{{$torneo->id}}">
										                    {{ csrf_field() }}  
										                      @isset($partido->player()->get()->toArray()[0])

										                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
										                        @if($torneo->modalidad == 'singles')
										                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jugador 1</label>
										                        <select name="jugador1" class="form-control" required>
										                        	<option selected value="{{$partido->player()->get()->toArray()[0]['id']}}">{{$partido->player()->get()->toArray()[0]['nombre'].' '.$partido->player()->get()->toArray()[0]['apellido_pat'].' '.$partido->player()->get()->toArray()[0]['apellido_mat']}}</option>
										                        </select>
										                        
										                        
										                        @else
										                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jugador 1</label>
										                        <select name="jugador1" class="form-control" required>
										                        	<option selected value="{{$partido->player()->get()->toArray()[0]['id']}}">{{$partido->player()->get()->toArray()[0]['nombre'].' '.$partido->player()->get()->toArray()[0]['apellido_pat'].' '.$partido->player()->get()->toArray()[0]['apellido_mat'].' - '.$partido->player()->get()->toArray()[0]['pareja_nombre'].' '.$partido->player()->get()->toArray()[0]['pareja_apellido_pat'].' '.$partido->player()->get()->toArray()[0]['pareja_apellido_mat']}}</option>
										                        </select>
										                        @endif
										                      </div>
										                      @else
										                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
										                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Jugador 1</label>
										                        <select name="jugador1" class="form-control" required>
									                            	<option selected  value="-1">BYE</option>
									                            	@foreach($torneo->player()->get() as $player)
									                            	@if($torneo->modalidad == 'singles')
									                            	<option value="{{$player->id}}">{{$player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat}}</option>
									                            	@else
									                            	<option value="{{$player->id}}">{{$player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat.' - '.$player->pareja_nombre.' '.$player->pareja_apellido_pat.' '.$player->pareja_apellido_mat}}</option>
									                            	@endif
									                            	@endforeach
									                            </select>
										                        
										                      </div>
										                      @endisset
										                      
										                      @isset($partido->player()->get()->toArray()[1])
										                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
										                      	@if($torneo->modalidad == 'singles')
										                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jugador 2</label>
										                        <select name="jugador2" class="form-control" required>
										                        	<option selected value="{{$partido->player()->get()->toArray()[1]['id']}}">{{$partido->player()->get()->toArray()[1]['nombre'].' '.$partido->player()->get()->toArray()[1]['apellido_pat'].' '.$partido->player()->get()->toArray()[1]['apellido_mat']}}</option>
										                        </select>
										                        @else
										                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jugador 2</label>
										                        <select name="jugador2" class="form-control" required>
										                        	<option selected value="{{$partido->player()->get()->toArray()[1]['id']}}">{{$partido->player()->get()->toArray()[1]['nombre'].' '.$partido->player()->get()->toArray()[1]['apellido_pat'].' '.$partido->player()->get()->toArray()[1]['apellido_mat'].' - '.$partido->player()->get()->toArray()[1]['pareja_nombre'].' '.$partido->player()->get()->toArray()[1]['pareja_apellido_pat'].' '.$partido->player()->get()->toArray()[1]['pareja_apellido_mat']}}</option>
										                        </select>
										                        @endif
										                      </div>
										                      @else
										                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
										                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Jugador 2</label>
										                        <select name="jugador2" class="form-control" required>
									                            	<option selected  value="-1">BYE</option>
									                            	@foreach($torneo->player()->get() as $player)
										                            	@if($torneo->modalidad == 'singles')
										                            	<option value="{{$player->id}}">{{$player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat}}</option>
										                            	@else
										                            	<option value="{{$player->id}}">{{$player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat.' - '.$player->pareja_nombre.' '.$player->pareja_apellido_pat.' '.$player->pareja_apellido_mat}}</option>
										                            	@endif
									                            	@endforeach
									                            </select>
										                        
										                      </div>
										                      @endisset
										                      
										                      <div class='input-group date form-group' id='myDatepicker'>

											                    <input type='text' name="fecha_hora" class="form-control" placeholder="Fecha y Hora"/ required>
											                    <span class="input-group-addon">
											                       <span class="glyphicon glyphicon-calendar"></span>
											                    </span>
											                  </div>
										                      
										                      @if($partido->player()->count() > 1)
										                      <div class="form-group">
										                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Marcador</label>
										                        <div class="col-md-9 col-sm-9 col-xs-12">
										                          <input type="text" class="form-control" required name="marcador">
										                        </div>
										                      </div>

										                      <div class="form-group">
										                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Ganador</label>
										                        <div class="col-md-9 col-sm-9 col-xs-12">
										                           <select name="ganador" class="form-control" required>
										                           		@if($torneo->modalidad == 'singles')

										                           		<option value="{{$partido->player()->get()->toArray()[0]['id']}}">{{$partido->player()->get()->toArray()[0]['nombre'].' '.$partido->player()->get()->toArray()[0]['apellido_pat'].' '.$partido->player()->get()->toArray()[0]['apellido_mat']}}</option>
										                           		<option value="{{$partido->player()->get()->toArray()[1]['id']}}">{{$partido->player()->get()->toArray()[1]['nombre'].' '.$partido->player()->get()->toArray()[1]['apellido_pat'].' '.$partido->player()->get()->toArray()[1]['apellido_mat']}}</option>

										                           		@else

										                           		<option value="{{$partido->player()->get()->toArray()[0]['id']}}">{{$partido->player()->get()->toArray()[0]['nombre'].' '.$partido->player()->get()->toArray()[0]['apellido_pat'].' '.$partido->player()->get()->toArray()[0]['apellido_mat'].' - '.$partido->player()->get()->toArray()[0]['pareja_nombre'].' '.$partido->player()->get()->toArray()[0]['pareja_apellido_pat'].' '.$partido->player()->get()->toArray()[0]['pareja_apellido_mat']}}</option>
										                           		<option value="{{$partido->player()->get()->toArray()[1]['id']}}">{{$partido->player()->get()->toArray()[1]['nombre'].' '.$partido->player()->get()->toArray()[1]['apellido_pat'].' '.$partido->player()->get()->toArray()[1]['apellido_mat'].' - '.$partido->player()->get()->toArray()[1]['pareja_nombre'].' '.$partido->player()->get()->toArray()[1]['pareja_apellido_pat'].' '.$partido->player()->get()->toArray()[1]['pareja_apellido_mat']}}</option>

										                           		@endif
										                           </select>
										                        </div>
										                      </div>
										                      @endif
										                      
										                      <div class="ln_solid"></div>
										                      <div class="form-group">
										                          @if($partido->player()->count() < 2)
										                          <button type="submit" class="btn btn-primary">Subir Partido</button>
										                          @else
										                          <button type="submit" class="btn btn-primary">Cerrar Partido</button>
										                          @endif
										                        
										                      </div>

										                    </form>
									                    @endif
									                @else
									                
												                    <table class="table table-hover jambo_table">
												                      <thead>
												                        <tr>
												                          <th>#</th>
												                          <th>Fecha-Hora</th>
												                          <th>Jugador 1</th>
												                          <th></th>
												                          <th>Jugador 2</th>
												                          <th>Marcador</th>
												                          <th>Ganador</th>
												                        </tr>
												                      </thead>
												                      <tbody>
												                        <tr>
												                          <th scope="row">{{$partido->nro}}</th>
												                          
												                          <td>{{$partido->fecha_hora}}</td>

												                          
													                         
													                      	  @isset($partido->player()->get()->toArray()[0])
													                      	  	<td>{{$partido->player()->get()->toArray()[0]['nombre']}}</td>
													                      	  @else
													                      	  	<td>BYE</td>
													                      	  @endisset
													                      		
													                      
												                          <td>vs</td>
												                          
													                      	  @isset($partido->player()->get()->toArray()[1])
													                          <td>{{$partido->player()->get()->toArray()[1]['nombre']}}</td>
													                          @else
													                          <td>BYE</td>
													                          @endisset
													                      
												                          @isset($partido->marcador)
												                          <th>{{$partido->marcador}}</th>
												                          @else
												                          <th>-</th>
												                          @endisset
												                          <th>WOW</th>
												                        </tr>
												                      </tbody>
												                    </table>
											                  
									                @endif
								                  </div>
							                </div>
							            </div>
							            <hr>
							            @endforeach
								            
				                        </div>
		                      		
		                      	@endfor   
		                      </div>
		                    </div>

		                    <div class="clearfix"></div>
		                    @endif
                        </div>
                      </div>
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
<script>

    $('#myDatepicker').datetimepicker({
		format: 'YYYY-MM-DD hh:mm:ss'
	});
</script>
@endsection