<?php $__env->startSection('css'); ?>
<!-- Switchery -->
<link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<!-- iCheck -->
    <link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Crear un Galeria</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p>En un navegador de escritorio, puede arrastrar y soltar las fotos dentro del cuadro de abajo. O bien puede hacer click en un espacio en blanco dentro del mismo cuadro para comenzar a seleccionar foto.</p>
                    <div class="form-group">
                      <label>Título</label>
                      <input name="titulo"  form="formulario" type="text" class="form-control" placeholder="Titulo de la Galeria">
                    </div>
                    <form enctype="multipart/form-data" files="true" id="formulario" method="POST" action="<?php echo e(url('admin/galerias')); ?>" >
                      <?php echo e(csrf_field()); ?>

                      <div class="fallback">
                        <input name="file[]" accept="image/jpeg" type="file" multiple />
                      </div>
                    </form>
                    <br>
                    <button id="submit" form="formulario" class="btn btn-primary" type="submit">Enviar</button>
                    <br />
                    <br />
                    <br />
                    <br />
                  </div>
                </div>
              </div>
            </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <!-- Switchery -->
    <script src="<?php echo e(asset('templates/gentelella')); ?>/vendors/switchery/dist/switchery.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo e(asset('templates/gentelella')); ?>/vendors/iCheck/icheck.min.js"></script>
    <!-- Dropzone.js -->
    <script src="<?php echo e(asset('templates/gentelella')); ?>/vendors/dropzone/dist/min/min.dropzone.js"></script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.gentelella', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>