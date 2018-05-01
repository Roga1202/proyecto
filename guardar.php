	<?php
		require_once 'conexion.php';

		if(!empty($_POST)){
			$PR_referencia=$_POST['referencia'];
			$PR_nombre=$_POST['nombre'];
			$PR_clientela=$_POST['clientela'];
			$PR_categoria=$_POST['categoria'];
			$PR_talla=$_POST['talla'];
			$PR_color=$_POST['color'];
			$PR_marca=$_POST['marca'];
			$PR_material=$_POST['material'];
			$PR_descripcion=$_POST['descripcion'];
			$PR_cantidad=$_POST['cantidad'];
			$PR_precio=$_POST['precio'];
			$PR_inicio=date("Y-m-d H:i:s");
			$PR_usuario='root';

			$sql = "INSERT INTO producto (PR_referencia, PR_usuario, PR_inicio, PR_nombre, PR_clientela, PR_categoria, PR_talla, PR_color, PR_Marca, PR_material, PR_descripcion, PR_cantidad, PR_precio) VALUES (:PR_referencia, :PR_usuario, :PR_inicio, :PR_nombre,:PR_clientela, :PR_categoria, :PR_talla, :PR_color, :PR_marca, :PR_material, :PR_descripcion, :PR_cantidad, :$PR_precio)";
			$query = $pdo->prepare($sql);

			$query->bindParam(':PR_referencia',$PR_referencia);
			$query->bindParam(':PR_usuario',$PR_usuario);
			$query->bindParam(':PR_inicio',$PR_inicio);
			$query->bindParam(':PR_nombre',$PR_nombre);
			$query->bindParam(':PR_clientela',$PR_clientela);
			$query->bindParam(':PR_categoria',$PR_categoria);
			$query->bindParam(':PR_talla',$PR_talla);
			$query->bindParam(':PR_color',$PR_color);
			$query->bindParam(':PR_marca',$PR_marca);
			$query->bindParam(':PR_material',$PR_material);
			$query->bindParam(':PR_descripcion',$PR_descripcion);
			$query->bindParam(':PR_cantidad',$PR_cantidad);
			$query->bindParam(':PR_precio',$PR_precio);

			var_dump($PR_precio);

			$result = $query->execute();

		//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
		foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
		{
			//Validamos que el archivo exista
			if($_FILES["archivo"]["name"][$key]) {
				$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
				$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo

				$directorio = 'files/'.$PR_referencia.'/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

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
					<?php if($result) { ?>
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>

					<a href="administracion_articulos.php" class="btn btn-primary">Regresar</a>

				</div>
			</div>
		</div>
	</body>
</html>
