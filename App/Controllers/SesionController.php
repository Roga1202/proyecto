<?php

namespace App\Controllers;

use Sirius\Validation\Validator;
use  App\Models\Users;

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
            var_dump($user);

            if($user){
                if (password_verify($_POST['password'], $user->CLWEB_contrasena)) {
                    $_SESSION['userId']=$user->CLWEB_ID;
                    var_dump($_SESSION['userId']);
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
    unset($_SESSION['userid']);
    header('Location:' . BASE_URL . '');
  }

}
