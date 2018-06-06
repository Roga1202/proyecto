<html>
<head>
	<title>El Surtidor</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/font-awesome-4.7.0\css\font-awesome.min.css">
	<script src="assets/js/jquery-3.2.1.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="assets/images/ico.png" />
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
			  <li class="active"><a href="<?php echo BASE_URL;?>">Inicio</a></li>
			  <li><a href="<?php echo BASE_URL;?>informacion">¿Quienes Somos?</a></li>
			  <li><a href=".<?php echo BASE_URL;?>inscripcion">Articulos</a></li>
			  <li><a href="<?php echo BASE_URL;?>sucursales">Sucursales</a></li>
			  <li><a href="<?php echo BASE_URL;?>inicio_sesion">Iniciar Sesion</a></li>
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
						<img id="img-center" class="img-responsive" src="assets/images/banner0.jpg">
						<div class="carousel-caption">

						</div>
					</div>

					<div class="item">
						<img id="img-center" class="img-responsive" src="assets/images/banner1.jpg">
						<div class="carousel-caption">

						</div>
					</div>

					<div class="item">
						<img id="img-center" class="img-responsive" src="assets/images/banner2.jpg">
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
				<img src="assets/images/portman.jpg">
				<div class="caption">
					<h4>Hombres</h4>
				</div>
			</div>
			<div class="col-md-4" id="woman">
				<img src="assets/images/portwoman.jpg">
				<div class="caption">
					<h4>Mujeres</h4>
				</div>
			</div>
			<div class="col-md-4" id="kid">
				<img src="assets/images/portkid.jpg">
				<div class="caption">
					<h4>Niños</h4>
				</div>
			</div>
		</div>
	</div>
<footer class="footer">
		<?php
			require_once '../views/no_users/footer.php';
		 ?>
</footer>
</body>
</html>
