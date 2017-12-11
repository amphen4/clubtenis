<?php $__env->startSection('css'); ?>
<!-- bootstrap-daterangepicker -->
<link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Crear Torneo</h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" role="form" method="POST" action="<?php echo e(url('/admin/torneos')); ?>">
          <?php echo e(csrf_field()); ?>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre Torneo</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="nombre" type="text"  required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Modalidad</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="modalidad"   class="form-control">
                <option value="singles">Singles</option>
                <option value="dobles">Dobles</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Visibilidad</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="visibilidad"   class="form-control">
                <option value="interno">Interno</option>
                <option value="publico">Público</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre Organizador</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="organizador" type="text"  required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre Arbitro</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="arbitro" type="text"  required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          
          <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Inicio Torneo</label>
              <div class="controls">
                <div class='col-md-6 col-sm-6 col-xs-12 input-group date form-group'  id='myDatepicker2'>
                    <input name="fecha_inicio" type='text' required="required" class="form-control" placeholder="Año-Mes-Dia   Ej: 2020-05-23"  />
                    <span class="input-group-addon ">
                       <span class="fa fa-calendar-o"></span>
                    </span>
                </div>
              </div>
          </div>
          
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo e(asset('templates/gentelella')); ?>/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo e(asset('templates/gentelella')); ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->    
<script src="<?php echo e(asset('templates/gentelella')); ?>/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- Parsley -->
<script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
<script>
$('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.gentelella', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>