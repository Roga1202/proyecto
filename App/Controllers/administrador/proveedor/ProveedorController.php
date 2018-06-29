<?php
namespace App\Controllers\administrador\proveedor;

use App\Controllers\BaseController;
use App\Models;
use Sirius\Validation\Validator;

class ProveedorController extends BaseController {
  //index
  public function getindex(){
    $adminId= $_SESSION['userId'];
    $admin= \App\Models\Administrador::query()->where('AD_ID', '=', $adminId)->first();
    return $this->render('/administrador/proveedores/administracion_proveedores.twig',[ 'admin' => $admin]);
  }

  //agregar articulo formulario
  public function getagregar(){
    $adminId= $_SESSION['userId'];
    $admin= \App\Models\Administrador::query()->where('AD_ID', '=', $adminId)->first();
    return $this->render('/administrador/proveedores/agregar_proveedores.twig',[ 'admin'=> $admin]);
  }

  //envio articulo formulario
  public function postguardado(){
    $errors= [];
    $result= false;
    $validator= new \Sirius\Validation\Validator();

    $validator->add(
      array(
        'fiscal'=>'Required | Integer',
        'first_name'=> 'Required | AlphaNumHyphen |  MaxLength(20)',
        'others_names'=> 'Required | AlphaNumeric | MaxLength(20)',//VALIDACION PENDIENTE
        'last_name'=> 'Required | AlphaNumeric | MaxLength(20)',//VALIDACION PENDIENTE
        'other_surnames'=> 'Required | AlphaNumeric | MaxLength(20)',//VALIDACION PENDIENTE
        'correo'=> 'Required | email',//VALIDACION PENDIENTE
        'numero'=> 'Integer',//VALIDACION PENDIENTE
        'Productos'=> 'Required | AlphaNumeric',
      )
    );


    if ($validator->validate($_POST)) {
      $ID= null;
      $RM=$_POST['fiscal'];
      $primernombre=$_POST['first_name'];
      $otrosnombres=$_POST['others_names'];
      $primeapellido=$_POST['last_name'];
      $otrosapellidos= $_POST['other_surnames'];
      $correo=$_POST['correo'];
      $numero=$_POST['numero'];
      $producto=$_POST['Productos'];
      $usuario=$_SESSION['userId'];



      $proveedor= new \App\Models\Proveedor([

        'PRV_RM'=>$RM,
        'PRV_primernombre'=> $primernombre,
        'PRV_otronombre'=> $otrosnombres,
        'PRV_primerapellido'=> $primeapellido,
        'PRV_segundoapellido'=> $otrosapellidos,
        'PRV_correo'=> $correo,
        'PRV_telefono'=> $numero,
        'PRV_producto'=> $producto,
        'AD_ID'=> $usuario,
      ]);
      $proveedor->save();
      $result=true;
    } else{
      $errors= $validator->getmessages();
    }

      return $this->render('administrador/proveedores/agregar_proveedores.twig',[
        'result' => $result,
        'errors' => $errors,
      ]);
  }


  public function geteliminar($referencia){
      $ID=$referencia;
      $proveedor= \App\Models\Proveedor::query()->where('PRV_ID', $ID)->delete();

    return $this->render('/administrador/proveedor/administracion_proveedor.twig');
  }

  public function getmodificacion($ID){

    $adminId= $_SESSION['userId'];
    $admin= \App\Models\Administrador::query()->where('AD_ID', '=', $adminId)->first();
    $path ="assets/archivos/files/".$ID;
    $proveedor= \App\Models\Proveedor::query()->where('PRV_ID', '=', $ID)->first();
    return $this->render('/administrador/proveedores/modificar_proveedor.twig',[
      'ID' => $ID,
      'proveedor' => $proveedor,
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
        'fiscal'=>'Required | Integer',
        'first_name'=> 'Required | AlphaNumHyphen |  MaxLength(20)',
        'others_names'=> 'Required | AlphaNumeric | MaxLength(20)',//VALIDACION PENDIENTE
        'last_name'=> 'Required | AlphaNumeric | MaxLength(20)',//VALIDACION PENDIENTE
        'other_surnames'=> 'Required | AlphaNumeric | MaxLength(20)',//VALIDACION PENDIENTE
        'correo'=> 'Required | email',//VALIDACION PENDIENTE
        'numero'=> 'Integer',//VALIDACION PENDIENTE
        'Productos'=> 'Required | AlphaNumeric',
    ));

    $proveedor= \App\Models\Proveedor::query()->where('PRV_ID', '=', $ID)->first();

    if($_POST['ID'] == $proveedor->PRV_ID){
      $confirmacion= true;
    }


    if ($validator->validate($_POST) and $confirmacion) {
      $RM=$_POST['fiscal'];
      $primernombre=$_POST['first_name'];
      $otrosnombres=$_POST['others_names'];
      $primeapellido=$_POST['last_name'];
      $otrosapellidos= $_POST['other_surnames'];
      $correo=$_POST['correo'];
      $numero=$_POST['numero'];
      $producto=$_POST['Productos'];
      $usuario=$_SESSION['userId'];

      $proveedor= new \App\Models\Proveedor();

        $proveedor= \App\Models\Proveedor::query()->where('PRV_ID', $ID)->update([
          'PRV_RM'=>$RM,
          'PRV_primernombre'=> $primernombre,
          'PRV_otronombre'=> $otrosnombres,
          'PRV_primerapellido'=> $primeapellido,
          'PRV_segundoapellido'=> $otrosapellidos,
          'PRV_correo'=> $correo,
          'PRV_telefono'=> $numero,
          'PRV_producto'=> $producto,
          'AD_ID'=> $usuario,
          ]);
        $result=true;
    } else{
      $errors= $validator->getmessages();
    }


    $proveedor= \App\Models\Proveedor::query()->where('PRV_ID', '=', $ID)->first();

    return $this->render('/administrador/proveedores/modificar_proveedor.twig',[
      'result' => $result,
      'errors' => $errors,
      'proveedor' => $proveedor,
    ]);

}

}

?>
