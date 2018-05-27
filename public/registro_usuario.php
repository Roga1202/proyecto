<html>
<head>
	<title>El Surtidor</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/registro.css">
	<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/font-awesome-4.7.0\css\font-awesome.min.css">
	<script src="<?php echo BASE_URL;?>assets/js/jquery-3.2.1.js"></script>
	<script src="<?php echo BASE_URL;?>assets/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="<?php echo BASE_URL;?>assets/images/ico.png" />
</head>
<body>
	<header>
		<nav class="navbar navbar-default" role="navigation">
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-ex1-collapse">
			  <span class="sr-only">Desplegar navegación</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button>
			<div class="col-md-2 navbar-brand"><img src="images/branda.jpg"></div>
		  </div>
		  <div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
			  <li><a href="inicio.php">Inicio</a></li>
			  <li><a href="informacion.php">¿Quienes Somos?</a></li>
			  <li><a href="inscripcion.php">Articulos</a></li>
			  <li><a href="sucursales.php">Sucursales</a></li>
			  <li class="active"><a href="inicio_sesion.php">Iniciar Sesion</a></li>
			</ul>
		  </div>
		</nav>
	</header>
	<div class="container">
		<div class="row centered-form">
		<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Bienvenido Por Favor Registrese <small>It's free!</small></h3>
				</div>
				<div class="panel-body">
					<form action="../settings/sql/save_user.php" method="POST" role="form">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
								</div>
							</div>
						</div>

						<div class="row">

							<div class="col-xs-2 col-sm-2 col-md-2">
								<div class="form-group">
									<select id="nacionalidad" name="nacionalidad" required>
										<option value="V">V<option>
										<option value="E">E<option>
									</select>
								</div>
							</div>
							<div class="col-xs-10 col-sm-10 col-md-10">
								<div class="form-group">
									<input type="text" maxlength="8" name="ci" id="ci" class="form-control input-sm" placeholder="Cedula">
								</div>
							</div>
						</div>


						<div class="form-group">
							<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
						</div>

						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
								</div>
							</div>
						</div>

						<p>Pregunta de Seguridad</p>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<select id="pregunta" name="pregunta" required>
										<option value="Perro">¿Nombre de su mascosa?<option>
										<option value="Carro">¿Nombre de su auto Favorito?<option>
										<option value="Deporte">¿Nombre de su deporte Favorito?<option>
										<option value="Universidad">¿Nombre de su universidad?<option>
										<option value="Novia">¿Nombre de su primera novia?<option>
										<option value="Videojuego">¿Nombre de su videojuego favorito?<option>
									</select>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="respuesta" id="respuesta" class="form-control input-sm" placeholder="">
								</div>
							</div>
						</div>

						<p>Direccion</p>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<input type="text" name="direccion" id="direccion" class="form-control input-sm" placeholder="">
								</div>
							</div>
						</div>

						<p>Numero de Telefono</p>
						<div class="row">

							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<input type="number" maxlength="11" name="numero" id="numero" class="form-control input-sm" placeholder="0426-1234567">
								</div>
							</div>
						</div>

						<input type="submit" value="Registrese" class="btn btn-info btn-block">

					</form>
				</div>
			</div>
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
