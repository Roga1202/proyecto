<?php
  require_once 'conexion.php';
  require_once '../POO/sucursal.php';


  if(!empty($_POST)){
    $ID=null;
    $nombre=$_POST['nombre'];
    $latitud=$_POST['latitud'];
    $longitud=$_POST['longitud'];
    $reg_mer=$_POST['reg_mer'];
    $direccion=$_POST['direccion'];
    $cupo_emp=$_POST['cupo_emp'];
    $emp=$_POST['emp'];
    $tlf=$_POST['tlf'];
    $inicio=date("Y-m-d H:i:s");
    $usuario=1;

    $sucursal= new sucursal($ID,$nombre,$latitud,$longitud,$reg_mer,$direccion,$inicio,$cupo_emp,$emp,$tlf,$usuario);
    $sucursal->uploaded();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>El Surtidor</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="../../public/css/bootstrap.css">
	<link rel="stylesheet" href="../../public/css/registro.css">
	<link rel="stylesheet" href="../../public/font-awesome-4.7.0/css/font-awesome.min.css">
	<script src="../../public/js/jquery-3.2.1.js"></script>
	<script src="../../public/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="images/ico.png" />
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
    <div class="row">
      <div class="row" style="text-align:center">
        <?php if($sucursal->result) { ?>
          <h3>REGISTRO GUARDADO</h3>
          <?php } else { ?>
          <h3>ERROR AL GUARDAR</h3>
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
