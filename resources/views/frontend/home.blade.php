@extends('frontend.layout.layout')
@section('content')


<section class="slider">
  <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel"> 
    <!-- Indicators -->
    <ol class="carousel-indicators">
      @foreach($fotos as $foto)
      @if($loop->index == 1)
      <li data-target="#myCarousel" data-slide-to="{{$loop->index}}" class="active"></li>
      @else
      <li data-target="#myCarousel" data-slide-to="{{$loop->index}}" class=""></li>
      @endif
      
      @endforeach
    </ol>
    <div class="carousel-inner">
      @foreach($fotos as $foto)
      @if($loop->index == 0)
      <div class="item active"> 
      @else
      <div class="item">
      @endif
      	<img data-src="{{'imagenes/carrousel/'.$foto}}" alt="First slide" src="{{'imagenes/carrousel/'.$foto}}">
        <div class="container">
          <div class="carousel-caption">
            <h1>Club de Tenis <span>Limache</span></h1>
            <p>Canchas de arcilla disponibles</p>
            <p><!--<a class="btn btn-primary" href="#" role="button">Botón</a>--><!--<a class="btn btn-default" href="#" role="button">Ver más</a>--></p>
          </div>
        </div>
      </div>
      @endforeach
      
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon carousel-control-left"></span></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon carousel-control-right"></span></a> </div>
</section>
<!--end of sldier section-->
<section class="main__middle__container">
  <div class="container">
    <div class="row">
      <h2 class="text-center">Club de Tenis Limache, Fundado en 1947. Tradición en Tenis en Limache.</h2>
      <p class="text-center big-paragraph">Contamos con 2 canchas para uso de Socios y visitas. De Martes a Domingo</p>
    </div>
    <hr>
    <div class="row text-center three-blocks">
      <div class="col-md-4"> <img src="imagenes/otros/arcilla.jpg" alt="image" class="img-rounded img-responsive">
        <h3>Canchas de Arcilla</h3>
        <hr>
        <p>Ubicadas en el centro de la ciudad de Limache, contamos con 2 canchas para uso el uso de socios y visitas. Disponemos tambien de luz artificial, tenis a cualquier hora del Dia.</p>
        <p><a class="btn btn-lg btn-primary" href="#" role="button">Ver más</a></p>
      </div>
      <div class="col-md-4"> <img src="imagenes/otros/escuela.jpg" alt="image" class="img-rounded img-responsive">
        <h3>Escuela de Tenis</h3>
        <hr>
        <p>Clases para todos los niveles con profesores de educación física calificados y especialistas en tenis.</p>
        <p><a class="btn btn-lg btn-primary" href="#" role="button">Ver más</a></p>
      </div>
      <div class="col-md-4"> <img src="imagenes/otros/novak.jpg" alt="image" class="img-rounded img-responsive">
        <h3>Competencia</h3>
        <hr>
        <p>Ven a competir en nuestros torneos abiertos durante el año.</p>
        <p><a class="btn btn-lg btn-primary" href="#" role="button">Ver más</a></p>
      </div>
    </div>
  </div>
  <section class="recent-posts">
    <div class="container">
      <h2 class="text-center"><span>Noticias Recientes</span></h2>
      <p class="title-description text-center"></p>
      <div class="row">
        <div class="col-md-8">
          @foreach($noticiasRecientes as $noticia)
          <article> <img src="imagenes/noticias/{{$noticia->imagen}}" height="299" width="210" alt="xd" class="pull-left img-responsive">
            <div class="text">
              <h3><a href="/noticias/{{$noticia->slug}}">{{$noticia->titulo}}</a></h3>
              <p><small>@{{$noticia->admin_id->first()->name}}</small></p>
              <hr>
              <p>{{$noticia->texto}}</p>
            </div>
            <div class="clearfix"></div>
          </article>
          @endforeach
        </div>
        <div class="col-md-4">
        <h3>Recursos Web</h3>
        <hr>
          <div class="icon-item docs">
            <h3><a href="#">Reglamento del Club</a></h3>
            <br>

          </div>
                    <div class="icon-item link">
            <h3><a target="_blank" href="http://www.atpworldtour.com/es">ATP World Tour en Español</a></h3>
            <br>
          </div>
          
          <div class="icon-item link">
            <h3><a target="_blank" href="http://www.fetech.cl">Federacion de Tenis de Chile</a></h3>
            <br>
          </div>

          
          <!-- docs image tennis link audio ball photo -->
        </div>
      </div>
    </div>
  </section>
</section>
@endsection