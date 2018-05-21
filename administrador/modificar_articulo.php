<?php
	require '../settings/sql/conexion.php';

	$referencia= $_GET['referencia'];

	$sql = "SELECT * FROM producto WHERE PR_referencia= '$referencia'";
	$resultado = $pdo->query($sql);
	$row = $resultado->fetch(MYSQLI_ASSOC);

?>
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
	<!--combobox clientela-categoria-->
	<script language="javascript">
	$(document).ready(function(){
		 $("#clientela").change(function () {
						 $("#clientela option:selected").each(function () {
							elegido=$(this).val();
							$.post("categoria.php", { elegido: elegido }, function(data){
							$("#categoria").html(data);
							});
					});
		 })
	});
	</script>
	<!--combobox categoria-talla-->
	<script language="javascript">
	$(document).ready(function(){
		 $("#categoria").change(function () {
						 $("#categoria option:selected").each(function () {
							elegido=$(this).val();
							$.post("talla2.php", { elegido: elegido }, function(data){
							$("#talla").html(data);
							});
					});
		 })
	});
	</script>

	<script type="text/javascript">
			$(document).ready(function() {
				$('.delete').click(function(){
					var parent = $(this).parent().attr('referencia');
					var service = $(this).parent().attr('data');
					var dataString = 'referencia='+service;

					$.ajax({
						type: "POST",
						url: "../private/del_file.php",
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
			       document.actualizar_articulo.submit()
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
  				<form name="actualizar_articulo" class="form-horizontal" method="POST" enctype="multipart/form-data" action="../settings/sql/update.php" autocomplete="off">

				<div class="row" style="margin-left: 5%;">
		  			<div class="col-md-12">
		  				<a href="../public/assets/administracion_articulos.php" class="btn btn-info btn-lg">
				        	<span class="glyphicon glyphicon-cog"></span> Administar
				        </a>
				        <a href="../public/assets/agregar_articulo.php" class="btn btn-info btn-lg">
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
					<label for="id" class="col-sm-2 control-label">ID</label>
					<div class="col-sm-10">
						<p><?php echo $row['PR_ID']?></p>
						<p><input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $row['PR_ID']?>"></p>
					</div>
				</div>

				<div class="form-group">
					<label for="referencia" class="col-sm-2 control-label">Referencia</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="referencia" name="referencia" placeholder="Numero de Referencia" value="<?php echo $row['PR_referencia']; ?>" required>
						</div>
				</div>

				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del articulo" value="<?php echo $row['PR_nombre']; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="clientela" class="col-sm-2 control-label">Clientela</label>
					<div class="col-sm-10">
						<select class="selectpicker" id="clientela" name="clientela" required>
							<option value="Dama"<?php if($row['PR_clientela']=='Dama') echo 'selected'; ?>>Dama</option>
					    	<option value="Caballero"<?php if($row['PR_clientela']=='Caballero') echo 'selected'; ?>>Caballero</option>
						    	<option value="Ninos"<?php if($row['PR_clientela']=='Ninos') echo 'selected'; ?>>Niños</option>
					    	<option value="Bebes"<?php if($row['PR_clientela']=='Bebes') echo 'selected'; ?>>Bebés</option>
					    	<option value="Hogar"<?php if($row['PR_clientela']=='Hogar') echo 'selected'; ?>>Hogar</option>
								<option value="Otros"<?php if($row['PR_clientela']=='Otros') echo 'selected'; ?>>Otros</option>
						</select>
					</div>
				</div>


				<div class="form-group">
					<label for="categoria" class="col-sm-2 control-label">Categoria</label>
					<div class="col-sm-10">
						<select class="selectpicker" id="categoria" name="categoria" required>
							<option value="Ropa intima"<?php if($row['PR_categoria']=='Ropa Intima') echo 'selected'; ?>>Ropa Intima</option>
					    	<option value="Medias"<?php if($row['PR_categoria']=='Medias<') echo 'selected'; ?>>Medias</option>
								<option value="Camisa"<?php if($row['PR_categoria']=='Camisa') echo 'selected'; ?>>Camisa</option>
								<option value="Pantalon"<?php if($row['PR_categoria']=='Pantalon') echo 'selected'; ?>>Pantalon</option>
								<option value="Falda"<?php if($row['PR_categoria']=='Falda') echo 'selected'; ?>>Falda</option>
					    	<option value="Pijamas"<?php if($row['PR_categoria']=='Pijama') echo 'selected'; ?>>Pijama</option>
					    	<option value="Traje de baño"<?php if($row['PR_categoria']=='Traje de Baño') echo 'selected'; ?>>Traje de Baño</option>
						   	<option value="Accesorio"<?php if($row['PR_categoria']=='Accesorio') echo 'selected'; ?>>Accesorio</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="talla" class="col-sm-2 control-label">Talla</label>
					<div class="col-sm-10">
							<select  class="selectpicker" id="talla" name="talla[]" multiple required>
							<option value="S" <?php if(strpos($row['PR_talla'], "S")!== false) echo 'selected'; ?>>S</option>
							<option value="M" <?php if(strpos($row['PR_talla'], "M")!== false) echo 'selected'; ?>>M</option>
							<option value="L" <?php if(strpos($row['PR_talla'], "L")!== false) echo 'selected'; ?>>L</option>
							<option value="XL" <?php if(strpos($row['PR_talla'], "XL")!== false) echo 'selected'; ?>>XL</option>
							<option value="XXL" <?php if(strpos($row['PR_talla'], "XXL")!== false) echo 'selected'; ?>>XXL</option>
							<option value="3XL" <?php if(strpos($row['PR_talla'], "3XL")!== false) echo 'selected'; ?>>3XL</option>
							<option value="4XL" <?php if(strpos($row['PR_talla'], "4XL")!== false) echo 'selected'; ?>>4XL</option>
							<option value="5XL" <?php if(strpos($row['PR_talla'], "5XL")!== false) echo 'selected'; ?>>5XL</option>
							<option value="6XL" <?php if(strpos($row['PR_talla'], "6XL")!== false) echo 'selected'; ?>>6XL</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="color" name="color" placeholder="Color" value="<?php echo $row['PR_color']; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="color" class="col-sm-2 control-label">Marca</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="marca" name="marca" placeholder="Marca" value="<?php echo $row['PR_marca']; ?>" required>
					</div>
				</div>


				<div class="form-group">
					<label for="color" class="col-sm-2 control-label">Material</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="material" name="material" placeholder="Material" value="<?php echo $row['PR_material']; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="color" class="col-sm-2 control-label">Descripcion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" value="<?php echo $row['PR_descripcion']; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="cantidad" class="col-sm-2 control-label">Cantidad</label>
					<div class="col-sm-10">
						<p><input type="number" id="color" name="cantidad" required="required" placeholder="0" value="<?php echo $row['PR_cantidad']; ?>" required>Unidades</p>
					</div>
				</div>

				<div class="form-group">
					<label for="precio" class="col-sm-2 control-label">Precio por unidad</label>
					<div class="col-sm-10">
						<p><input type="number" step="0.01" name="precio" required="required" placeholder="0" value="<?php echo $row['PR_precio']; ?>" required>Unidades</p>
					</div>
				</div>


				<div class="form-group">
					<label for="archivo" class="col-sm-2 control-label">Imagen .jpeg</label>
					<div class="col-sm-10">
						<input name="archivo[]" id="archivo[]" multiple="" class="form-control" accept="image/jpg" type="file"/ required>

						<?php
						$path = "../archivos/files/".$referencia;
						if(file_exists($path)){
							$directorio = opendir($path);
							while ($archivo = readdir($directorio))
							{
								if (!is_dir($archivo)){
									echo "<div data='".$path."/".$archivo."'><a href='".$path."/".$archivo."' title='Ver Archivo Adjunto'><span class='glyphicon glyphicon-picture'></span></a>";
									echo "$archivo <a href='#' class='delete' title='Borrar Archivo Adjunto' ><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>";
									echo "<img src='../archivos/files/$referencia/$archivo' width='300' />";
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
		<?php
			require_once '../public/assets/footer.php';
		?>
	</footer>
</body>
</html>
<!--akareliz@gmail.com-->
