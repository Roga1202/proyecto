<?php
	require 'conexion.php';

	$n_mov= $_GET['n_mov'];

	$sql = "SELECT * FROM historial WHERE n_mov= '$n_mov'";
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
	<div class="container" style="margin-left: 10%">
		<div class="row">
  			<div class="col-md-12">
  				<h2><center>Vista de movimiento</center></h2>
  				<form name="req_art" class="form-horizontal" method="POST" enctype="multipart/form-data" action="" autocomplete="off">

				<div class="row" style="margin-left: 25%;">
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

		  		<div class="row">
					<label for="n_mov" class="col-sm-2 control-label">Numero de Movimieto</label>
					<div class="col-sm-4">
						<p><?php echo $row['N_MOV']; ?></p>
					</div>

					<label for="n_mov" class="col-sm-2 control-label">Tipo de Movimieto</label>
					<div class="col-sm-4">
						<p><?php echo $row['EVENTO']; ?></p>
					</div>
				</div>



				<div class="form-group">
					<label for="ref" class="col-sm-2 control-label">Referencia</label>
					<div class="col-sm-10">
						<p><?php echo $row['REF']; ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="nom_art" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<?php if($row['EVENTO']=="Agregado"){?>
						<p><?php echo $row['NUEVO_NOM_ART']; ?></p>
						<?php }?>
						<?php if($row['EVENTO']=="Eliminado"){?>
						<p><?php echo $row['VIEJO_NOM_ART']; ?></p>
						<?php }?>
						<?php if($row['EVENTO']=="Actualizacion"){?>
			  			<div class="row">
							<label for="n_mov" class="col-sm-2 control-label">Anterior</label>
							<div class="col-sm-4">
								<p><?php echo $row['VIEJO_NOM_ART']; ?></p>
							</div>

							<label for="n_mov" class="col-sm-2 control-label">Nuevo</label>
							<div class="col-sm-4">
								<p><?php echo $row['NUEVO_NOM_ART']; ?></p>
							</div>
						</div>
						<?php }?>
					</div>
				</div>

				<div class="form-group">
					<label for="sucursal" class="col-sm-2 control-label">Sucursales</label>
					<div class="col-sm-10">
						<?php if($row['EVENTO']=="Agregado"){?>
						<p><?php echo $row['NUEVO_SUCURSAL']; ?></p>
						<?php }?>
						<?php if($row['EVENTO']=="Eliminado"){?>
						<p><?php echo $row['VIEJO_SUCURSAL']; ?></p>
						<?php }?>
						<?php if($row['EVENTO']=="Actualizacion"){?>
			  			<div class="row">
							<label for="n_mov" class="col-sm-2 control-label">Anterior</label>
							<div class="col-sm-4">
								<p><?php echo $row['VIEJO_SUCURSAL']; ?></p>
							</div>

							<label for="n_mov" class="col-sm-2 control-label">Nuevo</label>
							<div class="col-sm-4">
								<p><?php echo $row['NUEVO_SUCURSAL']; ?></p>
							</div>
						</div>
						<?php }?>
					</div>
				</div>

				<div class="form-group">
					<label for="user" class="col-sm-2 control-label">Clientela</label>
					<div class="col-sm-10">
						<?php if($row['EVENTO']=="Agregado"){?>
						<p><?php echo $row['NUEVO_USER']; ?></p>
						<?php }?>
						<?php if($row['EVENTO']=="Eliminado"){?>
						<p><?php echo $row['VIEJO_USER']; ?></p>
						<?php }?>
						<?php if($row['EVENTO']=="Actualizacion"){?>
			  			<div class="row">
							<label for="n_mov" class="col-sm-2 control-label">Anterior</label>
							<div class="col-sm-4">
								<p><?php echo $row['VIEJO_USER']; ?></p>
							</div>

							<label for="n_mov" class="col-sm-2 control-label">Nuevo</label>
							<div class="col-sm-4">
								<p><?php echo $row['NUEVO_USER']; ?></p>
							</div>
						</div>
						<?php }?>
					</div>
				</div>

				<div class="form-group">
					<label for="categoria" class="col-sm-2 control-label">Categoria</label>
					<div class="col-sm-10">
						<?php if($row['EVENTO']=="Agregado"){?>
						<p><?php echo $row['NUEVO_CAT']; ?></p>
						<?php }?>
						<?php if($row['EVENTO']=="Eliminado"){?>
						<p><?php echo $row['VIEJO_CAT']; ?></p>
						<?php }?>
						<?php if($row['EVENTO']=="Actualizacion"){?>
			  			<div class="row">
							<label for="n_mov" class="col-sm-2 control-label">Anterior</label>
							<div class="col-sm-4">
								<p><?php echo $row['VIEJO_CAT']; ?></p>
							</div>

							<label for="n_mov" class="col-sm-2 control-label">Nuevo</label>
							<div class="col-sm-4">
								<p><?php echo $row['NUEVO_CAT']; ?></p>
							</div>
						</div>
						<?php }?>
					</div>
				</div>

				<div class="form-group">
					<label for="precio" class="col-sm-2 control-label">Precio</label>
					<div class="col-sm-10">
						<?php if($row['EVENTO']=="Agregado"){?>
						<p><?php echo $row['NUEVO_PRECIO']; ?></p>
						<?php }?>
						<?php if($row['EVENTO']=="Eliminado"){?>
						<p><?php echo $row['VIEJO_PRECIO']; ?></p>
						<?php }?>
						<?php if($row['EVENTO']=="Actualizacion"){?>
			  			<div class="row">
							<label for="n_mov" class="col-sm-2 control-label">Anterior</label>
							<div class="col-sm-4">
								<p><?php echo $row['VIEJO_PRECIO']; ?></p>
							</div>

							<label for="n_mov" class="col-sm-2 control-label">Nuevo</label>
							<div class="col-sm-4">
								<p><?php echo $row['NUEVO_PRECIO']; ?></p>
							</div>
						</div>
						<?php }?>
					</div>
				</div>

				<div class="form-group">
					<label for="cantidad" class="col-sm-2 control-label">Cantidad</label>
					<div class="col-sm-10">
						<?php if($row['EVENTO']=="Agregado"){?>
						<p><?php echo $row['NUEVO_CANT']; ?></p>
						<?php }?>
						<?php if($row['EVENTO']=="Eliminado"){?>
						<p><?php echo $row['VIEJO_CANT']; ?></p>
						<?php }?>
						<?php if($row['EVENTO']=="Actualizacion"){?>
			  			<div class="row">
							<label for="n_mov" class="col-sm-2 control-label">Anterior</label>
							<div class="col-sm-4">
								<p><?php echo $row['VIEJO_CANT']; ?></p>
							</div>

							<label for="n_mov" class="col-sm-2 control-label">Nuevo</label>
							<div class="col-sm-4">
								<p><?php echo $row['NUEVO_PRECIO']; ?></p>
							</div>
						</div>
						<?php }?>
					</div>
				</div>

				<!--<div class="form-group">
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
				</div>-->

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="historial.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Imprimir</button>
					</div>
				</div>
				</form>
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
<!--akareliz@gmail.com-->
