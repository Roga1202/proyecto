<?php
namespace App\Controllers\administrador\usuarios;

use App\Controllers\BaseController;
use App\Models;
use Sirius\Validation\Validator;

class UserController extends BaseController{

  //index
  public function getindex(){
    return $this->render('/administrador/usuarios/administracion_usuarios.twig');
  }

  //agregar articulo formulario
  public function getregistro(){
    return $this->render('/no_user/registro.twig');
  }

  //envio articulo formulario
  public function postguardado_articulo(){
    $errors= [];
    $result= false;
    $validator= new \Sirius\Validation\Validator();
    $validator->add(
      array(
        'referencia'=>'Required | Integer | between(0,2147483647) ',
        'nombre'=> 'Required | AlphaNumHyphen |  MaxLength(45)',
        'clientela'=> 'Required | AlphaNumeric',//VALIDACION PENDIENTE
        'categoria'=> 'Required | AlphaNumeric |  MaxLength(20)',//VALIDACION PENDIENTE
        'talla'=> 'Required | AlphaNumHyphen |  MaxLength(10)',//VALIDACION PENDIENTE
        'foto'=> 'AlphaNumHyphen |  MaxLength(500)',//VALIDACION PENDIENTE
        'color'=> 'Required | AlphaNumeric |  MaxLength(30)',
        'marca'=> 'Required | AlphaNumHyphen |  MaxLength(60)',
        'material'=> 'Required | AlphaNumeric |  MaxLength(45)',
        'descripcion'=> 'Required | AlphaNumHyphen |  MaxLength(45)',
        'cantidad'=> 'Required | Integer',
        'precio'=> 'Required | Number |  MaxLength(45)',
      )
    );

    if ($validator->validate($_POST)) {
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
      $result=true;
    } else{
      $errors= $validator->getmessages();
    }
      var_dump($errors);
      var_dump($_POST['referencia']);
      return $this->render('administrador/articulos/agregar_articulo.twig',[
        'result' => $result,
        'errors' => $errors,
      ]);
  }

}

 ?>
