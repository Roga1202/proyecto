<?php

namespace App\Controllers;

use \Sirius\Validation\Validator;
use App\Models\Users;

class SesionController extends BaseController {

  public function getLogin(){
    return $this->render('login.twig');
  }

  public function postLogin(){
    $errors= [];
    $validator= new Validator();
    $validator->add( array(
      'correo' => 'Required  | MaxLength(30)',
      'password' => 'Required | AlphaNumHyphen | MaxLength(20)',
    ));


    if ($validator->validate($_POST)) {

      $user= Users::where('CLWEB_correo',$_POST['correo'])->first();
      var_dump($user);

      if ($user) {
        if (password_verify($_POST['password'], $user->CLWEB_contrasena)) {
          $_SESSION['userId']= $user->CLWEB_ID;
          header('Location:' . BASE_URL . 'administrador');
          return null;
        }
      }
      $valor=$validator->validate($_POST);


      $validator->addmessage('correo', 'Usuario y/o la contrasena son incorrectas');
      $validator->addmessage('password', 'Usuario y/o la contrasena son incorrectas');

    }
    return $this->render('login.twig',[
      'errors'=> $errors,
    ]);
  }

  public function getLogout(){
    // unset($_SESSION['CLWEB_ID']);
    // return $this->render('login.twig');
  }

}
