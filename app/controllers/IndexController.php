<?php
namespace App\Controllers;

use App\Models\Users;
use \Sirius\Validation\Validator;

class IndexController extends BaseController {

  public function getIndex(){
    if (isset($_SESSION['userId'])) {
      $userId= $_SESSION['userId'];
      $user=Users::query()->where('CLWEB_ID', '=', $userId)->first();
      if($user){
        return $this->render('user/index.twig',['user' => $user]);
        header('Location:' . BASE_URL . '/');
      }
    }else{
      $this->render('index.twig');
    }
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

  public function getiniciar_sesion(){
    return $this->render('inicio_sesion.twig');
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

        $user->CLWEB_CI=$cedula;
        $user->CLWEB_correo=$email;
        $user->CLWEB_contrasena=password_hash($password, PASSWORD_DEFAULT);
        $user->CLWEB_direccion=$direccion;
        $user->CLWEB_telefono=$numero;
        $user->CLWEB_primernombre=$primer_nombre;
        $user->CLWEB_primerapellido=$apellido;
        $user->CLWEB_pregunta=$pregunta;
        $user->CLWEB_respuesta=$respuesta;


        // $user= new \App\Models\Users([
        //
        //   'CLWEB_CI'=>$cedula,
        //   'CLWEB_correo'=> $email,
        //   'CLWEB_contrasena'=> $password,
        //   'CLWEB_direccion'=> $direccion,
        //   'CLWEB_telefono'=> $numero,
        //   'CLWEB_primernombre'=> $primer_nombre,
        //   'CLWEB_primerapellido'=> $apellido,
        //   'CLWEB_pregunta'=> $pregunta,
        //   'CLWEB_respuesta'=> $respuesta,
        // ]);
        $user->save();
        $result=true;
      }
        else{
          $errors= "Las contrasenas no coinciden";
        }
    } else{
      $errors= $validator->getmessages();
    }
      var_dump($errors);
    return $this->render('registro_usuario.twig',[
      'result' => $result,
      'errors' => $errors,
    ]);
  }

  public function getCatalogo(){
    return $this->render('/catalogo.twig');
  }


}

?>
