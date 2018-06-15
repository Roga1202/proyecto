<?php
namespace App\Controllers\administrador\articulos;

use App\Controllers\BaseController;
use App\Model\Producto;

class ArticuloController extends BaseController {
  //index
  public function getindex(){
    $producto= App\Model\Producto::all();
    return $this>render('/administrador/administracion_articulos.twig');
  }

  //agregar articulo formulario
  public function getagregar_articulo(){
    return render('../administrador/agregar_articulo.php');
  }

  //envio articulo formulario
  public function postguardado_articulo(){
    require_once '../settings/sql/conexion.php';
    require_once '../public/assets/POO/producto.php';

    if(!empty($_POST)){
      $ID= null;
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
      $inicio=date("Ymd H:i:s");
      $usuario=1;

      require_once "../settings/script/arraytalla.php";
      require_once "../settings/script/arrayfoto.php";

      $producto= new Producto($ID,$referencia,$usuario,$inicio,$nombre,$clientela,$categoria,$arraytalla,$color,$marca,$material,$descripcion,$cantidad,$precio,$arrayfoto);
      $producto>uploaded();

    }
      return render('../settings/sql/save.php',['referencia'=> $referencia , 'nombre' => $nombre, 'clientela'=> $clientela , 'categgoia'=> $categoria , 'talla' => $talla , 'foto' => $foto , 'color' => $color , 'marca' => $marca , 'material' => $material , 'descripcion' => $descripcion, 'cantidad'=> $cantidad , 'precio'=> $precio , 'inicio' => $inicio , 'usuario' => $usuario, 'result' => $producto>result]);
  }

  //modificar articulo formulario
  public function getmodificar(){
    return render('../administrador/agregar_sucursal.php');
  }

  //enviar cambio articulo
  public function postresultado_modificar(){
    return render('../settings/sql/update.php');
  }

  //agregar sucursal formulario
  public function getagregar_sucursal(){
    return render('../administrador/agregar_sucursal.php');
  }

// ver historial
  public function gethistorial(){
    return render('../administrador/historial.php');
  }

//ver movimiento del historial
  public function getver_historial(){
    return render('../administrador/agregar_sucursal.php');
  }

}

?>
