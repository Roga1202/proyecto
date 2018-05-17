<?php
	require 'conexion.php';

	$referencia=$_GET['referencia'];

	$sql = "DELETE FROM producto WHERE PR_referencia= '$referencia'";
	$query=$pdo->prepare($sql);
	$resultado=$query->execute([
	':PR_referencia'=>$referencia,
	]);


	eliminarDir('../../archivos/files/'.$referencia);

	function eliminarDir($carpeta)
	{
		foreach(glob($carpeta . "/*") as $archivos_carpeta)
		{
			if (is_dir($archivos_carpeta))
			{
				eliminarDir($archivos_carpeta);
			}
			else
			{
				unlink($archivos_carpeta);
			}
		}
		rmdir($carpeta);
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
					<?php if($resultado) { ?>
						<h3>REGISTRO ELIMINADO</h3>
						<?php } else { ?>
						<h3>ERROR AL ELIMINAR</h3>
					<?php } ?>

					<a href="../public/administracion_articulos.php" class="btn btn-primary">Regresar</a>

				</div>
			</div>
		</div>
		<footer class="footer">
			<?php
				require_once '../../public/footer.php';
			?>
		</footer>
	</body>
</html>
