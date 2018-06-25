<?php
namespace App\Controllers\user;

use App\Controllers;
use App\Models\Users;
use App\Controllers\BaseController;
use \Sirius\Validation\Validator;

class UserController extends BaseController {

  public function getindex(){
    return $this->render('./user/index.twig');
  }

  public function getperfil(){
    if (isset($_SESSION['userId'])) {
      $userId= $_SESSION['userId'];
      $user= \App\Models\Users::query()->where('CLWEB_ID', '=', $userId)->first();
      if($user){
        return $this->render('user/perfil.twig',['user' => $user]);
        header('Location:' . BASE_URL . 'user');
      }
    }else{
      return $this->render('index.twig');
    }
  }

  public function postperfil(){
      $userId= $_SESSION['userId'];
      $error= false;
      $errors= [];
      $result= false;
      $confirmacion=false;
      $validator= new Validator();
      $validator->add(
        array(
          'ID'=>'Required | Integer',
          'first_name'=>'Required | AlphaNumeric | MaxLength(20)',
          'others_names'=>' AlphaNumeric | MaxLength(20)',
          'last_name'=> 'Required | AlphaNumHyphen | MaxLength(20)',
          'other_surnames'=> ' AlphaNumHyphen | MaxLength(20)',
          'cedula'=> 'Required | AlphaNumeric | MaxLength(9)',
          'email'=> 'Required | email | MaxLength(30)',//VALIDACION PENDIENTE
          'password'=> 'AlphaNumHyphen | MaxLength(20)',
          'password_confirmation'=> 'AlphaNumHyphen |  MaxLength(20)',
          'pregunta'=> 'Required | AlphaNumeric |  MaxLength(30)',
          'respuesta'=> 'Required | AlphaNumHyphen |  MaxLength(60)',
          'direccion'=> 'Required | AlphaNumHyphen |  MaxLength(500)',//VALIDACION PENDIENTE
          'numero'=> 'Required | Integer',
        )
      );

      $user= \App\Models\Users::query()->where('CLWEB_ID', '=', $userId)->first();

      if($_POST['ID'] == $user->CLWEB_ID and $_POST['cedula'] == $user->CLWEB_CI){
        $confirmacion= true;
      }


      if ($validator->validate($_POST) and $confirmacion) {
        $ID=$_POST['ID'];
        $cedula= $_POST['cedula'];
        $primer_nombre=$_POST['first_name'];
        $segundo_nombres=$_POST['others_names'];
        $apellido=$_POST['last_name'];
        $otros_apellidos=$_POST['other_surnames'];

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


          $user= Users::query()->where('CLWEB_ID', $ID)->update([
              'CLWEB_correo'=> $email,
              'CLWEB_contrasena'=> $password,
              'CLWEB_direccion'=> $direccion,
              'CLWEB_telefono'=> $numero,
              'CLWEB_primernombre'=> $primer_nombre,
              'CLWEB_otronombre'=> $segundo_nombres,
              'CLWEB_primerapellido'=> $apellido,
              'CLWEB_segundoapellido'=> $otros_apellidos,
              'CLWEB_pregunta'=> $pregunta,
              'CLWEB_respuesta'=> $respuesta,
            ]);
          $result=true;
          $user=Users::query()->where('CLWEB_ID', '=', $userId)->first();
        }
          else{
            $error= "Las contrasenas no coinciden";
          }
      } else{
        $errors= $validator->getmessages();
      }
      return $this->render('user/perfil.twig',[
        'result' => $result,
        'errors' => $errors,
        'error' => $error,
        'user' => $user,
      ]);
  }


}

?>
