<?php
	session_start();
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
	<title>El Surtidor</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/margen.css">
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
			</ul>
		  </div>
		</nav>
	</header>
	<div class="container" style="width: 100%; height: 75%; padding: 0; border-radius: 0px; border: 0">
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
		<br>
	</div>
	<div class="container">
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
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h4>Direccion</h4>
					<p>Centro Av 7 , calle 7 y 8 local N° 7-56. Centro San Cristóbal  RIF J-31129078</p>
				</div>
				<div class="col-md-3">
					<h4>Telefono</h4>
					<p>0276-3546759</p>
				</div>
				<div class="col-md-3">
					<h4>Correo Electronico</h4>
					<a mailto="Elsurtidor@tiendas.com">ElSurtidordelaFronteraca@gmail.com</a>
				</div>
				<div class="col-md-3">
					<div>
						<ul class="nav navbar-nav delete-div">
							<li><a href="https://www.facebook.com/ElSurtidordelaFronteraC.A/" target="_blank" class="fa fa-facebook"></a></li>
							<li><a href="https://twitter.com/SurtiFronteraCA" target="_blank" class="fa fa-twitter"></a></li>
							<li><a href="https://www.pinterest.es/elsurtidordelafronteraca/" target="_blank" class="fa fa-pinterest"></a></li>
							<li><a href="https://www.instagram.com/elsurtidordelafronteraca/" target="_blank" class="fa fa-instagram"></a></li>
							<li><a href="https://plus.google.com/u/0/118367914219581607265" target="_blank" class="fa fa-google-plus"></a></li>
						</ul>
					</div>

				</div>
			</div>
			<br>
		</div>
	</footer>
</body>
</html>
<!--akareliz@gmail.com-->
