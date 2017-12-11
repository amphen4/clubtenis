<?php $__env->startSection('titulo_contenido','Estadisticas en '.$modalidad); ?>
<?php $__env->startSection('content'); ?>

<?php if($player): ?>
<div class="row tile_count">
	<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Partidos Total Jugados</span>
      <div class="count blue"><?php echo e($player->partidos_jugados); ?></div>
      <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Partidos Total Ganados</span>
      <div class="count green"><?php echo e($player->partidos_ganados); ?></div>
      <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Partidos Total Perdidos</span>
      <div class="count"><?php echo e($player->partidos_perdidos); ?></div>
      <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
    </div>
    
</div>
<div class="row">
  <div class="col-md-12">
    <div class="">
      <div class="x_content">
        <div class="row">
        <?php if($player->ranking_id == null): ?>
          <div class="col-md-5 col-sm-6 col-xs-12">
              <div class="x_panel fixed_height_320">
                <div class="x_title">
                  <h2><?php echo e($ranking->nombre); ?></h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="pricing">
                    <div class="title">
                      <h2>Aún no has ingresado a:</h2>
                      <h3><?php echo e($ranking->nombre); ?></h3>
                    </div>
                    <div class="x_content">
                      <div class="">
                        
                      </div>
                      <div class="pricing_footer">
                        <a href="<?php echo e(url('/socio/rankings/'.$ranking->modalidad.'/inscribir')); ?>" class="btn btn-primary btn-block" role="button">Ingresar </a>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php else: ?>
          <div class="col-md-5 col-sm-6 col-xs-12">
              <div class="x_panel fixed_height_320">
                <div class="x_title">
                  <h2><?php echo e($ranking->nombre); ?></h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">
                    <ul class="quick-list">
                      <li><i class="fa fa-bars"></i><a href="#">Ver partidos Jugados</a></li>
                      <li><i class="fa fa-bar-chart"></i><a href="#">Ver partidos ganados</a> </li>
                    </ul>

                    <div class="sidebar-widget">
                      <h4>Victorias/Derrotas</h4>
                      <canvas width="150" height="80" id="gauge"  style="width: 160px; height: 100px;"></canvas>
                      <div class="goal-wrapper">
                        
                        <span id="gauge-text2" class="gauge-value pull-left"><?php echo e($player->partidos_ganados); ?> Victorias</span>
                        <span id="goal-text2" class="goal-value pull-right"><?php echo e($player->partidos_perdidos); ?> Derrotas</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
        <?php endif; ?>
            <div class="col-md-5 col-sm-6 col-xs-12">
              <div class="x_panel fixed_height_320">
                <div class="x_title">
                  <h2>Torneos</h2><span class="label label-info pull-right">Pronto</span>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">
                    <ul class="quick-list">
                      <li><i class="fa fa-bars"></i><a href="#">Ver partidos jugados</a></li>
                      <li><i class="fa fa-bar-chart"></i><a href="#">Ver partidos ganados</a> </li>                    </ul>

                    <div class="sidebar-widget">
                      <h4>Victorias/Derrotas</h4>
                      <canvas width="150" height="80" id="gauge"  style="width: 160px; height: 100px;"></canvas>
                      <div class="goal-wrapper">
                        
                        <span id="gauge-text2" class="gauge-value pull-left">? Victorias</span>
                        <span id="goal-text2" class="goal-value pull-right">? Derrotas</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php else: ?>
<div class="alert alert-warning alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
	</button>
	Aun no tienes un -Jugador <?php echo e($ranking->modalidad); ?>- creado. <string><a href="<?php echo e(url('/socio/players/create/'.$ranking->modalidad)); ?>">Haz click aqui para crearlo.</a></string>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <?php if($player): ?>
    <!-- gauge.js -->
    <script src="<?php echo e(asset('templates/gentelella')); ?>/vendors/gauge.js/dist/gauge.min.js"></script>
    <script>
    var chart_gauge_settings = {
          lines: 12,
          angle: 0,
          lineWidth: 0.4,
          pointer: {
            length: 0.75,
            strokeWidth: 0.042,
            color: '#1D212A'
          },
          limitMax: 'false',
          colorStart: '#1ABC9C',
          colorStop: '#1ABC9C',
          strokeColor: '#F0F3F3',
          generateGradient: true
        };
        if(<?php echo e($player->partido_ganado()->count()); ?> > 0){
    var chart_gauge_02_elem = document.getElementById('gauge');
    var chart_gauge_02 = new Gauge(chart_gauge_02_elem).setOptions(chart_gauge_settings);
        chart_gauge_02.maxValue = <?php echo e($player->partido()->where('ranking_id',$ranking->id)->count()); ?>;
        chart_gauge_02.animationSpeed = 32;

        chart_gauge_02.set(<?php echo e($player->partido_ganado()->count()); ?>);
      }
    </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('socio.layout.gentelella', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>