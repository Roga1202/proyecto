	<?php

		
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
