<?php $__env->startSection('content'); ?>
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-trophy"></i> <?php echo e($torneo->nombre); ?> </h2>
                    <a href="<?php echo e(url('/socio/torneos')); ?>" class="btn btn-info pull-right">Volver a torneos</a>
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
					            </tr>
					          </thead>
					          <tbody>
					            <?php $__empty_1 = true; $__currentLoopData = $torneo->player()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					            
					            <tr>
					              <?php if($torneo->modalidad == 'singles'): ?>
					              <td><a href="#"><?php echo e(ucwords($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat)); ?></a></td>
					              <?php else: ?>
					              <td><a href="#"><?php echo e(ucwords($player->nombre.' '.$player->apellido_pat.' '.$player->apellido_mat.' - '.$player->pareja_nombre.' '.$player->pareja_apellido_pat.' '.$player->pareja_apellido_mat)); ?></a></td>
					              <?php endif; ?>
					              <td><?php echo e(ucwords($player->nivel_categoria)); ?></td>
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
				                        	<div class="col-md-12 col-sm-12 col-xs-12">
								                <div class="x_panel">
									                  <div class="x_content">
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
										                          <?php if(isset($partido->fecha_hora)): ?>
										                          <td><?php echo e($partido->fecha_hora); ?></td>
										                          <?php else: ?>
										                          <td>Por definir</td>
										                          <?php endif; ?>
										                          <?php if($partido->jugado == 0): ?>
											                          <?php if(isset($partido->player()->get()->toArray()[0])): ?>
											                          <td><?php echo e($partido->player()->get()->toArray()[0]['nombre']); ?></td>
											                          <?php else: ?>
											                          <td></td>
											                          <?php endif; ?>
											                      <?php else: ?>
											                      	  <?php if(isset($partido->player()->get()->toArray()[0])): ?>
											                      	  	<td><?php echo e($partido->player()->get()->toArray()[0]['nombre']); ?></td>
											                      	  <?php else: ?>
											                      	  	<td>BYE</td>
											                      	  <?php endif; ?>
											                      		
											                      <?php endif; ?>
										                          <td>vs</td>
										                          <?php if($partido->jugado == 0): ?>
											                          <?php if(isset($partido->player()->get()->toArray()[1])): ?>
											                          <td><?php echo e($partido->player()->get()->toArray()[1]['nombre']); ?></td>
											                          <?php else: ?>
											                          <td></td>
											                          <?php endif; ?>
											                      <?php else: ?>
											                      	  <?php if(isset($partido->player()->get()->toArray()[1])): ?>
											                          <td><?php echo e($partido->player()->get()->toArray()[1]['nombre']); ?></td>
											                          <?php else: ?>
											                          <td>BYE</td>
											                          <?php endif; ?>
											                      <?php endif; ?>
										                          <?php if(isset($partido->marcador)): ?>
										                          <th><?php echo e($partido->marcador); ?></th>
										                          <?php else: ?>
										                          <th>-no jugado-</th>
										                          <?php endif; ?>
										                          <?php if(isset($partido->ganador_id)): ?>
										                          <th><?php echo e($partido->ganador()->first()->nombre); ?></th>
										                          <?php else: ?>
										                           <th>-no jugado-</th>
										                          <?php endif; ?>
										                        </tr>
										                      </tbody>
										                    </table>
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
<?php echo $__env->make('socio.layout.gentelella', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>