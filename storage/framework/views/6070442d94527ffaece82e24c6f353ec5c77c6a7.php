<?php $__env->startSection('content'); ?>

    

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Torneos </h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <table class="table table-bordered">
          <thead>
            <tr>
            
              <th>Nombre Torneo</th>
              <th>Modalidad</th>
              <th>Inscritos</th>
              <th>Estado</th>
              <th>Visibilidad</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $torneos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $torneo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <tr>
              <td><a href="<?php echo e(url('/admin/torneos/'.$torneo->slug)); ?>"><?php echo e($torneo->nombre); ?></a></td>
              <td><?php echo e($torneo->modalidad); ?></td>
              <td><?php echo e($torneo->nro_inscritos); ?></td>
              <td><?php echo e($torneo->estado); ?></td>
              <td><?php echo e($torneo->visibilidad); ?></td>
              <td><?php if($torneo->estado == 'abierto' && $torneo->nro_inscritos > 1 && $torneo->nro_inscritos < 129): ?>
                  <button  value="<?php echo e($torneo->id); ?>" class="btn btn-success btn-xs botonModal">Cerrar</button>
                  <?php endif; ?>
              <a href="<?php echo e(url('/admin/torneos/'.$torneo->slug.'/edit')); ?>" class="btn btn-warning btn-xs">Editar</a><button class="btn btn-danger btn-xs">Eliminar</button></td>
            </tr>
            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>

      </div>
    </div>
</div>
<div id="lptm" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">¿Está seguro?</h4>
          </div>
          <form id="formwea" data-parsley-validate role="form" method="POST" action="<?php echo e(url('/admin/torneos/cerrar')); ?>">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" id="input" name="id" value="">
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              

              <button type="submit" class="btn btn-primary">Continuar</button>
              
            </div>
          </form>
        </div>
      </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
$<script>
$(document).ready(function(){
    $(".botonModal").click(function(){
        $(".bs-example-modal-sm").modal("show");
        $('#input').val($(this).val());
    });
    
        
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.gentelella', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>