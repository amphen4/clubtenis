@extends('frontend.layout.layout')
@section('css')
<link  href="{{ asset('plugins/viewer/dist') }}/viewer.min.css" rel="stylesheet">
<style>


.docs-pictures {
  margin: 0;
  padding: 0;
  list-style: none;
}

.docs-pictures > li {
  float: left;
  width: 33.3%;
  height: 33.3%;
  margin: 0 -1px -1px 0;
  border: 1px solid transparent;
  overflow: hidden;
}

.docs-pictures > li > img {
  width: 100%;
  cursor: -webkit-zoom-in;
  cursor: zoom-in;
}



</style>
@endsection
@section('content')
<section class="main__middle__container">
  <div class="container">
    <div class="row">
      <section class="col-md-8 main-content">
        <h2><span>{{$noticia->titulo}}</span></h2>
        <p><strong>{{$noticia->descipcion}}</strong></p>
        <br />
        <img src="{{url('/imagenes/noticias/'.$noticia->imagen)}}" alt="image" class="img-responsive no-margin"> <br />
        
        <p>{{$noticia->texto}}</p>
        <br />
        <br />
      </section>
      <aside class="col-md-4">
        @if($noticia->galeria)<h3><span>Galeria de Fotos</span></h3>
        <!-- a block container is required -->
        <div class="docs-galley">
          <ul id="images" class="docs-pictures clearfix">
            @foreach( $fotos as $foto )
            <li><img src="{{url('imagenes/galeria/').'/'.$foto->nombre}}" alt="Imagen de ClubTenisLimache"></li>
            @endforeach
            
          </ul>
        </div>
        @endif
        <h3><span>Noticias Recientes</span></h3>
        <ul>
          @foreach($noticiasRecientes as $noticiaReciente)
          <li><a href="{{url('noticias').'/'.$noticiaReciente->slug}}">{{$noticiaReciente->titulo}}</a></li>
          @endforeach
        </ul>
      </aside>
    </div>
  </div>
</section>

@endsection
@section('js')
<script src="{{ asset('plugins/viewer/dist') }}/viewer.min.js"></script>
<script>
  // View some images
var viewer = new Viewer(document.getElementById('images'), {
  // Enable inline mode
  inline: true,

  // Show the button on the top-right of the viewer
  button: true,

  // Show the navbar
  navbar: true,

  // Show the title
  title: true,

  // Show the toolbar
  toolbar: false,

  // Show the tooltip with image ratio (percentage) when zoom in or zoom out
  tooltip: true,

  // Enable to move the image
  movable: true,

  // Enable to zoom the image
  zoomable: true,

  // Enable to rotate the image
  rotatable: true,

  // Enable to scale the image
  scalable: true,

  // Enable CSS3 Transition for some special elements
  transition: true,

  // Enable to request fullscreen when play
  fullscreen: true,

  // Enable keyboard support
  keyboard: true,

  // Enable loop viewing.
  loop: false,

  // Min width of the viewer in inline mode
  minWidth: 200,

  // Min height of the viewer in inline mode
  minHeight: 100,

  // Define the ratio when zoom the image by wheeling mouse
  zoomRatio: 0.1,

  // Define the min ratio of the image when zoom out
  minZoomRatio: 0.01,

  // Define the max ratio of the image when zoom in
  maxZoomRatio: 100,

  // Define the CSS `z-index` value of viewer in modal mode.
  zIndex: 2015,

  // Define the CSS `z-index` value of viewer in inline mode.
  zIndexInline: 0,

  // Define where to get the original image URL for viewing
  // Type: String (an image attribute) or Function (should return an image URL)
  url: 'src',

  // Filter the images for viewing.
  // Type: Function (return true if the image is viewable)
  filter: null,

  // Event shortcuts
  ready: null,
  show: null,
  shown: null,
  hide: null,
  hidden: null,
  view: null,
  viewed: null
});
</script>
@endsection