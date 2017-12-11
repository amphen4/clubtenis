<?php $__env->startSection('css'); ?>
<!-- Switchery -->
<link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<!-- iCheck -->
    <link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

			<div class="x_panel">
              <div class="x_title">
                <h2>Editar Noticia: <?php echo e($noticia->titulo); ?></h2>
                
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
                
                <div class="col-md-8 center-margin">
                  <form enctype="multipart/form-data" class="form-horizontal form-label-left" method="POST" action="<?php echo e(url('admin/noticias/'.$noticia->id)); ?>">
                  	<?php echo e(csrf_field()); ?>

                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                      <label>Titulo</label>
                      <input name="titulo" value="<?php echo e($noticia->titulo); ?>" type="text" class="form-control" placeholder="Titulo de la Noticia">
                    </div>
                    <div class="form-group">
                      <label>Texto</label>
                      <textarea name="texto"  class="resizable_textarea form-control" placeholder="Texto de la noticia"><?php echo e($noticia->texto); ?></textarea>
                    </div>
                    <div class="form_group">
                      <label>Imagen actual</label>
                      <br>
                      <div class="col-md-4">
                        <div class="thumbnail">
                          
                            <img src="<?php echo e(url('imagenes/noticias/'.$noticia->imagen)); ?>" alt="Lights" style="width:100%">
                            <div class="caption">
                              <p><?php echo e($noticia->imagen); ?></p>
                            </div>
                          
                        </div>
                      </div>
                      <br>
                    	<label>Nueva Imagen (dejar en blanco si desea mantener imagen)*jpg, max: 3 MB.</label>
                    	<input type="file" name="imagen">
                    </div>
                    <br>
                    <div class="form_group">
                    	<label>Destacado</label>
                    	<br>
                        <?php if($noticia->destacado): ?>
                        <input name="destacado" type="checkbox" class="js-switch" checked/>
                        <?php else: ?>
                        <input name="destacado" type="checkbox" class="js-switch" />
                        <?php endif; ?>
                        
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Enviar</button>
                  </form>
                </div>

                
              </div>
            </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <!-- Switchery -->
    <script src="<?php echo e(asset('templates/gentelella')); ?>/vendors/switchery/dist/switchery.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo e(asset('templates/gentelella')); ?>/vendors/iCheck/icheck.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.gentelella', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>