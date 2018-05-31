<html lang="es">
	<head>
		<title>El Surtidor-Administracion de articulos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/font-awesome-4.7.0/css/font-awesome.min.css">
		<link href="<?php echo BASE_URL;?>assets/css/jquery.dataTables.min.css" rel="stylesheet">
		<script src="<?php echo BASE_URL;?>assets/js/jquery-3.1.1.min.js"></script>
		<script src="<?php echo BASE_URL;?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo BASE_URL;?>assets/js/bootstrap.min.js"></script>
		<link rel="shortcut icon" href="<?php echo BASE_URL;?>assets//images/ico.png">
		<script>
			$(document).ready(function(){
				$('#mitabla').DataTable({
					"order": [[1, "asc"]],
					"language":{
					"lengthMenu": "Mostrar _MENU_ registros por pagina",
					"info": "Mostrando pagina _PAGE_ de _PAGES_",
						"infoEmpty": "No hay registros disponibles",
						"infoFiltered": "(filtrada de _MAX_ registros)",
						"loadingRecords": "Cargando...",
						"processing":     "Procesando...",
						"search": "Buscar:",
						"zeroRecords":    "No se encontraron registros coincidentes",
						"paginate": {
							"next":       "Siguiente",
							"previous":   "Anterior"
						},
					},
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "../settings/script/server_process.php"
				});
			});
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
			  <li><a href="./">Inicio</a></li>
			  <li><a href="./informacion">¿Quienes Somos?</a></li>
			  <li><a href="./inscripcion">Articulos</a></li>
			  <li><a href="./sucursales">Sucursales</a></li>
			  <li><a href="./inicio_sesion">Iniciar Sesion</a></li>
			   <li class="active" id="articulo"><a href="administracion_articulos.php">Administracion</a></li>
			</ul>
		  </div>
		</nav>
	</header>
	<div class="container">
		<div class="row">
  			<div class="col-md-12">
				<h2 style="text-align:center">Articulos de El Surtidor de la frontera C.A</h2>
			</div>

  		</div>

  		<div class="row" style="margin-left: 5%;">
  			<div class="col-md-12">
  				<a href="" class="btn btn-info btn-lg">
		        	<span class="glyphicon glyphicon-cog"></span> Administar
		        </a>
		        <a href="./admin/articulos/agregar" class="btn btn-info btn-lg">
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

  		<br>

		<div class="row table-responsive">
			<div class="col-md-12">
				<table class="display" id="mitabla">
					<thead>
						<tr>
							<th>ID</th>
							<th>Referencia</th>
							<th>Nombre</th>
							<th>Clientela</th>
							<th>Categoria</th>
							<th>Precio</th>
							<th>Cantidad</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
				</table>

				<!-- Modal -->
				<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">

							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
							</div>

							<div class="modal-body">
								¿Desea eliminar este registro?
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<a class="btn btn-danger btn-ok">Delete</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
	<footer class="footer">
		<<?php
	 		require_once '<?php echo BASE_URL;?>footer.php';
		 ?>
	</footer>
</body>
</html>
<!--akareliz@gmail.com-->
