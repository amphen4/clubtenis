<?php $__env->startSection('title','Inicio - Socio'); ?>

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('css')); ?>/iconos-clima.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('titulo_contenido','Inicio'); ?>

<?php $__env->startSection('content'); ?>
<div clas="row">
<div class="col-md-6 col-sm-6 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Pronostico del tiempo Hoy</h2>
      
      <div class="clearfix"></div>
    </div>
    <div id="contenido_tiempo" class="x_content">
      <div class="row">
        <div class="col-sm-12">
          <div id="titulo" class="temperature">

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="weather-icon">
            
          </div>
        </div>
        <div class="col-sm-8">
          <div id="textoTiempo" class="weather-text">
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="weather-text pull-right">
          <h3 id="temperaturas"></h3>
        </div>
      </div>

      <div class="clearfix"></div>

      
    </div>
  </div>

</div>
</div>
<div class="row">
    <?php if(Auth::user()->getJugadorSingles()): ?>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="glyphicon glyphicon-sort-by-order"></i>
              </div>
              <div class="count">#<?php echo e(Auth::user()->getJugadorSingles()->posicion); ?></div>

              <h3>Ranking Singles</h3>
              <a href="<?php echo e(url('/socio/players/singles')); ?>"><p>Click para mas detalles .</p></a>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon">
              </div>
              <div class="count"><?php echo e(Auth::user()->getJugadorSingles()->partidos_jugados); ?></div>

              <h3>Partidos Singles</h3>
              <a href="<?php echo e(url('/socio/players/singles')); ?>"><p>Click para mas detalles.</p></a>
            </div>
        </div>
        
    <?php endif; ?>
    <?php if(Auth::user()->getJugadorDobles()): ?>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="glyphicon glyphicon-sort-by-order"></i>
              </div>
              <div class="count">#<?php echo e(Auth::user()->getJugadorDobles()->posicion); ?></div>

              <h3>Ranking Dobles</h3>
              <a href="<?php echo e(url('/socio/players/dobles')); ?>"><p>Click para mas detalles .</p></a>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"></i>
              </div>
              <div class="count"><?php echo e(Auth::user()->getJugadorDobles()->partidos_jugados); ?></div>

              <h3>Partidos Dobles</h3>
              <a href="<?php echo e(url('/socio/players/dobles')); ?>"><p>Click para mas detalles.</p></a>
            </div>
        </div>
    <?php endif; ?>
        
    
        
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<!-- Skycons -->
<script src="../vendors/skycons/skycons.js"></script>
<script src="<?php echo e(asset('plugins/monkee-weather')); ?>/jquery.simpleWeather.min.js"></script>
<script>
$(document).ready(function() {
  $.simpleWeather({
    location: 'Limache, CL',
    woeid: '',
    unit: 'c',
    success: function(weather) {
      $(".weather-icon").html('<img src="'+weather.forecast[0].image+'" >');
      $("#textoTiempo").html('<h2>'+weather.city+', '+weather.country+' <br><i>'+weather.text+'</i></h2>');
      $("#temperaturas").html('<strong>Min:</strong> '+weather.low+'°C  <strong>Max:</strong> '+weather.high+'°C');
      $("#titulo").html(weather.title);
    },
    error: function(error) {
      $("#contenido_tiempo").html('<p>'+error+'</p>');
    }
  });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('socio.layout.gentelella', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>