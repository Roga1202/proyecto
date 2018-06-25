<?php

namespace App\Controllers;

use Sirius\Validation\Validator;
use  App\Models\Users;
use  App\Models\Administrador;


class SesionController extends BaseController {

  public function getLogin(){
    return $this->render('login.twig');
  }

  public function postLogin(){
    $validator= new Validator();

    $validator->add( array(
      'correo' => 'Required  | email | MaxLength(30)',
      'password' => 'Required | AlphaNumHyphen | MaxLength(20)',
    ));
    if ($validator->validate($_POST)) {
            $user= Users::where('CLWEB_correo', $_POST['correo'])->first();
            if($user){
                if (password_verify($_POST['password'], $user->CLWEB_contrasena)) {
                  $_SESSION['userId']=$user->CLWEB_ID;
                  $_SESSION['permiso']=2;
                    return $this->render('user/index.twig',['user' => $user]);
                    header('Location:' . BASE_URL . 'user');
                    return null;
                }
            }
      $validator->addmessage('correo', 'Usuario y/o la contrasena son incorrectas');
    }
    $errors = $validator->getMessages();
    return $this->render('login.twig',[
      'errors'=> $errors,
    ]);
  }

  public function getLogout(){
    unset($_SESSION['userId']);
    unset($user);
    header('Location:' . BASE_URL . '');
  }

  public function getadministrador(){
    return $this->render('Login_administradores.twig');
  }


  public function postadministrador(){
      // $_POST['password']="daniel1202";
      // $password=$_POST['password'];
      // $password=password_hash($password, PASSWORD_DEFAULT);
      // $user= new \App\Models\Administrador([
      //
      //   'AD_ID'=>"1",
      //   'AD_primernombre'=> "Jose",
      //   'AD_otronombre'=> "Daniel",
      //   'AD_primeapellido'=> "Urbina",
      //   'AD_segundoapellido'=> "Contreras ",
      //   'AD_correo'=> "josedurbinac@gmail.com",
      //   'AD_contrasena'=> $password,
      //   'AD_pregunta'=> "Perro",
      //   'AD_respuesta'=> "Donky",
      // ]);
      // $user->save();


    $validator= new Validator();

    $validator->add( array(
      'correo' => 'Required  | email | MaxLength(30)',
      'password' => 'Required | AlphaNumHyphen | MaxLength(20)',
    ));

    if ($validator->validate($_POST)) {
            $admin= Administrador::where('AD_correo', $_POST['correo'])->first();
            if($admin){
                if (password_verify($_POST['password'], $admin->AD_contrasena)) {

                    $_SESSION['userId']=$admin->AD_ID;
                    $_SESSION['permiso']=1;
                    return $this->render('administrador/index.twig',['admin' => $admin]);
                    header('Location:' . BASE_URL . 'administrador');
                    return null;
                }
            }
      $validator->addmessage('correo', 'Usuario y/o la contrasena son incorrectas');
    }
    $errors = $validator->getMessages();
    return $this->render('Login_administradores.twig',[
      'errors'=> $errors,
    ]);
  }

}
