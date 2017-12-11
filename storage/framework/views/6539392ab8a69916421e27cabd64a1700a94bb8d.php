<?php $__env->startSection('content'); ?>


<section class="slider">
  <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel"> 
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php $__currentLoopData = $fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($loop->index == 1): ?>
      <li data-target="#myCarousel" data-slide-to="<?php echo e($loop->index); ?>" class="active"></li>
      <?php else: ?>
      <li data-target="#myCarousel" data-slide-to="<?php echo e($loop->index); ?>" class=""></li>
      <?php endif; ?>
      
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
    <div class="carousel-inner">
      <?php $__currentLoopData = $fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($loop->index == 0): ?>
      <div class="item active"> 
      <?php else: ?>
      <div class="item">
      <?php endif; ?>
      	<img data-src="<?php echo e('imagenes/carrousel/'.$foto); ?>" alt="First slide" src="<?php echo e('imagenes/carrousel/'.$foto); ?>">
        <div class="container">
          <div class="carousel-caption">
            <h1>Hagase <span>Socio</span></h1>
            <p>Canchas Disponibles</p>
            <p><!--<a class="btn btn-primary" href="#" role="button">Botón</a>--><a class="btn btn-default" href="#" role="button">Ver más</a></p>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
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
      <div class="col-md-4"> <img src="imagenes/otros/roger.jpg" alt="image" class="img-rounded img-responsive">
        <h3>IDENTITY</h3>
        <hr>
        <p>Quisque et aliquam mauris. Nunc id cursus quam. Curabitur aliquam ornare ante et commodo. Nulla eu erat id massa egestas eleifend. Sed id venenatis.</p>
        <p><a class="btn btn-lg btn-primary" href="#" role="button">Ver más</a></p>
      </div>
      <div class="col-md-4"> <img src="imagenes/otros/escuela.jpg" alt="image" class="img-rounded img-responsive">
        <h3>Escuela de Tenis</h3>
        <hr>
        <p>Quisque et aliquam mauris. Nunc id cursus quam. Curabitur aliquam ornare ante et commodo. Nulla eu erat id massa egestas eleifend. Sed id venenatis.</p>
        <p><a class="btn btn-lg btn-primary" href="#" role="button">Ver más</a></p>
      </div>
      <div class="col-md-4"> <img src="imagenes/otros/novak.jpg" alt="image" class="img-rounded img-responsive">
        <h3>PHOTOS</h3>
        <hr>
        <p>Quisque et aliquam mauris. Nunc id cursus quam. Curabitur aliquam ornare ante et commodo. Nulla eu erat id massa egestas eleifend. Sed id venenatis.</p>
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
          <?php $__currentLoopData = $noticiasRecientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <article> <img src="imagenes/noticias/<?php echo e($noticia->imagen); ?>" height="299" width="210" alt="xd" class="pull-left img-responsive">
            <div class="text">
              <h3><a href="/noticias/<?php echo e($noticia->slug); ?>"><?php echo e($noticia->titulo); ?></a></h3>
              <p><small>{{$noticia->admin_id->first()->name}}</small></p>
              <hr>
              <p><?php echo e($noticia->texto); ?></p>
            </div>
            <div class="clearfix"></div>
          </article>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <article> <img src="imagenes/otros/rafa.jpg" height="299" width="210" alt="pic3" class="pull-left img-responsive">
            <div class="text">
              <h3><a href="#">Aliquam dictum felis a purus cursus</a></h3>
              <p><small>Lorem ipsum dolor sit amet</small></p>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna</p>
            </div>
            <div class="clearfix"></div>
          </article>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>