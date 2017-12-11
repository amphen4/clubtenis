@extends('socio.layout.gentelella')

@section('content')
@foreach ($rankings as $ranking )
    

<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{$ranking->nombre}} </h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <table class="table table-bordered">
          <thead>
            <tr>
            @if($ranking->modalidad == 'singles')
              <th>Ranking</th>
              <th>Nombre</th>
              <th>Puntos</th>
            @else
              <th>Ranking</th>
              <th>Pareja</th>
              <th>Puntos</th>
            @endif
            </tr>
          </thead>
          <tbody>
            @foreach($listas[$loop->index] as $player)
            
            @if($ranking->modalidad == 'singles')
            <tr>
              <td>{{$player->posicion}}</td>
              @if($player->socio->id == Auth::user()->id)
              <td><strong><a href="{{url('/socio/players/singles')}}">{{$player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat}}</a></strong></td>
              @else
              <td>{{$player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat}}</td>
              @endif
              <td>{{$player->puntos}}</td>
            </tr>
            @else
            <tr>
              <td>{{$player->posicion}}</td>
              @if($player->socio->id == Auth::user()->id)
              <td><strong><a href="{{url('/socio/players/dobles')}}">{{$player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat.' - '.$player->pareja_nombre.' '.$player->pareja_apellido_pat.' '.$player->pareja_apellido_mat}}</a></strong></td>
              @else
              <td>{{$player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat.' - '.$player->pareja_nombre.' '.$player->pareja_apellido_pat.' '.$player->pareja_apellido_mat}}</td>
              @endif
              <td>{{$player->puntos}}</td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
</div>
@endforeach
@endsection
