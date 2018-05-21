<html>
<head>
	<title>El Surtidor-Administracion de articulos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="../public/assets/css/bootstrap.css">
	<link rel="stylesheet" href="../public/assets/font-awesome-4.7.0/css/font-awesome.min.css">
	<link href="../public/assets/css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="../public/assets/js/jquery-3.1.1.min.js"></script>
	<script src="../public/assets/js/jquery.dataTables.min.js"></script>
	<script src="../public/assets/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="../public/assets/images/ico.png">
	<script language="javascript" src="../public/assets/js/jquery-1.2.6.min.js"></script>
</head>
<body>
	<header>
		<div class="navbar navbar-default navbar-fixed-black">
			<ul class="nav navbar-nav delete-div">
				<li><a href="https://www.facebook.com/ElSurtidordelaFronteraC.A/" target="_blank" class="fa fa-facebook"></a></li>
				<li><a href="https://twitter.com/SurtiFronteraCA" target="_blank" class="fa fa-twitter"></a></li>
				<li><a href="https://www.pinterest.es/elsurtidordelafronteraca/" target="_blank" class="fa fa-pinterest"></a></li>
				<li><a href="https://www.instagram.com/elsurtidordelafronteraca/" target="_blank" class="fa fa-instagram"></a></li>
				<li><a href="https://plus.google.com/u/0/118367914219581607265" target="_blank" class="fa fa-google-plus"></a></li>
			</ul>
		</div>
		<nav class="navbar navbar-default" role="navigation">
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-ex1-collapse">
			  <span class="sr-only">Desplegar navegación</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button>
			<div class="col-md-2 navbar-brand"><img src="images/brand.jpg"></div>
		  </div>
		  <div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
			  <li><a href="inicio.php">Inicio</a></li>
			  <li><a href="informacion.php">¿Quienes Somos?</a></li>
			  <li><a href="inscripcion.php">Articulos</a></li>
			  <li><a href="sucursales.php">Sucursales</a></li>
			   <li class="active" id="articulo"><a href="administracion_articulos.php">Administracion</a></li>
			</ul>
		  </div>
		</nav>
	</header>
	<div class="container">
		<div class="col-md-12">

		<div class="row" style="margin-left: 5%;">
				<div class="col-md-12">
					<a href="administracion_articulos.php" class="btn btn-info btn-lg">
		        	<span class="glyphicon glyphicon-cog"></span> Administar
		        </a>
		        <a href="" class="btn btn-info btn-lg">
		        	<span class="glyphicon glyphicon-plus"></span> Agregar
		        </a>
		        <a href="historial.php" class="btn btn-info btn-lg">
		        	<span class="glyphicon glyphicon-calendar"></span> Historial
				</a>
				<a href="estadistica.php" class="btn btn-info btn-lg">
					<span class="glyphicon glyphicon-stats"></span> Estadistica de Ventas
				</a>
				</div>
			</div>

			<h2><center>Agregar Sucursal.</center></h2>
			<form name="agregar_sucursal" class="form-horizontal" method="POST" enctype="multipart/form-data" action="../settings/sql/save_sucursal.php" autocomplete="off">
  			<br>


			<div class="form-group">
				<label for="nombre" class="col-sm-2 control-label">Nombre</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la sucusal" required>
				</div>
			</div>

			<div class="form-group">
				<label for="latitud" class="col-sm-2 control-label">Latitud</label>
				<div class="col-sm-10">
					<input type="number" step="0.000001" class="form-control" id="latitud" name="latitud"required>
				</div>
			</div>

			<div class="form-group">
				<label for="longitud" class="col-sm-2 control-label">Longitud</label>
				<div class="col-sm-10">
					<input type="number" step="0.000001" class="form-control" id="longitud" name="longitud"required>
				</div>
			</div>


			<div class="form-group">
				<label for="reg_mer" class="col-sm-2 control-label">Registro Mercantil</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="reg_mer" name="reg_mer"required>
				</div>
			</div>

			<div class="form-group">
				<label for="direccion" class="col-sm-2 control-label">Direccion</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="direccion" name="direccion"required>
				</div>
			</div>

			<div class="form-group">
				<label for="cupo_emp" class="col-sm-2 control-label">Cupo empleados</label>
				<div class="col-sm-10">
					<p><input type="number" step="1" id="cupo_emp" name="cupo_emp" required="required" placeholder="0"></p>
				</div>
			</div>

			<div class="form-group">
				<label for="emp" class="col-sm-2 control-label">Precio por unidad</label>
				<div class="col-sm-10">
					<p><input type="number" step="1" id="emp" name="emp" required="required" placeholder="0"></p>
				</div>
			</div>

			<div class="form-group">
				<label for="tlf" class="col-sm-2 control-label">Precio por unidad</label>
				<div class="col-sm-10">
					<p><input type="number" id="tlf" name="tlf" required="required" placeholder="0276-111-22-33"></p>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<a href="administracion_articulos.php" class="btn btn-default">Regresar</a>
					<input type="submit" class="btn btn-primary" value="Guardar">
				</div>
			</div>
			</form>
		</div>
	</div>
	<footer class="footer">
		<?php
			require_once 'footer.php';
		?>
	</footer>
</body>
</html>
<!--akareliz@gmail.com-->
