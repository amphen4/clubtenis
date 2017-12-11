<!DOCTYPE html>
<html>
<head>
<title>Club de Tenis Limache</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="<?php echo e(asset('/templates/frontend1/')); ?>/css/bootstrap.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,100' rel='stylesheet' type='text/css'>
<link href="<?php echo e(asset('/templates/frontend1/')); ?>/css/style.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10&appId=527855114054810";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<header class="main__header">
  <div class="container">
    <nav class="navbar navbar-default" role="navigation"> 
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <a href="<?php echo e(url('/')); ?>"><img height="80"  class="img-responsive" src="/imagenes/otros/logo4_web.png"></a>
        <!--<h3 class="navbar-brand "><a href="/">Club Tenis Limache</a></h3>-->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Menu Navegacion</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        
      </div>
      
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-right navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li ><a href="/">Inicio</a></li>
          <!--<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ingreso:</a>
            <ul class="dropdown-menu">
              <li><a href="/socios/login">Socios </a></li>
            </ul>
          </li> -->
          <li><a href="#">Noticias</a></li>
          <li><a href="#">Escuela de Tenis</a></li>
          <li><a href="#">Hágase Socio</a></li>
          <li><a href="#">Contacto</a></li>
          <li><a href="/socio/login">Acceso Socios</a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </nav>
  </div>
</header>
<?php echo $__env->yieldContent('content'); ?>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h3>Sobre el Club</h3>
        <p>-- LOGO CLUB -- <br />
          <br />
          If you have any questions about our products or services, please do not hesitate to contact us. We have friendly, knowledgeable representatives available seven days a week to assist you.</p>
      </div>
      <div class="col-md-6">
        <h3>Publicidad, Partners, Varios</h3>
        <p>............</p>
      </div>
      <div class="col-md-3">
        <h3>Info. Contacto</h3>
        <p>Calle Riquelme<br />
          Limache, Quinta Región<br />
          Chile<br />
          <br />
          Fono: (??) ???<br />
          <br />
          Encuéntranos en:
        </p>
        <div class="social__icons">  <a target="_blank" href="https://www.facebook.com/Clubtenislimache/" class="socialicon socialicon-facebook"></a> </div>
      </div>
    </div>
    <hr>
    <p class="text-center"> Sitio Oficial Club de Tenis Limache. Limache 2017</p>
  </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script type="text/javascript" src="<?php echo e(asset('/templates/frontend1/')); ?>/js/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo e(asset('/templates/frontend1/')); ?>/js/bootstrap.min.js"></script> 
<script type="text/javascript">

$('.carousel').carousel({
  interval: 3500, // in milliseconds
  pause: 'true' // set to 'true' to pause slider on mouse hover
})
</script>
</body>
</html>