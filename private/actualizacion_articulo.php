<?php
	require_once '../private/conexion.php';
	require_once '../private/base_de_datos/POO/producto.php';

	if(!empty($_POST)){
		$PR_ID=$_POST['ID'];
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


		require_once "arrayfoto.php";
		require_once "arraytalla.php";

		$actualizacion_producto= new producto($PR_ID,$PR_referencia,$PR_usuario,$PR_inicio,$PR_nombre,$PR_clientela,$PR_categoria,$PR_arraytalla,$PR_color,$PR_marca,$PR_material,$PR_descripcion,$PR_cantidad,$PR_precio,$PR_arrayfoto);
		$actualizacion_producto->update();
		// $sql = "UPDATE producto SET PR_referencia='$PR_referencia', usuario='$PR_usuario',fecha=$PR_inicio ,nom_art='$PR_nombre', user='$user', cat='$cat', precio='$precio',cant='$cant' WHERE ref = '$ref'";
		// $resultado = $mysqli->query($sql);
		// $id_insert= $ref;
		}
?>

<!DOCTYPE html PUBLIC>
<html>
<head>
	<title>El Surtidor</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="../public/css/bootstrap.css">
	<link rel="stylesheet" href="../public/css/menu.css">
	<link rel="stylesheet" href="../public/font-awesome-4.7.0\css\font-awesome.min.css">
	<script src="../public/js/jquery-3.2.1.js"></script>
	<script src="../public/js/jquery-3.2.1.min.js"></script>
	<script src="../public/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="../public/images/ico.	png" />
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

					<a href="../public/administracion_articulos.php" class="btn btn-primary">Regresar</a>

				</div>
			</div>
		</div>
	</body>
	<footer class="footer">
		<?php
			require_once '../public/footer.php';
		?>
	</footer>
</html>
