<?php $__env->startSection('content'); ?>
<?php if(isset($listas)): ?>
<?php $__currentLoopData = $rankings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ranking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

<div class="col-md-9 col-sm-9 col-xs-18">
    <div class="x_panel">
      <div class="x_title">
        <h2>Partidos en: <?php echo e($ranking->nombre); ?></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <?php if(isset($listas[$loop->index])): ?>
        <table class="table table-bordered">
          <thead>
            <tr>
            <?php if($ranking->modalidad == 'singles'): ?>
              <th>Jugador 1</th>
              <th>Jugador 2</th>
              <th>Marcador</th>
              <th>Ganador</th>
              <th>Fecha | Hora</th>
            <?php else: ?>
              <th>Pareja 1</th>
              <th>Pareja 2</th>
              <th>Marcador</th>
              <th>Ganador</th>
              <th>Fecha | Hora</th>
            <?php endif; ?>
            </tr>
          </thead>
          <tbody>
          
            <?php $__currentLoopData = $listas[$loop->index]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($ranking->modalidad == 'singles'): ?>
                    <tr>
                      <?php $__currentLoopData = $partido->player()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $man): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($man->socio->id == Auth::user()->id): ?>
                          <td><strong><a href="<?php echo e(url('/socio/players/singles')); ?>"><?php echo e($man->nombre.' '.$man->apellido_pat.' '.$man->apellido_mat); ?></a></strong></td>
                          <?php else: ?>
                          <td><?php echo e($man->nombre.' '.$man->apellido_pat.' '.$man->apellido_mat); ?></td>
                          <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <td><?php echo e($partido->marcador); ?></td>
                      <td><?php echo e($partido->ganador->nombre.' '.$partido->ganador->apellido_pat.' '.$partido->ganador->apellido_mat); ?></td>
                      <td><?php echo e($partido->fecha_hora); ?></td>
                    </tr>
                <?php else: ?>

                    <tr>
                      <?php $__currentLoopData = $partido->player()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $man): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($man->socio->id == Auth::user()->id): ?>
                          <td><strong><a href="<?php echo e(url('/socio/players/dobles')); ?>"><?php echo e($man->nombre.' '.$man->apellido_pat.' '.$man->apellido_mat.' - '.$man->pareja_nombre.' '.$man->pareja_apellido_pat.' '.$man->pareja_apellido_mat); ?></a></strong></td>
                          <?php else: ?>
                          <td><?php echo e($man->nombre.' '.$man->apellido_pat.' '.$man->apellido_mat.' - '.$man->pareja_nombre.' '.$man->pareja_apellido_pat.' '.$man->pareja_apellido_mat); ?></td>
                          <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <td><?php echo e($partido->marcador); ?></td>
                      <td><?php echo e($partido->ganador->nombre.' '.$partido->ganador->apellido_pat.' '.$partido->ganador->apellido_mat.' - '.$partido->ganador->pareja_nombre.' '.$partido->ganador->pareja_apellido_pat.' '.$partido->ganador->pareja_apellido_mat); ?></td>
                      <td><?php echo e($partido->fecha_hora); ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
          </tbody>
        <?php else: ?>
        <div class="alert alert-warning alert-dismissible fade in" role="alert">
          Ud. no se ha inscrito aún en este ranking. <a href="<?php echo e(url('/socio/players/'.$ranking->modalidad)); ?>">Haga click aquí para inscribirse</a>
        </div>
        <?php endif; ?>
        </table>

      </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<div class="alert alert-warning alert-dismissible fade in" role="alert">
  No participa en ningun ranking
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('socio.layout.gentelella', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>