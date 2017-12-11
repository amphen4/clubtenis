<?php $__env->startSection('css'); ?>
<!-- Switchery -->
<link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<!-- iCheck -->
    <link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

			<div class="x_panel">
              <div class="x_title">
                <h2>Editar Galeria: </h2>
                
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
                
                <div class="col-md-8 center-margin">
                  <form enctype="multipart/form-data" class="form-horizontal form-label-left" method="POST" action="<?php echo e(url('admin/galerias/'.$galeria->id)); ?>">
                  	<?php echo e(csrf_field()); ?>

                    <input type="hidden" name="_method" value="PUT">
                    <div class="fallback">
                        <input name="file[]" accept="image/jpeg" type="file" multiple />
                    </div>
                    <br>
                    
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