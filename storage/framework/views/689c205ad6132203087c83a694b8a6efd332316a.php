<?php $__env->startSection('content'); ?>
	<?php $__empty_1 = true; $__currentLoopData = $torneos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $torneo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		
					  <div class="col-md-6 col-sm-6 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i><?php echo e($torneo->nombre); ?></i></h4>
                            <div class="left col-xs-7">
                              
                              <ul class="list-unstyled">
                              	<li><i class="fa fa-info-circle"></i> Inscripciones: <?php echo e(ucwords($torneo->estado)); ?></li>
                              	<li><i class="fa fa-group"></i> Inscritos: <?php echo e($torneo->nro_inscritos); ?>

                                <?php if(isset($torneo->maxinscritos)): ?>
                                (max: <?php echo e($torneo->nro_inscritos); ?>)
                                <?php endif; ?>
                                </li>
                                <li><i class="fa fa-tags"></i> Modalidad: <strong> <?php echo e(ucwords($torneo->modalidad)); ?> </strong></li>
                                <li><i class="fa fa-calendar"></i> Fecha inicio: <?php echo e($torneo->fecha_inicio); ?></li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="<?php echo e(asset('templates/gentelella/production')); ?>/images/torneo-<?php echo e($torneo->modalidad); ?>.jpg" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                          	<?php if($torneo->modalidad == 'singles'): ?>
                          	  <?php if(Auth::user()->getJugadorSingles()): ?>
                          	  	  
                          	  	  <?php if(Auth::user()->getJugadorSingles()->torneo()->where('torneo_id',$torneo->id)->first()): ?>
                                	<?php if($torneo->estado == 'abierto'): ?>
                                	<button id="botonModalDes" value="<?php echo e($torneo->id); ?>"  type="button" class="btn btn-warning btn-xs" > <i class="fa fa-user">
                                	</i> Desinscribirse</button>
                                	<?php else: ?>
                                	<button disabled type="button" class="btn btn-success btn-xs" > <i class="fa fa-user">
                                	</i> Inscrito</button>
                                	<?php endif; ?>
                          	  	  <?php else: ?>
                          	  	  	<button id="botonModal" value="<?php echo e($torneo->id); ?>" type="button" class="btn btn-success btn-xs" > <i class="fa fa-user">
                                	</i> Inscribirse</button>
                          	  	  <?php endif; ?>
                          	  <?php endif; ?>
                          	<?php else: ?>
                          	  <?php if(Auth::user()->getJugadorDobles()): ?>
                          	  	  <?php if(Auth::user()->getJugadorDobles()->torneo()->where('torneo_id',$torneo->id)->first()): ?>
                          	  	    <?php if($torneo->estado == 'abierto'): ?>
                                	<button id="botonModalDes" value="<?php echo e($torneo->id); ?>"  type="button" class="btn btn-warning btn-xs" > <i class="fa fa-user">
                                	</i> Desinscribirse</button>
                                	<?php else: ?>
                                	<button disabled type="button" class="btn btn-success btn-xs" > <i class="fa fa-user">
                                	</i> Inscrito</button>
                                	<?php endif; ?>
                          	  	  <?php else: ?>
                          	  	  	<button id="botonModal" value="<?php echo e($torneo->id); ?>" type="button" class="btn btn-success btn-xs" > <i class="fa fa-user">
                                	</i> Inscribirse</button>
                          	  	  <?php endif; ?>
                          	  <?php endif; ?>
                          	<?php endif; ?>
                              
                              <a  href="<?php echo e(url('/socio/torneos/'.$torneo->slug)); ?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-trophy"> </i> Ver mas detalles
                              </a>
                          </div>
                        </div>
                      </div>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <p>No hay torneos.</p>
    <?php endif; ?>
    <div id="lptm" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog modal-sm">
	      <div class="modal-content">

	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
	          </button>
	          <h4 class="modal-title" id="myModalLabel2">¿Está seguro?</h4>
	        </div>
	        <form id="formwea" data-parsley-validate role="form" method="POST" action="<?php echo e(url('/socio/torneos/inscribir')); ?>">
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
    $("#botonModal").click(function(){
        $(".bs-example-modal-sm").modal("show");
        $('#input').val($(this).val());
    });
    $("#botonModalDes").click(function(){
        $(".bs-example-modal-sm").modal("show");
        $('#input').val($(this).val());
        $('#formwea').attr('action','<?php echo e(url('/socio/torneos/desinscribir')); ?>');
    });
        
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('socio.layout.gentelella', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>