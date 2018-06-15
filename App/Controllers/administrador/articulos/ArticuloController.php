<?php
namespace App\Controllers\administrador\articulos;

use App\Controllers\BaseController;
use App\Models;

class ArticuloController extends BaseController {
  //index
  public function getindex(){
    return $this->render('/administrador/articulos/administracion_articulos.twig');
  }

  //agregar articulo formulario
  public function getagregar(){
    return $this->render('/administrador/articulos/agregar_articulo.twig');
  }

  //envio articulo formulario
  public function postguardado_articulo(){

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

      require_once "assets/php/arraytalla.php";
      require_once "assets/php/arrayfoto.php";

      var_dump($_POST);
      $producto= new \App\Models\Producto([

        'PR_referencia'=>$referencia,
        'PR_nombre'=> $nombre,
        'PR_clientela'=> $clientela,
        'PR_categoria'=> $categoria,
        'PR_talla'=> $talla,
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

    }
      return $this->render('administrador/articulos/resultado.twig');
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
