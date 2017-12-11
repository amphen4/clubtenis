<?php $__env->startSection('css'); ?>
<!-- bootstrap-daterangepicker -->
<link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('titulo_pagina','Ingreso nuevo resultado'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Ingreso Resultado<small><?php echo e('Modalidad: '.$modalidad); ?></small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" role="form" method="POST" action="<?php echo e(url('/admin/rankings/resultado')); ?>">
          <?php echo e(csrf_field()); ?>


          
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jugador 1</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="jugador1" onchange="cambiarOption1(this);" id="select1" class="form-control">
              	<option selected disabled>Elige una opcion...</option>
              	<?php $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              	<?php if($modalidad == 'singles'): ?>
                <option value="<?php echo e($player->id); ?>"><?php echo e($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat); ?></option>
                <?php else: ?>
                <option value="<?php echo e($player->id); ?>"><?php echo e($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat.' - '.$player->pareja_nombre.' '.$player->pareja_apellido_pat.' '.$player->pareja_apellido_mat); ?></option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jugador 2</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="jugador2" onchange="cambiarOption2(this);" id="select2" class="form-control">
              	<option selected disabled>Elige una opcion...</option>
              	<?php $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              	<?php if($modalidad == 'singles'): ?>
                <option value="<?php echo e($player->id); ?>"><?php echo e($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat); ?></option>
                <?php else: ?>
                <option value="<?php echo e($player->id); ?>"><?php echo e($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat.' - '.$player->pareja_nombre.' '.$player->pareja_apellido_pat.' '.$player->pareja_apellido_mat); ?></option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Marcador</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="marcador" type="text"  required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ganador</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="ganador" class="form-control">
                <option  id="option1"></option>
                <option id="option2"></option>
              </select>
            </div>
          </div>

          <div class='form-group'>
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha y Hora</label>
	            <div class="col-md-6 col-sm-6 col-xs-12">
	                <div class='input-group date' id='myDatepicker'>
	                    <input type='text' name="fecha_hora" class="form-control" placeholder="Año-Mes-Dia Hora:Minutos:Segundos Ej: 2017-07-07 22:00:00"/>
	                    <span class="input-group-addon">
	                       <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                </div>
	            </div>
	       </div>

          <input type="hidden" name="modalidad" value="<?php echo e($modalidad); ?>">
          <input type="hidden" name="ranking_id" value="<?php echo e($ranking->id); ?>">
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
<script>
function cambiarOption1(sel)
{
    option = document.getElementById("option1");
    option.text = $("#select1 option:selected").text();
    option.value = sel.value;
}
function cambiarOption2(sel)
{
    option = document.getElementById("option2");
    option.text = $("#select2 option:selected").text();
    option.value = sel.value;
}
</script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo e(asset('templates/gentelella')); ?>/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo e(asset('templates/gentelella')); ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->    
<script src="<?php echo e(asset('templates/gentelella')); ?>/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script>

    $('#myDatepicker').datetimepicker({
		format: 'YYYY-MM-DD hh:mm:ss'
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.gentelella', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>