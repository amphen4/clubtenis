@extends('socio.layout.gentelella')

@section('content')
@isset($listas)
@foreach ($rankings as $ranking )
    

<div class="col-md-9 col-sm-9 col-xs-18">
    <div class="x_panel">
      <div class="x_title">
        <h2>Partidos en: {{$ranking->nombre}}</h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        @isset($listas[$loop->index])
        <table class="table table-bordered">
          <thead>
            <tr>
            @if($ranking->modalidad == 'singles')
              <th>Jugador 1</th>
              <th>Jugador 2</th>
              <th>Marcador</th>
              <th>Ganador</th>
              <th>Fecha | Hora</th>
            @else
              <th>Pareja 1</th>
              <th>Pareja 2</th>
              <th>Marcador</th>
              <th>Ganador</th>
              <th>Fecha | Hora</th>
            @endif
            </tr>
          </thead>
          <tbody>
          
            @foreach($listas[$loop->index] as $partido)

                @if($ranking->modalidad == 'singles')
                    <tr>
                      @foreach($partido->player()->get() as $man)
                          @if($man->socio->id == Auth::user()->id)
                          <td><strong><a href="{{url('/socio/players/singles')}}">{{$man->nombre.' '.$man->apellido_pat.' '.$man->apellido_mat}}</a></strong></td>
                          @else
                          <td>{{$man->nombre.' '.$man->apellido_pat.' '.$man->apellido_mat}}</td>
                          @endif
                      @endforeach
                      <td>{{$partido->marcador}}</td>
                      <td>{{$partido->ganador->nombre.' '.$partido->ganador->apellido_pat.' '.$partido->ganador->apellido_mat}}</td>
                      <td>{{$partido->fecha_hora}}</td>
                    </tr>
                @else

                    <tr>
                      @foreach($partido->player()->get() as $man)
                          @if($man->socio->id == Auth::user()->id)
                          <td><strong><a href="{{url('/socio/players/dobles')}}">{{$man->nombre.' '.$man->apellido_pat.' '.$man->apellido_mat.' - '.$man->pareja_nombre.' '.$man->pareja_apellido_pat.' '.$man->pareja_apellido_mat}}</a></strong></td>
                          @else
                          <td>{{$man->nombre.' '.$man->apellido_pat.' '.$man->apellido_mat.' - '.$man->pareja_nombre.' '.$man->pareja_apellido_pat.' '.$man->pareja_apellido_mat}}</td>
                          @endif
                      @endforeach
                      <td>{{$partido->marcador}}</td>
                      <td>{{$partido->ganador->nombre.' '.$partido->ganador->apellido_pat.' '.$partido->ganador->apellido_mat.' - '.$partido->ganador->pareja_nombre.' '.$partido->ganador->pareja_apellido_pat.' '.$partido->ganador->pareja_apellido_mat}}</td>
                      <td>{{$partido->fecha_hora}}</td>
                    </tr>
                @endif
            @endforeach
            
          </tbody>
        @else
        <div class="alert alert-warning alert-dismissible fade in" role="alert">
          Ud. no se ha inscrito aún en este ranking. <a href="{{url('/socio/players/'.$ranking->modalidad)}}">Haga click aquí para inscribirse</a>
        </div>
        @endisset
        </table>

      </div>
    </div>
</div>
@endforeach
@else
<div class="alert alert-warning alert-dismissible fade in" role="alert">
  No participa en ningun ranking
</div>
@endisset
@endsection