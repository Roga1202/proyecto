<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$route = $_GET['route'] ?? '/';

switch ($route) {
    case'/informacion.php':
        require '../administrador/administracion_articulos.php';
        break;
    case'/admin/posts':
        require '../admin/posts.php';
        break;
}
?>
<html>
<head>
	<title>El Surtidor</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="images/ico.png" />
</head>
<body>
	<header>
		<nav class="navbar navbar-default" role="navigation">
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-ex1-collapse">
			  <span class="sr-only">Desplegar navegación</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button>
			<div class="col-md-2 navbar-brand"><img src="images/branda.jpg"></div>
		  </div>
		  <div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
			  <li class="active"><a href="inicio.php">Inicio</a></li>
			  <li><a href="informacion.php">¿Quienes Somos?</a></li>
			  <li><a href="inscripcion.php">Articulos</a></li>
			  <li><a href="sucursales.php">Sucursales</a></li>
			  <li><a href="inicio_sesion.php">Iniciar Sesion</a></li>
			</ul>
		  </div>
		</nav>
	</header>
	<div class="container-mycarousel" style="width: 100%; height: 75%; padding: 0; border-radius: 0px; border: 0">
		<div class="row">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
						<img id="img-center" class="img-responsive" src="images/banner0.jpg">
						<div class="carousel-caption">

						</div>
					</div>

					<div class="item">
						<img id="img-center" class="img-responsive" src="images/banner1.jpg">
						<div class="carousel-caption">

						</div>
					</div>

					<div class="item">
						<img id="img-center" class="img-responsive" src="images/banner2.jpg">
						<div class="carousel-caption">

						</div>
					</div>
				</div>

				  <!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	<div class="container-images">
		<div class="row">
			<div class="col-md-4" id="man">
				<img src="images/portman.jpg">
				<div class="caption">
					<h4>Hombres</h4>
				</div>
			</div>
			<div class="col-md-4" id="woman">
				<img src="images/portwoman.jpg">
				<div class="caption">
					<h4>Mujeres</h4>
				</div>
			</div>
			<div class="col-md-4" id="kid">
				<img src="images/portkid.jpg">
				<div class="caption">
					<h4>Niños</h4>
				</div>
			</div>
		</div>
	</div>
<footer class="footer">
		<?php
			require_once 'footer.php';
		 ?>
</footer>
</body>
</html>
