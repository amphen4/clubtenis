<?php $__env->startSection('content'); ?>
<section class="main__middle__container">
	<div class="container recent-posts">
		<div class="row">
	      <div class="col-md-6"> <img src="<?php echo e(url('/imagenes/noticias/'.$noticia->imagen)); ?>" alt="image" class="img-responsive no-margin"> </div>
	      <div class="col-md-6">
	        <h3><?php echo e($noticia->titulo); ?></h3>
	        <hr>
	        <p><?php echo e($noticia->texto); ?></p>
	      </div>
	    </div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>