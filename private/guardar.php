	<?php
		require_once 'conexion.php';
		require_once 'base_de_datos/POO/producto.php';


		if(!empty($_POST)){
			$PR_ID= null;
			$PR_referencia=$_POST['referencia'];
			$PR_nombre=$_POST['nombre'];
			$PR_clientela=$_POST['clientela'];
			$PR_categoria=$_POST['categoria'];
			// Valo de talla sin arreglar
			$PR_talla= isset($_POST['talla']) ? $_POST['talla'] : null;
			//
			// Valo de talla sin arreglar
			$PR_foto= isset($_FILES["archivo"]['name']) ? $_FILES["archivo"]['name'] : null;
			//
			$PR_color=$_POST['color'];
			$PR_marca=$_POST['marca'];
			$PR_material=$_POST['material'];
			$PR_descripcion=$_POST['descripcion'];
			$PR_cantidad=$_POST['cantidad'];
			$PR_precio=$_POST['precio'];
			$PR_inicio=date("Y-m-d H:i:s");
			$PR_usuario='root';
			
			require_once "arraytalla.php";
			require_once "arrayfoto.php";

			$producto= new Producto($PR_ID,$PR_referencia,$PR_usuario,$PR_inicio,$PR_nombre,$PR_clientela,$PR_categoria,$PR_arraytalla,$PR_color,$PR_marca,$PR_material,$PR_descripcion,$PR_cantidad,$PR_precio,$PR_arrayfoto);
			$producto->uploaded();
	}
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
	<title>El Surtidor</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="images/ico.	png" />
	</head>


	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($producto->result) { ?>
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>

					<a href="../public/administracion_articulos.php" class="btn btn-primary">Regresar</a>

				</div>
			</div>
		</div>
	</body>
</html>
