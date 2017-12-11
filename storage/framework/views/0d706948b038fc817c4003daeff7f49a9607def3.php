<?php $__env->startSection('css'); ?>
<!-- Switchery -->
<link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<!-- iCheck -->
    <link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

			<div class="x_panel">
              <div class="x_title">
                <h2>Crear Noticia</h2>
                
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
                
                <div class="col-md-8 center-margin">
                  <form enctype="multipart/form-data" class="form-horizontal form-label-left" method="POST" action="<?php echo e(url('/admin/noticias')); ?>">
                  	<?php echo e(csrf_field()); ?>

                    <div class="form-group">
                      <label>Titulo</label>
                      <input name="titulo" type="text" class="form-control" placeholder="Titulo de la Noticia">
                    </div>
                    <div class="form-group">
                      <label>Descripcion</label>
                      <input name="descripcion" type="text" class="form-control" placeholder="Breve texto sobre la noticia">
                    </div>
                    <div class="form-group">
                      <label>Texto</label>
                      <textarea name="texto" class="resizable_textarea form-control" placeholder="Texto de la noticia"></textarea>
                    </div>
                    <div class="form_group">
                    	<label>Imagen *jpg, max: 3 MB.</label>
                    	<input type="file" name="imagen" class="form-control">
                    </div>
                    <br>
                    <div class="form_group">
                      <label>Galeria de Fotos asociada:</label>
                      <select name="galeria" class="form-control">
                        <option value="-1" >No asociar ninguna</option>
                        <?php $__currentLoopData = $galerias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($galeria->id); ?>"><?php echo e($galeria->nombre); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                    <br>
                    <div class="form_group">
                    	<label>Destacado</label>
                    	<br>
                        
                        <input name="destacado" type="checkbox" class="js-switch" />
                        
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