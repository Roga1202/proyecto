<?php
namespace App\Controllers\administrador;

use app\Controllers\BaseController;

class IndexController extends BaseController {
  public function getIndex(){
    if ($_SESSION['permiso']==2) {
      return $this->render('/administrador/index.twig');
    }else{
      return $this->render('index.twig');
      header('Location:' . BASE_URL . '');
    }
  }

}
?>
