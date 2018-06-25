<?php
namespace App\Controllers;

use App\Models\Users;
use \Sirius\Validation\Validator;
use  App\Models\Administrador;

class IndexController extends BaseController {

  public function getIndex(){
    if (isset($_SESSION['userId']) and isset( $_SESSION['permiso'])) {
      if ($_SESSION['permiso']==2) {
        $userId= $_SESSION['userId'];
        $user= \App\Models\Users::query()->where('CLWEB_ID', '=', $userId)->first();
        if($user){
          return $this->render('user/index.twig',['user' => $user]);
          header('Location:' . BASE_URL . 'user');
        }
      }
      if ($_SESSION['permiso']==1) {
        $adminId= $_SESSION['userId'];
        $admin= \App\Models\Administrador::query()->where('AD_ID', '=', $adminId)->first();
        if($admin){
          return $this->render('administrador/index.twig',['admin' => $admin]);
          header('Location:' . BASE_URL . 'administrador');
        }
      }
    }
      return $this->render('index.twig');
      header('Location:' . BASE_URL . '');
  }

  public function getsucursales(){
    return $this->render('sucursales.twig');
  }

  public function getmostrar_sucursal(){
    return $this->render('mostrar_sucursal.twig');
  }

  public function getinformacion(){
    return $this->render('informacion.twig');
  }

  public function getRegistro_usuario(){
    return $this->render('registro_usuario.twig');
  }

  public function postRegistro_usuario(){
    $errors= [];
    $result= false;
    $validator= new Validator();
    $validator->add(
      array(
        'first_name'=>'Required | AlphaNumeric | MaxLength(20)',
        'last_name'=> 'Required | AlphaNumHyphen | MaxLength(20)',
        'nacionalidad'=> 'Required | AlphaNumeric | MaxLength(1)',
        'ci'=> 'Required | Integer | MaxLength(9)',
        'email'=> 'Required | email | MaxLength(30)',//VALIDACION PENDIENTE
        'password'=> 'AlphaNumHyphen | MaxLength(20)',
        'password_confirmation'=> 'AlphaNumHyphen |  MaxLength(20)',
        'pregunta'=> 'Required | AlphaNumeric |  MaxLength(30)',
        'respuesta'=> 'Required | AlphaNumHyphen |  MaxLength(60)',
        'direccion'=> 'Required | AlphaNumHyphen |  MaxLength(500)',//VALIDACION PENDIENTE
        'numero'=> 'Required | Integer |  MaxLength(45)',
      )
    );

    if ($validator->validate($_POST)) {

      $ID= null;
      $primer_nombre=$_POST['first_name'];
      $apellido=$_POST['last_name'];
      $nacionalidad=$_POST['nacionalidad'];
      $ci=$_POST['ci'];

      $cedula= $nacionalidad . $ci;

      $email=$_POST['email'];
      $password=$_POST['password'];
      $password_confirmation=$_POST['password_confirmation'];
      $pregunta=$_POST['pregunta'];
      $respuesta=$_POST['respuesta'];
      $direccion=$_POST['direccion'];
      $numero=$_POST['numero'];


      if($password===$password_confirmation){
        $user= new \App\Models\Users();

        //encriptacion clave
        $password=password_hash($password, PASSWORD_DEFAULT);

        $user= new \App\Models\Users([

          'CLWEB_CI'=>$cedula,
          'CLWEB_correo'=> $email,
          'CLWEB_contrasena'=> $password,
          'CLWEB_direccion'=> $direccion,
          'CLWEB_telefono'=> $numero,
          'CLWEB_primernombre'=> $primer_nombre,
          'CLWEB_primerapellido'=> $apellido,
          'CLWEB_pregunta'=> $pregunta,
          'CLWEB_respuesta'=> $respuesta,
        ]);
        $user->save();
        $result=true;

      }
        else{
          $error= "Las contrasenas no coinciden";
        }
    } else{
      $errors= $validator->getmessages();
    }
    return $this->render('registro_usuario.twig',[
      'result' => $result,
      'errors' => $errors,
      'error' => $error,
    ]);
  }

  public function getCatalogo(){
    return $this->render('/catalogo.twig');
  }


}

?>
