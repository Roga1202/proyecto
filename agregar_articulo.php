<?php
	session_start();
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
	<title>El Surtidor-Administracion de articulos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="images/ico.	png" />
	<script language="javascript" src="js/jquery-1.2.6.min.js"></script>
	<script language="javascript">
	$(document).ready(function(){
	   $("#categoria").change(function () {
	           $("#categoria option:selected").each(function () {
	            elegido=$(this).val();
	            $.post("talla.php", { elegido: elegido }, function(data){
	            $("#talla").html(data);
	            });
	        });
	   })
	});
	</script>
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

			<h2><center>Agregar articulo.</center></h2>
			<form name="req_art" class="form-horizontal" method="POST" enctype="multipart/form-data" action="guardar.php" autocomplete="off">

  			<br>


			<div class="form-group">
				<label for="referencia" class="col-sm-2 control-label">Referencia</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="referencia" name="referencia" placeholder="112233" required>
					</div>
			</div>

			<div class="form-group">
				<label for="nombre" class="col-sm-2 control-label">Nombre</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del articulo" required>
				</div>
			</div>

			<div class="form-group">
				<label for="clientela" class="col-sm-2 control-label">Clientela</label>
				<div class="col-sm-10">
					<select class="selectpicker" id="clientela" name="clientela" required>
						<option value="Dama">Dama</option>
				    	<option value="Caballero">Caballero</option>
					    	<option value="Niños">Niños</option>
				    	<option value="Bebés">Bebés</option>
				    	<option value="Hogar">Hogar</option>
							<option value="Otros">Otros</option>
					</select>
				</div>
			</div>


			<div class="form-group">
				<label for="categoria" class="col-sm-2 control-label">Categoria</label>
				<div class="col-sm-10">
					<select class="selectpicker" id="categoria" name="categoria" required>
						<option value="Ropa intima">Ropa Intima</option>
				    	<option value="Medias">Medias</option>
				    	<option value="Prendas de vestir">Prendas de Vestir</option>
				    	<option value="Pijamas">Pijamas</option>
				    	<option value="Traje de baño">Trajes de Baño</option>
					   	<option value="Accesorios">Accesorios</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="talla" class="col-sm-2 control-label">Talla</label>
				<div class="col-sm-10">
					<select class="selectpicker" id="talla" name="talla" required>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="color" class="col-sm-2 control-label">Color</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="color" name="color"required>
				</div>
			</div>

			<div class="form-group">
				<label for="color" class="col-sm-2 control-label">Marca</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="marca" name="marca"required>
				</div>
			</div>


			<div class="form-group">
				<label for="color" class="col-sm-2 control-label">Material</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="material" name="material"required>
				</div>
			</div>

			<div class="form-group">
				<label for="color" class="col-sm-2 control-label">Descripcion</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="descripcion" name="descripcion"required>
				</div>
			</div>

			<div class="form-group">
				<label for="cantidad" class="col-sm-2 control-label">Cantidad</label>
				<div class="col-sm-10">
					<p><input type="number" id="color" name="cantidad" required="required" placeholder="0">Unidades</p>
				</div>
			</div>

			<div class="form-group">
				<label for="precio" class="col-sm-2 control-label">Precio por unidad</label>
				<div class="col-sm-10">
					<p><input type="number" step="0.01" name="precio" required="required" placeholder="00,00">Bsf</p>
				</div>
			</div>

			<div class="form-group">
				<label for="archivo" class="col-sm-2 control-label">Imagen .jpeg</label>
				<div class="col-sm-10">
					<input name="archivo[]" id="archivo[]" multiple="" class="form-control" accept="image/jpg" type="file"/ required>
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
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h4>Direccion</h4>
					<p>Centro Av 7 , calle 7 y 8 local N° 7-56. Centro San Cristóbal  RIF J-31129078</p>
				</div>
				<div class="col-md-4">
					<h4>Telefono</h4>
					<p>0276-3546759</p>
				</div>
				<div class="col-md-4">
					<h4>Correo Electronico</h4>
					<a mailto="Elsurtidor@tiendas.com">ElSurtidordelaFronteraca@gmail.com</a>
				</div>
			</div>
			<br>
		</div>
	</footer>
</body>
</html>
<!--akareliz@gmail.com-->
