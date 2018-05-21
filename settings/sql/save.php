	<?php
		require_once '../settings/sql/conexion.php';
		require_once '../settings/POO/producto.php';


		if(!empty($_POST)){
			$ID= null;
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

			require_once "../settings/script/arraytalla.php";
			require_once "../settings/script/arrayfoto.php";

			$producto= new Producto($ID,$referencia,$usuario,$inicio,$nombre,$clientela,$categoria,$arraytalla,$color,$marca,$material,$descripcion,$cantidad,$precio,$arrayfoto);
			$producto->uploaded();
	}
?>
<html>
<head>
	<title>El Surtidor-Administracion de articulos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="../public/css/bootstrap.css">
	<link rel="stylesheet" href="../public/font-awesome-4.7.0/css/font-awesome.min.css">
	<link href="../public/css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="../public/js/jquery-3.1.1.min.js"></script>
	<script src="../public/js/jquery.dataTables.min.js"></script>
	<script src="../public/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="../public/images/ico.png">
	<script language="javascript" src="../public/js/jquery-1.2.6.min.js"></script>
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

					<a href="./index.php?route=/admin/articulo/administrar" class="btn btn-primary">Regresar</a>

				</div>
			</div>
		</div>
	</body>
</html>
