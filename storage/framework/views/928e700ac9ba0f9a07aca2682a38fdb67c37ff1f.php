<?php $__env->startSection('title','Inicio'); ?>



<?php $__env->startSection('titulo_contenido','~Socio\Inicio'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <?php if(Auth::user()->getJugadorSingles()): ?>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="glyphicon glyphicon-sort-by-order"></i>
              </div>
              <div class="count">#1</div>

              <h3>Ranking Singles</h3>
              <p>Click para mas detalles .</p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon">
              </div>
              <div class="count">26</div>

              <h3>Partidos Singles</h3>
              <a href=""><p>Click para mas detalles.</p></a>
            </div>
        </div>
        
    <?php endif; ?>
    <?php if(Auth::user()->getJugadorDobles()): ?>

        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="glyphicon glyphicon-pawn"></i>
              </div>
              <div class="count">9</div>

              <h3>Partidos Dobles</h3>
              <p>Click para mas detalles.</p>
            </div>
        </div>
    <?php endif; ?>
        
    
        
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('socio.layout.gentelella', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>