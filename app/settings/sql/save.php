<html>
<head>
	<title>El Surtidor-Administracion de articulos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="<?php echo BASE_URL;?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo BASE_URL;?>font-awesome-4.7.0/css/font-awesome.min.css">
	<link href="<?php echo BASE_URL;?>css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="<?php echo BASE_URL;?>js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo BASE_URL;?>js/jquery.dataTables.min.js"></script>
	<script src="<?php echo BASE_URL;?>js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="<?php echo BASE_URL;?>images/ico.png">
	<script language="javascript" src="<?php echo BASE_URL;?>js/jquery-1.2.6.min.js"></script>
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

					<a href=".//admin/articulo/administrar" class="btn btn-primary">Regresar</a>

				</div>
			</div>
		</div>
	</body>
</html>
