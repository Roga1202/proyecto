<?php
	require_once 'conexion.php';
	require_once '../POO/producto.php';

	if(!empty($_POST)){
		$ID=$_POST['ID'];
		$referencia=$_POST['referencia'];
		$nombre=$_POST['nombre'];
		$clientela=$_POST['clientela'];
		$categoria=$_POST['categoria'];
		// Valo de talla sin arreglar
		$talla= isset($_POST['talla']) ? $_POST['talla'] : null;
		//
		// Valo de talla sin arreglar
		$foto= isset($_FILES["archivo"]['name']) ? $_FILES["archivo"]['name'] : null;
		//
		$color=$_POST['color'];
		$marca=$_POST['marca'];
		$material=$_POST['material'];
		$descripcion=$_POST['descripcion'];
		$cantidad=$_POST['cantidad'];
		$precio=$_POST['precio'];
		$inicio=date("Y-m-d H:i:s");
		$usuario=1;


		require_once "../script/arrayfoto.php";
		require_once "../script/arraytalla.php";

		$actualizacion_producto= new producto($ID,$referencia,$usuario,$inicio,$nombre,$clientela,$categoria,$arraytalla,$color,$marca,$material,$descripcion,$cantidad,$precio,$arrayfoto);
		$actualizacion_producto->update();
		}
?>
<html>
<head>
	<title>El Surtidor</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="../<?php echo BASE_URL;?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="../<?php echo BASE_URL;?>assets/menu.css">
	<link rel="stylesheet" href="../<?php echo BASE_URL;?>assets/font-awesome-4.7.0\css\font-awesome.min.css">
	<script src="<?php echo BASE_URL;?>assets/js/jquery-3.2.1.js"></script>
	<script src="<?php echo BASE_URL;?>assets/js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo BASE_URL;?>assets/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="<?php echo BASE_URL;?>assets/images/ico.png" />
	</head>


	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($actualizacion_producto->result) { ?>
						<h3>REGISTRO MODIFICADO</h3>
						<?php } else { ?>
						<h3>ERROR AL MODIFICAR</h3>
					<?php } ?>

					<a href="../../administrador//admin/articulos/administracion_articulos" class="btn btn-primary">Regresar</a>

				</div>
			</div>
		</div>
	</body>
	<footer class="footer">
		<?php
			require_once '../<?php echo BASE_URL;?>footer.php';
		?>
	</footer>
</html>
