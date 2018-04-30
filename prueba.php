<?php
	require 'conexion.php';

	$where="";

	$resultado = $mysqli->query($sql);
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
	<script language="JavaScript"> 
			function pregunta(){ 
			    if (confirm('¿Estas seguro de cargar este articulo?')){ 
			       document.req_art.submit() 
    } 
} 
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
		<div class="row">
  			<div class="col-md-2">
    			<div class="sidebar-nav">
    				<div class="navbar navbar-default" role="navigation">
       					 <div class="navbar-header">
         					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
           						<span class="sr-only">Toggle navigation</span>
				            	<span class="icon-bar"></span>
				          	  	<span class="icon-bar"></span>
				           	 	<span class="icon-bar"></span>
          					</button>
          					<span class="visible-xs navbar-brand">Sidebar menu</span>
        				</div>
        				<div class="navbar-collapse collapse sidebar-navbar-collapse">
	        				<ul class="nav navbar-nav">
	        					<li class="active"><a href="">Agregar</a></li>
	            				<li><a href="eliminar.php">Eliminar</a></li>
	         				 </ul>
         				</div><!--/.nav-collapse -->
         			</div>
         		</div>
  			</div>
  			<iv class="col-md-10">
  				<h2><center>Agregar articulo.</center></h2>
  				<form name="req_art" class="form-horizontal" method="POST" action="guardar.php" autocomplete="off">

  					<div class="form-group">
  						<label for="ref" class="col-sm-2 control-label">Referencia</label>
  						<div class="col-sm-10">
						<input type="text" class="form-control" id="ref" name="ref" placeholder="JR#00000" required>
						</div>
					</div>

					<div class="form-group">
						<label for="nom_art" class="col-sm-2 control-label">Nombre</label>
						<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nom_art" placeholder="Nombre del articulo" required>
						</div>
					</div>
				
					<div class="form-group">
						<label for="sucursal" class="col-sm-2 control-label">Sucursales</label>
						<div class="col-sm-10">
							<select class="selectpicker" id="sucursal" name="sucursal[]" multiple required>
								<option value="El Surtidor,Centro">El Surtidor,Centro</option>
								<option value="Surtisandalias,Centro">Surtisandalias,Centro</option>
								<option value="Surtiblumer,Centro">Surtiblumer,Centro</option>
								<option value="El Surtidor,Tariba">El Surtidor,Tariba</option>
							</select>	
						</div>
					</div>
					<div class="form-group">
						<label for="user" class="col-sm-2 control-label">Clientela</label>
						<div class="col-sm-10">
							<select class="selectpicker" id="clientela" name="user" required>
								<option value="Dama">Dama</option>
						    	<option value="Caballero">Caballero</option>
						    	<option value="Ninos">Niños</option>
							</select>	
						</div>
					</div>
					<div class="form-group">
						<label for="cat" class="col-sm-2 control-label">Categoria</label>
						<div class="col-sm-10">
							<select class="selectpicker" id="cat" name="cat" required>
								<option value="op1">Opcion 1</option>
						    	<option value="op2">Opcion 2</option>
						    	<option value="op3">Opcion 3</option>
						    	<option value="op4">Opcion 4</option>
							</select>	
						</div>
					</div>
					<div class="form-group">
						<label for="precio" class="col-sm-2 control-label">Precio</label>
						<div class="col-sm-10">
							<p><input type="number" name="precio" required="required" placeholder="00,00">Bsf</p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<a href="administracion_articulos.php" class="btn btn-default">Regresar</a>
							<button type="submit" class="btn btn-primary" onclick="pregunta()" >Guardar</button>
						</div>
					</div>
				</form>
			</div>
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
