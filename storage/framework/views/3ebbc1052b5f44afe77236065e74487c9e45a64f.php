<?php $__env->startSection('content'); ?>
<a class="btn btn-default" href="<?php echo e(url('/admin/listas')); ?>" >Editar Listas</a>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.gentelella', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>