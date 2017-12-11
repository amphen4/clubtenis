<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Admin</title>

    <!-- Bootstrap -->
    <link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo e(asset('templates/gentelella')); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('templates/gentelella')); ?>/build/css/custom.min.css" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo e(url('/admin/home')); ?>" class="site_title"><i class="fa fa-user"></i> <span>~Admin</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo e(asset('templates/gentelella/production')); ?>/images/perfil.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo e(Auth::user()->name); ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menú</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo e(url('/admin/home')); ?>"><i class="fa fa-home"></i> Inicio </a></li>
                  <li><a><i class="fa fa-newspaper-o"></i>Administrar Noticias <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo e(url('/admin/noticias')); ?>">Ver Noticias</a></li>
                      <li><a href="<?php echo e(url('/admin/noticias/create')); ?>">Nueva Noticia</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-camera-retro"></i>Administrar Galerias <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo e(url('/admin/galerias')); ?>">Ver Galerias</a></li>
                      <li><a href="<?php echo e(url('/admin/galerias/create')); ?>">Nueva Galeria</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> Administrar Socios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo e(url('/admin/socios')); ?>">Ver Socios Registrados</a></li>
                      <li><a href="<?php echo e(url('/admin/ruts')); ?>">Administrar registro de ruts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-trophy"></i> Administrar Torneos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/admin/torneos">Ver Torneos</a></li>
                      <li><a href="/admin/torneos/create">Nuevo Torneo</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-bar-chart-o"></i> Administrar Rankings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo e(url('/admin/rankings/resultado/singles')); ?>">Ingresar resultado singles</a></li>
                      <li><a href="<?php echo e(url('/admin/rankings/resultado/dobles')); ?>">Ingresar resultado dobles</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i>Administrar Usuarios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-table"></i> Administrar Canchas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                    </ul>
                  </li>
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo e(asset('templates/gentelella/production')); ?>/images/perfil.jpg" alt=""><?php echo e(Auth::user()->name); ?>

                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"><i class="fa fa-cog pull-right"></i> Perfil</a></li>
                    <li><a href="javascript:;">Ayuda</a></li>
                    <li>
                        <a href="<?php echo e(url('/admin/logout')); ?>"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out pull-right"></i> Cerrar Sesión
                        </a>

                        <form id="logout-form" action="<?php echo e(url('/admin/logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $__env->yieldContent('titulo_pagina'); ?></h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>

            <div class="clearfix"></div>
            <?php if(session('mensaje')): ?>
                <div class="alert alert-warning alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <?php echo e(session('mensaje')); ?>

                </div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Limache 2017    |   Template: Gentelella
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo e(asset('templates/gentelella')); ?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo e(asset('templates/gentelella')); ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo e(asset('templates/gentelella')); ?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo e(asset('templates/gentelella')); ?>/vendors/nprogress/nprogress.js"></script>
    <?php echo $__env->yieldContent('js'); ?>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo e(asset('templates/gentelella')); ?>/build/js/custom.min.js"></script>
    
  </body>
</html>
