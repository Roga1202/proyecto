<?php
  require_once 'conexion.php';
  require_once '../POO/usuario.php';


  if(!empty($_POST)){
    $ID=null;
    $primernombre=$_POST['first_name'];
    $primerapellido=$_POST['last_name'];
    $nacionalidad=$_POST['nacionalidad'];
    $ci=$_POST['ci'];
    $email=$_POST['email'];
    $contrasena=$_POST['password'];
    $confirmacioncontrasena=$_POST['password_confirmation'];
    $pregunta=$_POST['pregunta'];
    $respuesta=$_POST['respuesta'];
    $direccion=$_POST['direccion'];
    $numero=$_POST['numero'];
    $inicio=date("Y-m-d H:i:s");
    $CL_ID=1;


    if($contrasena===$confirmacioncontrasena){
      $cedula= $nacionalidad .= $ci;
      $usuario= new usuario($ID,$primernombre,$primerapellido,$cedula,$email,$contrasena,$pregunta,$respuesta,$direccion,$numero,$inicio,$CL_ID);
      $usuario->uploaded();
    }
}
?>
<html>
<head>
	<title>El Surtidor</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="../<?php echo BASE_URL;?>css/bootstrap.css">
	<link rel="stylesheet" href="../<?php echo BASE_URL;?>css/registro.css">
	<link rel="stylesheet" href="../<?php echo BASE_URL;?>font-awesome-4.7.0/css/font-awesome.min.css">
	<script src="../<?php echo BASE_URL;?>js/jquery-3.2.1.js"></script>
	<script src="../<?php echo BASE_URL;?>js/bootstrap.min.js"></script>
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
			images/brand.jpg<div class="col-md-2 navbar-brand"><img src="assets/images/branda.jpg"></div>
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
        <?php if($usuario->result) { ?>
          <h3>REGISTRO GUARDADO</h3>
          <?php } else { ?>
          <h3>ERROR AL GUARDAR</h3>
        <?php } ?>

        <a href="<?php echo BASE_URL;?>administracion_articulos.php" class="btn btn-primary">Regresar</a>

      </div>
    </div>
  </div>
  <footer class="footer">
    <?php
      require_once '../<?php echo BASE_URL;?>footer.php';
    ?>
  </footer>
</body>
</html>
