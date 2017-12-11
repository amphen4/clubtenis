<?php $__env->startSection('content'); ?>
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-trophy"></i> <?php echo e($torneo->nombre); ?> </h2>
                    
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
                          <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

		                    <div class="col-xs-2">
		                      <!-- required for floating -->
		                      <!-- Nav tabs -->
		                      <ul class="nav nav-tabs tabs-left">
		                        <li class="active"><a href="#home" data-toggle="tab">Primera Ronda</a>
		                        </li>
		                        <li><a href="#profile" data-toggle="tab">CF</a>
		                        </li>
		                        <li><a href="#messages" data-toggle="tab">SF</a>
		                        </li>
		                        <li><a href="#settings" data-toggle="tab">F</a>
		                        </li>
		                      </ul>
		                    </div>

		                    <div class="col-xs-10">
		                      <!-- Tab panes -->
		                      <div class="tab-content">
		                        <div class="tab-pane active" id="home">
		                          <p class="lead">Home tab</p>
		                          <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
		                            synth. Cosby sweater eu banh mi, qui irure terr.</p>
		                        </div>
		                        <div class="tab-pane" id="profile">bla bla bla bla bla.</div>
		                        <div class="tab-pane" id="messages">bla bla bla bla.</div>
		                        <div class="tab-pane" id="settings">
		                        	<div class="col-md-6 col-sm-6 col-xs-12">
						                <div class="x_panel">
							                  <div class="x_content">
								                    <table class="table table-hover">
								                      <thead>
								                        <tr>
								                          <th>#</th>
								                          <th>Jugador 1</th>
								                          <th></th>
								                          <th>Jugador 2</th>
								                          <th>Marcador</th>
								                        </tr>
								                      </thead>
								                      <tbody>
								                        <tr>
								                          <th scope="row">1</th>
								                          <td>Mark</td>
								                          <td>vs</td>
								                          <td>@mdo</td>
								                          <th>6-0 6-2 7-6</th>
								                        </tr>
								                      </tbody>
								                    </table>
							                  </div>
						                </div>
						            </div>
		                        </div>
		                      </div>
		                    </div>

		                    <div class="clearfix"></div>

                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.gentelella', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>