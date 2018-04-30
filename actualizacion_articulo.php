<?php
	require 'conexion.php';
	
	$ref=$_POST['ref'];
	$nom_art=$_POST['nom_art'];
	$sucursal = isset($_POST['sucursal']) ? $_POST['sucursal'] : null;
	$user=$_POST['user'];
	$cat=$_POST['cat'];
	$precio=$_POST['precio'];
	$cant=$_POST['cant'];

	$arraysucursal = null;

	$num_array = count($sucursal);
	$contador = 0;
	
	if($num_array>0){
		foreach ($sucursal as $key => $value) {
			if ($contador != $num_array-1){
			$arraysucursal .= $value.' ';
			$contador++;
			} else {
			$arraysucursal .= $value;
			}
		}
	}


	$sql = "UPDATE articulo SET ref='$ref', usuario=current_user(),fecha=now() ,nom_art='$nom_art', sucursal='$arraysucursal', user='$user', cat='$cat', precio='$precio',cant='$cant' WHERE ref = '$ref'";
	$resultado = $mysqli->query($sql);
	$id_insert= $ref;

	//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = 'files/'.$id_insert.'/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {	
				echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
				} else {	
				echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos el directorio de destino
		}
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
					<?php if($resultado) { ?>
						<h3>REGISTRO MODIFICADO</h3>
						<?php } else { ?>
						<h3>ERROR AL MODIFICAR</h3>
					<?php } ?>
					
					<a href="administracion_articulos.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>