<?php
	require 'conexion.php';
	
	$ref= $_GET['ref'];
	
	$sql = "SELECT * FROM articulo WHERE ref= '$ref'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
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

	<script type="text/javascript">
			$(document).ready(function() {
				$('.delete').click(function(){
					var parent = $(this).parent().attr('ref');
					var service = $(this).parent().attr('data');
					var dataString = 'ref='+service;
					
					$.ajax({
						type: "POST",
						url: "del_file.php",
						data: dataString,
						success: function() {			
							location.reload();
						}
					});
				});                 
			});    
		</script>
		
	<script language="JavaScript"> 
			function pregunta(){ 
			    if (confirm('¿Estas seguro de modificar este articulo?')){ 
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
  			<div class="col-md-12">
  				<h2><center>Modificar Articulo</center></h2>
  				<form name="req_art" class="form-horizontal" method="POST" enctype="multipart/form-data" action="actualizacion_articulo.php" autocomplete="off">

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


				<div class="form-group">
					<label for="ref" class="col-sm-2 control-label">Referencia</label>
					<div class="col-sm-10">
						<p><?php echo "$ref"?></p>
					</div>
				</div>

				<input type="hidden" id="ref" name="ref" value="<?php echo $row['ref']; ?>"/>
							
				<div class="form-group">
					<label for="nom_art" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" id="nombre" name="nom_art" placeholder="Nombre del articulo" value="<?php echo $row['nom_art']; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="sucursal" class="col-sm-2 control-label">Sucursales</label>
					<div class="col-sm-10">
						<select class="selectpicker" id="sucursal" name="sucursal[]" multiple required>
							<option value="El Surtidor,Centro" <?php if(strpos($row['sucursal'], "El Surtidor,Centro")!== false) echo 'selected'; ?>>El Surtidor,Centro</option>
							<option value="Surtisandalias,Centro" <?php if(strpos($row['sucursal'], "Surtisandalias,Centro")!== false) echo 'selected'; ?>>Surtisandalias,Centro</option>
							<option value="Surtiblumer,Centro" <?php if(strpos($row['sucursal'], "Surtiblumer,Centro")!== false) echo 'selected'; ?>>Surtiblumer,Centro</option>
							<option value="El Surtidor,Tariba" <?php if(strpos($row['sucursal'], "El Surtidor,Tariba")!== false) echo 'selected'; ?>>El Surtidor,Tariba</option>
						</select>	
					</div>
				</div>

				<div class="form-group">
					<label for="user" class="col-sm-2 control-label">Clientela</label>
					<div class="col-sm-10">
						<select class="selectpicker" id="clientela" name="user" required>
							<option value="Dama" <?php if($row['user']=='Dama') echo 'selected'; ?>>Dama</option>
					    	<option value="Caballero" <?php if($row['user']=='Caballero') echo 'selected'; ?>>Caballero</option>
					    	<option value="Niños" <?php if($row['user']=='Niños') echo 'selected'; ?>>Niños</option>
					    	<option value="Niños" <?php if($row['user']=='Bebés') echo 'selected'; ?>>Bebés</option>
					    	<option value="Niños" <?php if($row['user']=='Hogar') echo 'selected'; ?>>Hogar</option>
						</select>	
					</div>
				</div>

				<div class="form-group">
					<label for="cat" class="col-sm-2 control-label">Categoria</label>
					<div class="col-sm-10">
						<select class="selectpicker" id="cat" name="cat" required>
							<option value="Ropa intima" <?php if($row['cat']=='ropa intima') echo 'selected'; ?>>Ropa Intima</option>
					    	<option value="Medias" <?php if($row['user']=='Medias') echo 'selected'; ?>>Medias</option>
					    	<option value="Prendas de vestir" <?php if($row['user']=='Prendas de vestir') echo 'selected'; ?>>Prendas de Vestir</option>
					    	<option value="Pijamas" <?php if($row['user']=='Pijamas') echo 'selected'; ?>>Pijamas</option>
					    	<option value="Traje de baño" <?php if($row['user']=='Traje de baño') echo 'selected'; ?>>Trajes de Baño</option>
					    	<option value="Accesorios" <?php if($row['user']=='Accesorios') echo 'selected'; ?>>Accesorios</option>
						</select>	
					</div>
				</div>

				<div class="form-group">
					<label for="precio" class="col-sm-2 control-label">Precio</label>
					<div class="col-sm-10">
						<p><input type="number" name="precio" required="required" placeholder="00,00" value="<?php echo $row['precio']; ?>">Bsf</p>
					</div>
				</div>

				<div class="form-group">
					<label for="cantidad" class="col-sm-2 control-label">Cantidad</label>
					<div class="col-sm-10">
						<p><input type="number" name="cant" required="required" placeholder="0" value="<?php echo $row['cant']; ?>">Unidades</p>
					</div>
				</div>

				<div class="form-group">
					<label for="archivo" class="col-sm-2 control-label">Imagen .jpeg</label>
					<div class="col-sm-10">
						<input name="archivo[]" id="archivo[]" multiple="" class="form-control" accept="image/jpg" type="file"/ required>

						<?php 
						$path = "files/".$ref;
						if(file_exists($path)){
							$directorio = opendir($path);
							while ($archivo = readdir($directorio))
							{
								if (!is_dir($archivo)){
									echo "<div data='".$path."/".$archivo."'><a href='".$path."/".$archivo."' title='Ver Archivo Adjunto'><span class='glyphicon glyphicon-picture'></span></a>";
									echo "$archivo <a href='#' class='delete' title='Ver Archivo Adjunto' ><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>";
									echo "<img src='files/$ref/$archivo' width='300' />";
								}
							}
						}
						
						?>
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
