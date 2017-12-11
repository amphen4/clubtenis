<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('templates/frontend1')); ?>/shortcodes/shortcodes.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container recent-posts">
	<div class="row no_padding no-margin">
	  <h3>Inscritos Categoria B</h3>
	  <table class="dc_tables2_11" summary="Personal Movie Rating" style="width:100%;">
	    <thead>
	      <tr>
	        <th scope="col">#</th>
	        <th scope="col">Nombre</th>
	      </tr>
	    </thead>
	    <tbody>
	    <?php $__currentLoopData = $inscritos_b; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	      <tr>
	        <td><?php echo e($loop->index+1); ?></td>
	        <td><?php echo e($j->nombre); ?></td>
	      </tr>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    </tbody>
	  </table>
	
	</div>
	<div class="row no_padding no-margin">
	  <h3>Inscritos Categoria A</h3>
	  <table class="dc_tables2_11" summary="Personal Movie Rating" style="width:100%;">
	    <thead>
	      <tr>
	        <th scope="col">#</th>
	        <th scope="col">Nombre</th>
	      </tr>
	    </thead>
	    <tbody>
	    <?php $__currentLoopData = $inscritos_a; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	      <tr>
	        <td><?php echo e($loop->index+1); ?></td>
	        <td><?php echo e($j->nombre); ?></td>
	      </tr>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    </tbody>
	  </table>
	
	</div>
	<div class="row no_padding no-margin">
	  <h3>Inscritos Categoria Dobles</h3>
	  <table class="dc_tables2_11" summary="Personal Movie Rating" style="width:100%;">
	    <thead>
	      <tr>
	        <th scope="col">#</th>
	        <th scope="col">Nombre</th>
	      </tr>
	    </thead>
	    <tbody>
	    <?php $__currentLoopData = $inscritos_dobles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	      <tr>
	        <td><?php echo e($loop->index+1); ?></td>
	        <td><?php echo e($j->nombre); ?></td>
	      </tr>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    </tbody>
	  </table>
	
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>