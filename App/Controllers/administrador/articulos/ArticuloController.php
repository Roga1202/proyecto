<?php
namespace App\Controllers\administrador\articulos;

use App\Controllers\BaseController;
use App\Models;
use Sirius\Validation\Validator;

class ArticuloController extends BaseController {
  //index
  public function getindex(){
    $adminId= $_SESSION['userId'];
    $admin= \App\Models\Administrador::query()->where('AD_ID', '=', $adminId)->first();
    return $this->render('/administrador/articulos/administracion_articulos.twig',[ 'admin' => $admin]);
  }

  //agregar articulo formulario
  public function getagregar(){
    $adminId= $_SESSION['userId'];
    $admin= \App\Models\Administrador::query()->where('AD_ID', '=', $adminId)->first();
    $pedidos= \App\Models\Pedido::query()->orderBy('PD_ID', 'asc')->get();
    return $this->render('/administrador/articulos/agregar_articulo.twig',[
      'admin'=> $admin,
      'pedidos'=> $pedidos,
    ]);
  }

  //envio articulo formulario
  public function postguardado_articulo(){
    $errors= [];
    $result= false;
    $validator= new \Sirius\Validation\Validator();

    $validator->add(
      array(
        'referencia'=>'Required | Integer | between(0,2147483647) ',
        'pedido' => 'Required | Integer',
        'nombre'=> 'Required | AlphaNumHyphen |  MaxLength(45)',
        'clientela'=> 'Required | AlphaNumeric',//VALIDACION PENDIENTE
        'categoria'=> 'Required | AlphaNumeric |  MaxLength(20)',//VALIDACION PENDIENTE
        'talla'=> 'Required | AlphaNumeric',//VALIDACION PENDIENTE
        'foto'=> 'AlphaNumHyphen |  MaxLength(500)',//VALIDACION PENDIENTE
        'color'=> 'Required | AlphaNumeric |  MaxLength(30)',
        'marca'=> 'Required |  MaxLength(60)',
        'material'=> 'Required | AlphaNumeric |  MaxLength(45)',
        'descripcion'=> 'Required | AlphaNumHyphen |  MaxLength(45)',
        'cantidad'=> 'Required | Integer',
        'precio'=> 'Required | Number |  MaxLength(45)',
      )
    );


    if ($validator->validate($_POST)) {
      $ID= null;
      $referencia=$_POST['referencia'];
      $pedido=$_POST['pedido'];
      $nombre=$_POST['nombre'];
      $clientela=$_POST['clientela'];
      $categoria=$_POST['categoria'];
      // Valo de talla sin arreglar
      $talla= isset($_POST['talla']) ? $_POST['talla'] : null;
      $color=$_POST['color'];
      $marca=$_POST['marca'];
      $material=$_POST['material'];
      $descripcion=$_POST['descripcion'];
      $cantidad=$_POST['cantidad'];
      $precio=$_POST['precio'];
      $usuario=$_SESSION['userId'];


      require_once "assets/php/arraytalla.php";
      var_dump($pedido  );
      $producto= new \App\Models\Producto([

        'PR_referencia'=>$referencia,
        'PD_ID' =>$pedido,
        'PR_nombre'=> $nombre,
        'PR_clientela'=> $clientela,
        'PR_categoria'=> $categoria,
        'PR_talla'=> $arraytalla,
        'PR_color'=> $color,
        'PR_marca'=> $marca,
        'PR_material'=> $material,
        'PR_descripcion'=> $descripcion,
        'PR_cantidad'=> $cantidad,
        'PR_precio'=> $precio,
        'PR_foto'=> $foto,
        'AD_ID'=> $usuario,
      ]);
      $producto->save();
      $producto= \App\Models\Pedido::query()->where('PD_ID', $pedido)->update([
        'PD_estado'=> "Procesado",
        ]);
      $result=true;
    } else{
      $errors= $validator->getmessages();
    }

    if ($validator->validate($_POST)) {

      $producto= \App\Models\Producto::query()->where('PR_referencia', '=', $referencia)->first();

      foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name){
    			//Validamos que el archivo exista
    			if($_FILES["archivo"]["name"][$key]) {
    				$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
    				$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
    				$directorio = './assets/archivos/files/'. $producto->PR_ID . '/'; //Declaramos un  variable con la ruta donde guardaremos los archivos


    				//Validamos si la ruta de destino existe, en caso de no existir la creamos
    				if(!file_exists($directorio)){
    					mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
    				}

    				$dir=opendir($directorio); //Abrimos el directorio de destino
    				$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            $target_path= str_replace("///", '/', $target_path);
            $target_path= str_replace("//", '/', $target_path);


    				//Movemos y validamos que el archivo se haya cargado correctamente
    				//El primer campo es el origen y el segundo el destino
    				if(move_uploaded_file($source, $target_path)) {
    					} else {
    					echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
    				}
    				closedir($dir); //Cerramos el directorio de destino
    			}
    		}

        $producto= \App\Models\Producto::query()->where('PR_referencia', '=', $referencia)->update([
          'PR_foto'=>$target_path,
        ]);


    }

      return $this->render('administrador/articulos/agregar_articulo.twig',[
        'result' => $result,
        'errors' => $errors,
      ]);
  }





  //agregar sucursal formulario
  public function getagregar_sucursal(){
    return $this->render('../administrador/agregar_sucursal.php');
  }

// ver historial
  public function gethistorial(){
    return $this->render('../administrador/historial.php');
  }

//ver movimiento del historial
  public function getver_historial(){
    return $this->render('../administrador/agregar_sucursal.php');
  }

  public function geteliminar($referencia){
      $ID=$referencia;

      $user= \App\Models\Producto::query()->where('PR_ID', $ID)->delete();

    return $this->render('/administrador/articulos/administracion_articulos.twig');
  }

  public function getmodificacion($ID){

    $adminId= $_SESSION['userId'];
    $admin= \App\Models\Administrador::query()->where('AD_ID', '=', $adminId)->first();
    $path ="assets/archivos/files/".$ID;
    $producto= \App\Models\Producto::query()->where('PR_ID', '=', $ID)->first();
    return $this->render('/administrador/articulos/modificar_articulo.twig',[
      'ID' => $ID,
      'producto' => $producto,
      'direccion' => $path,
      'admin' => $admin,
    ]);
  }

  public function postmodificacion($ID){
    $error= false;
    $errors= [];
    $result= false;
    $confirmacion=false;
    $validator= new Validator();
    $validator->add(
      array(
        'ID'=>'Required | Integer',
        'referencia'=>'Required | Integer',
        'nombre'=>' AlphaNumeric | MaxLength(45)',
        'clientela'=> 'Required | AlphaNumeric | MaxLength(45)',
        'categoria'=> 'Required | AlphaNumeric | MaxLength(45)',
        'talla'=> 'Required | AlphaNumeric | MaxLength(10)',
        'color'=> 'Required | AlphaNumeric | MaxLength(30)',
        'marca'=> 'Required | AlphaNumHyphen | MaxLength(60)',
        'material'=> 'Required | AlphaNumHyphen |  MaxLength(20)',
        'descripcion'=> 'Required | AlphaNumeric |  MaxLength(60)',
        'cantidad'=> 'Required | Integer',
        'precio'=> 'Required ',//VALIDACION PENDIENTE
      )
    );

    $producto= \App\Models\Producto::query()->where('PR_ID', '=', $ID)->first();

    if($_POST['ID'] == $producto->PR_ID){
      $confirmacion= true;
    }


    if ($validator->validate($_POST) and $confirmacion) {
      $referencia=$_POST['referencia'];
      $nombre=$_POST['nombre'];
      $clientela=$_POST['clientela'];
      $categoria=$_POST['categoria'];
      // Valo de talla sin arreglar
      $talla= isset($_POST['talla']) ? $_POST['talla'] : null;
      //
      // Valo de talla sin arreglar
      $foto= isset($_FILES["archivo"]['name']) ? $_FILES["archivo"]['name'] : null;
      //
      $color=$_POST['color'];
      $marca=$_POST['marca'];
      $material=$_POST['material'];
      $descripcion=$_POST['descripcion'];
      $cantidad=$_POST['cantidad'];
      $precio=$_POST['precio'];
      $usuario=$_SESSION['userId'];

      require_once "assets/php/arraytalla.php";




        $producto= new \App\Models\Producto();



        $producto= \App\Models\Producto::query()->where('PR_ID', $ID)->update([
          'PR_referencia'=>$referencia,
          'PR_nombre'=> $nombre,
          'PR_clientela'=> $clientela,
          'PR_categoria'=> $categoria,
          'PR_talla'=> $arraytalla,
          'PR_color'=> $color,
          'PR_marca'=> $marca,
          'PR_material'=> $material,
          'PR_descripcion'=> $descripcion,
          'PR_cantidad'=> $cantidad,
          'PR_precio'=> $precio,
          'AD_ID'=> $usuario,
          ]);
        $result=true;
    } else{
      $errors= $validator->getmessages();
    }

    if ($validator->validate($_POST)) {

      $producto= \App\Models\Producto::query()->where('PR_referencia', '=', $referencia)->first();

      foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name){
    			//Validamos que el archivo exista
    			if($_FILES["archivo"]["name"][$key]) {
    				$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
    				$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
    				$directorio = './assets/archivos/files/'. $producto->PR_ID . '/'; //Declaramos un  variable con la ruta donde guardaremos los archivos


    				//Validamos si la ruta de destino existe, en caso de no existir la creamos
    				if(!file_exists($directorio)){
    					mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
    				}

    				$dir=opendir($directorio); //Abrimos el directorio de destino
    				$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            $target_path= str_replace("///", '/', $target_path);
            $target_path= str_replace("//", '/', $target_path);


    				//Movemos y validamos que el archivo se haya cargado correctamente
    				//El primer campo es el origen y el segundo el destino
    				if(move_uploaded_file($source, $target_path)) {
    					} else {
    					echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
    				}
    				closedir($dir); //Cerramos el directorio de destino
    			}
    		}

        $producto= \App\Models\Producto::query()->where('PR_referencia', '=', $referencia)->update([
          'PR_foto'=>$target_path,
        ]);


    }
    $producto= \App\Models\Producto::query()->where('PR_ID', '=', $ID)->first();

    return $this->render('/administrador/articulos/modificar_articulo.twig',[
      'result' => $result,
      'errors' => $errors,
      'producto' => $producto,
    ]);

}

}

?>
