<?php $__env->startSection('css'); ?>
<!-- bootstrap-daterangepicker -->
<link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-trophy"></i> <?php echo e($torneo->nombre); ?> </h2>
                    <a href="<?php echo e(url('/admin/torneos')); ?>" class="btn btn-info pull-right">Volver a torneos</a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Información</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Inscritos</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Cuadro</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                            synth. Cosby sweater eu banh mi, qui irure terr.</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <table class="table table-bordered jambo_table">
					          <thead>
					            <tr>
					              <?php if($torneo->modalidad == 'singles'): ?>
					              <th>Nombre Jugador</th>
					              <?php else: ?>
					              <th>Pareja</th>
					              <?php endif; ?>
					              <th>Nivel Categoria</th>
					              <th>Opciones</th>
					            </tr>
					          </thead>
					          <tbody>
					            <?php $__empty_1 = true; $__currentLoopData = $torneo->player()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					            
					            <tr>
					              <?php if($torneo->modalidad == 'singles'): ?>
					              <td><a href="#"><?php echo e($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat); ?></a></td>
					              <?php else: ?>
					              <td><a href="#"><?php echo e($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat.' - '.$player->pareja_nombre.' '.$player->pareja_apellido_pat.' '.$player->pareja_apellido_mat); ?></a></td>
					              <?php endif; ?>
					              <td><?php echo e($player->nivel_categoria); ?></td>
					              <?php if($torneo->estado == 'abierto'): ?>
					              <td><button class="btn btn-danger btn-xs">Eliminar</button></td>
					              <?php else: ?>
					              <td><button disabled class="btn btn-danger btn-xs">Eliminar</button></td>
					              <?php endif; ?>
					            </tr>
					            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					            <tr><td>No hay inscritos.</td></tr>
					            <?php endif; ?>
					          </tbody>
					        </table>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        	<?php if($torneo->estado == 'abierto'): ?>
                        	<p>Cuadro no creado. Inscripciones abiertas</p>
                        	<?php else: ?>
		                    <div class="col-xs-2">
		                      <!-- required for floating -->
		                      <!-- Nav tabs -->
		                      <ul class="nav nav-tabs tabs-left">
		                      	<?php for($i = $nro_rondas; $i>=1; $i--): ?>
		                      		<?php if($i==$nro_rondas): ?>
		                      			<li class="active"><a href="#<?php echo e($i); ?>" data-toggle="tab"><?php echo e($rondas[$i-1]); ?></a></li>
		                      		<?php else: ?>
		                      			<li><a href="#<?php echo e($i); ?>" data-toggle="tab"><?php echo e($rondas[$i-1]); ?></a></li>
		                      		<?php endif; ?>
		                        <?php endfor; ?>
		                      </ul>
		                    </div>

		                    <div class="col-xs-10">
		                      <!-- Tab panes -->
		                      <div class="tab-content">
		                      	<?php for($i = $nro_rondas; $i>=1; $i--): ?>
		                      		<?php if($i==$nro_rondas): ?>
		                      			<div class="tab-pane active" id="<?php echo e($i); ?>">
		                      		<?php else: ?>
		                      			<div class="tab-pane" id="<?php echo e($i); ?>">
		                      		<?php endif; ?>

			                          	<?php $__currentLoopData = $partidos[((int)abs($i-$nro_rondas))]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			                        	<div class="col-md-8 col-xs-12">
							                <div class="x_panel">
							                	  <div class="x_title">
								                    <h2>Partido #:<?php echo e($partido->nro); ?> - <?php echo e($partido->ronda); ?></h2>
								                    
								                    <div class="clearfix"></div>
								                  </div>
								                  <div class="x_content">
								                  	<?php if($partido->jugado == 0): ?>

								                  		<?php if($partido->partidosRelacionados()->where('jugado',0)->count() > 0): ?>
								                  			<p>Esperando Ganadores</p>
								                  		<?php else: ?>
								                  		
								                  			<form data-parsley-validate class="form-horizontal form-label-left" role="form" method="POST" action="<?php echo e(url('/admin/torneos/partido')); ?>">
									                  		
										                    <?php if($partido->player()->count() > 1): ?>
										                    <input type="hidden" name="accion" value="cerrar">
										                    <?php else: ?>
										                    <input type="hidden" name="accion" value="subir">
										                    <?php endif; ?>

										                    <input type="hidden" name="partido_id" value="<?php echo e($partido->id); ?>">
										                    <input type="hidden" name="torneo_id" value="<?php echo e($torneo->id); ?>">
										                    <?php echo e(csrf_field()); ?>  
										                      <?php if(isset($partido->player()->get()->toArray()[0])): ?>

										                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
										                        <?php if($torneo->modalidad == 'singles'): ?>
										                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jugador 1</label>
										                        <select name="jugador1" class="form-control" required>
										                        	<option selected value="<?php echo e($partido->player()->get()->toArray()[0]['id']); ?>"><?php echo e($partido->player()->get()->toArray()[0]['nombre'].' '.$partido->player()->get()->toArray()[0]['apellido_pat'].' '.$partido->player()->get()->toArray()[0]['apellido_mat']); ?></option>
										                        </select>
										                        
										                        
										                        <?php else: ?>
										                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jugador 1</label>
										                        <select name="jugador1" class="form-control" required>
										                        	<option selected value="<?php echo e($partido->player()->get()->toArray()[0]['id']); ?>"><?php echo e($partido->player()->get()->toArray()[0]['nombre'].' '.$partido->player()->get()->toArray()[0]['apellido_pat'].' '.$partido->player()->get()->toArray()[0]['apellido_mat'].' - '.$partido->player()->get()->toArray()[0]['pareja_nombre'].' '.$partido->player()->get()->toArray()[0]['pareja_apellido_pat'].' '.$partido->player()->get()->toArray()[0]['pareja_apellido_mat']); ?></option>
										                        </select>
										                        <?php endif; ?>
										                      </div>
										                      <?php else: ?>
										                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
										                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Jugador 1</label>
										                        <select name="jugador1" class="form-control" required>
									                            	<option selected  value="-1">BYE</option>
									                            	<?php $__currentLoopData = $torneo->player()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									                            	<?php if($torneo->modalidad == 'singles'): ?>
									                            	<option value="<?php echo e($player->id); ?>"><?php echo e($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat); ?></option>
									                            	<?php else: ?>
									                            	<option value="<?php echo e($player->id); ?>"><?php echo e($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat.' - '.$player->pareja_nombre.' '.$player->pareja_apellido_pat.' '.$player->pareja_apellido_mat); ?></option>
									                            	<?php endif; ?>
									                            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									                            </select>
										                        
										                      </div>
										                      <?php endif; ?>
										                      
										                      <?php if(isset($partido->player()->get()->toArray()[1])): ?>
										                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
										                      	<?php if($torneo->modalidad == 'singles'): ?>
										                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jugador 2</label>
										                        <select name="jugador2" class="form-control" required>
										                        	<option selected value="<?php echo e($partido->player()->get()->toArray()[1]['id']); ?>"><?php echo e($partido->player()->get()->toArray()[1]['nombre'].' '.$partido->player()->get()->toArray()[1]['apellido_pat'].' '.$partido->player()->get()->toArray()[1]['apellido_mat']); ?></option>
										                        </select>
										                        <?php else: ?>
										                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jugador 2</label>
										                        <select name="jugador2" class="form-control" required>
										                        	<option selected value="<?php echo e($partido->player()->get()->toArray()[1]['id']); ?>"><?php echo e($partido->player()->get()->toArray()[1]['nombre'].' '.$partido->player()->get()->toArray()[1]['apellido_pat'].' '.$partido->player()->get()->toArray()[1]['apellido_mat'].' - '.$partido->player()->get()->toArray()[1]['pareja_nombre'].' '.$partido->player()->get()->toArray()[1]['pareja_apellido_pat'].' '.$partido->player()->get()->toArray()[1]['pareja_apellido_mat']); ?></option>
										                        </select>
										                        <?php endif; ?>
										                      </div>
										                      <?php else: ?>
										                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
										                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Jugador 2</label>
										                        <select name="jugador2" class="form-control" required>
									                            	<option selected  value="-1">BYE</option>
									                            	<?php $__currentLoopData = $torneo->player()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										                            	<?php if($torneo->modalidad == 'singles'): ?>
										                            	<option value="<?php echo e($player->id); ?>"><?php echo e($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat); ?></option>
										                            	<?php else: ?>
										                            	<option value="<?php echo e($player->id); ?>"><?php echo e($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat.' - '.$player->pareja_nombre.' '.$player->pareja_apellido_pat.' '.$player->pareja_apellido_mat); ?></option>
										                            	<?php endif; ?>
									                            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									                            </select>
										                        
										                      </div>
										                      <?php endif; ?>
										                      
										                      <div class='input-group date form-group' id='myDatepicker'>

											                    <input type='text' name="fecha_hora" class="form-control" placeholder="Fecha y Hora"/ required>
											                    <span class="input-group-addon">
											                       <span class="glyphicon glyphicon-calendar"></span>
											                    </span>
											                  </div>
										                      
										                      <?php if($partido->player()->count() > 1): ?>
										                      <div class="form-group">
										                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Marcador</label>
										                        <div class="col-md-9 col-sm-9 col-xs-12">
										                          <input type="text" class="form-control" required name="marcador">
										                        </div>
										                      </div>

										                      <div class="form-group">
										                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Ganador</label>
										                        <div class="col-md-9 col-sm-9 col-xs-12">
										                           <select name="ganador" class="form-control" required>
										                           		<?php if($torneo->modalidad == 'singles'): ?>

										                           		<option value="<?php echo e($partido->player()->get()->toArray()[0]['id']); ?>"><?php echo e($partido->player()->get()->toArray()[0]['nombre'].' '.$partido->player()->get()->toArray()[0]['apellido_pat'].' '.$partido->player()->get()->toArray()[0]['apellido_mat']); ?></option>
										                           		<option value="<?php echo e($partido->player()->get()->toArray()[1]['id']); ?>"><?php echo e($partido->player()->get()->toArray()[1]['nombre'].' '.$partido->player()->get()->toArray()[1]['apellido_pat'].' '.$partido->player()->get()->toArray()[1]['apellido_mat']); ?></option>

										                           		<?php else: ?>

										                           		<option value="<?php echo e($partido->player()->get()->toArray()[0]['id']); ?>"><?php echo e($partido->player()->get()->toArray()[0]['nombre'].' '.$partido->player()->get()->toArray()[0]['apellido_pat'].' '.$partido->player()->get()->toArray()[0]['apellido_mat'].' - '.$partido->player()->get()->toArray()[0]['pareja_nombre'].' '.$partido->player()->get()->toArray()[0]['pareja_apellido_pat'].' '.$partido->player()->get()->toArray()[0]['pareja_apellido_mat']); ?></option>
										                           		<option value="<?php echo e($partido->player()->get()->toArray()[1]['id']); ?>"><?php echo e($partido->player()->get()->toArray()[1]['nombre'].' '.$partido->player()->get()->toArray()[1]['apellido_pat'].' '.$partido->player()->get()->toArray()[1]['apellido_mat'].' - '.$partido->player()->get()->toArray()[1]['pareja_nombre'].' '.$partido->player()->get()->toArray()[1]['pareja_apellido_pat'].' '.$partido->player()->get()->toArray()[1]['pareja_apellido_mat']); ?></option>

										                           		<?php endif; ?>
										                           </select>
										                        </div>
										                      </div>
										                      <?php endif; ?>
										                      
										                      <div class="ln_solid"></div>
										                      <div class="form-group">
										                          <?php if($partido->player()->count() < 2): ?>
										                          <button type="submit" class="btn btn-primary">Subir Partido</button>
										                          <?php else: ?>
										                          <button type="submit" class="btn btn-primary">Cerrar Partido</button>
										                          <?php endif; ?>
										                        
										                      </div>

										                    </form>
									                    <?php endif; ?>
									                <?php else: ?>
									                
												                    <table class="table table-hover jambo_table">
												                      <thead>
												                        <tr>
												                          <th>#</th>
												                          <th>Fecha-Hora</th>
												                          <th>Jugador 1</th>
												                          <th></th>
												                          <th>Jugador 2</th>
												                          <th>Marcador</th>
												                          <th>Ganador</th>
												                        </tr>
												                      </thead>
												                      <tbody>
												                        <tr>
												                          <th scope="row"><?php echo e($partido->nro); ?></th>
												                          
												                          <td><?php echo e($partido->fecha_hora); ?></td>

												                          
													                         
													                      	  <?php if(isset($partido->player()->get()->toArray()[0])): ?>
													                      	  	<td><?php echo e($partido->player()->get()->toArray()[0]['nombre']); ?></td>
													                      	  <?php else: ?>
													                      	  	<td>BYE</td>
													                      	  <?php endif; ?>
													                      		
													                      
												                          <td>vs</td>
												                          
													                      	  <?php if(isset($partido->player()->get()->toArray()[1])): ?>
													                          <td><?php echo e($partido->player()->get()->toArray()[1]['nombre']); ?></td>
													                          <?php else: ?>
													                          <td>BYE</td>
													                          <?php endif; ?>
													                      
												                          <?php if(isset($partido->marcador)): ?>
												                          <th><?php echo e($partido->marcador); ?></th>
												                          <?php else: ?>
												                          <th>-</th>
												                          <?php endif; ?>
												                          <th>WOW</th>
												                        </tr>
												                      </tbody>
												                    </table>
											                  
									                <?php endif; ?>
								                  </div>
							                </div>
							            </div>
							            <hr>
							            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								            
				                        </div>
		                      		
		                      	<?php endfor; ?>   
		                      </div>
		                    </div>

		                    <div class="clearfix"></div>
		                    <?php endif; ?>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
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