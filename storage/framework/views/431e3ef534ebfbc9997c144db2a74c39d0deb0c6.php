<?php $__env->startSection('content'); ?>
<?php $__currentLoopData = $rankings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ranking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2><?php echo e($ranking->nombre); ?> </h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <table class="table table-bordered">
          <thead>
            <tr>
            <?php if($ranking->modalidad == 'singles'): ?>
              <th>Ranking</th>
              <th>Nombre</th>
              <th>Puntos</th>
            <?php else: ?>
              <th>Ranking</th>
              <th>Pareja</th>
              <th>Puntos</th>
            <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $listas[$loop->index]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if($ranking->modalidad == 'singles'): ?>
            <tr>
              <td><?php echo e($player->posicion); ?></td>
              <?php if($player->socio->id == Auth::user()->id): ?>
              <td><strong><a href="<?php echo e(url('/socio/players/singles')); ?>"><?php echo e($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat); ?></a></strong></td>
              <?php else: ?>
              <td><?php echo e($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat); ?></td>
              <?php endif; ?>
              <td><?php echo e($player->puntos); ?></td>
            </tr>
            <?php else: ?>
            <tr>
              <td><?php echo e($player->posicion); ?></td>
              <?php if($player->socio->id == Auth::user()->id): ?>
              <td><strong><a href="<?php echo e(url('/socio/players/dobles')); ?>"><?php echo e($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat.' - '.$player->pareja_nombre.' '.$player->pareja_apellido_pat.' '.$player->pareja_apellido_mat); ?></a></strong></td>
              <?php else: ?>
              <td><?php echo e($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat.' - '.$player->pareja_nombre.' '.$player->pareja_apellido_pat.' '.$player->pareja_apellido_mat); ?></td>
              <?php endif; ?>
              <td><?php echo e($player->puntos); ?></td>
            </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>

      </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('socio.layout.gentelella', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>