@extends('socio.layout.gentelella')

@section('content')
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-trophy"></i> {{$torneo->nombre}} </h2>
                    <a href="{{url('/socio/torneos')}}" class="btn btn-info pull-right">Volver a torneos</a>
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
					            </tr>
					          </thead>
					          <tbody>
					            @forelse($torneo->player()->get() as $player)
					            
					            <tr>
					              @if($torneo->modalidad == 'singles')
					              <td><a href="#">{{ucwords($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat)}}</a></td>
					              @else
					              <td><a href="#">{{ucwords($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat.' - '.$player->pareja_nombre.' '.$player->pareja_apellido_pat.' '.$player->pareja_apellido_mat)}}</a></td>
					              @endif
					              <td>{{ucwords($player->nivel_categoria)}}</td>
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
				                        	<div class="col-md-12 col-sm-12 col-xs-12">
								                <div class="x_panel">
									                  <div class="x_content">
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
										                          @isset($partido->fecha_hora)
										                          <td>{{$partido->fecha_hora}}</td>
										                          @else
										                          <td>Por definir</td>
										                          @endisset
										                          @if($partido->jugado == 0)
											                          @isset($partido->player()->get()->toArray()[0])
											                          <td>{{$partido->player()->get()->toArray()[0]['nombre']}}</td>
											                          @else
											                          <td></td>
											                          @endisset
											                      @else
											                      	  @isset($partido->player()->get()->toArray()[0])
											                      	  	<td>{{$partido->player()->get()->toArray()[0]['nombre']}}</td>
											                      	  @else
											                      	  	<td>BYE</td>
											                      	  @endisset
											                      		
											                      @endif
										                          <td>vs</td>
										                          @if($partido->jugado == 0)
											                          @isset($partido->player()->get()->toArray()[1])
											                          <td>{{$partido->player()->get()->toArray()[1]['nombre']}}</td>
											                          @else
											                          <td></td>
											                          @endisset
											                      @else
											                      	  @isset($partido->player()->get()->toArray()[1])
											                          <td>{{$partido->player()->get()->toArray()[1]['nombre']}}</td>
											                          @else
											                          <td>BYE</td>
											                          @endisset
											                      @endif
										                          @isset($partido->marcador)
										                          <th>{{$partido->marcador}}</th>
										                          @else
										                          <th>-no jugado-</th>
										                          @endisset
										                          @isset($partido->ganador_id)
										                          <th>{{$partido->ganador()->first()->nombre}}</th>
										                          @else
										                           <th>-no jugado-</th>
										                          @endisset
										                        </tr>
										                      </tbody>
										                    </table>
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