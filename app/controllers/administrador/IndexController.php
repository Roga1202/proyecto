<?php
namespace App\Controllers\administrador;

use app\Controllers\BaseController;

class IndexController extends BaseController {
  public function getIndex(){
    return $this->render('/administrador/index.twig');
  }

}
?>
