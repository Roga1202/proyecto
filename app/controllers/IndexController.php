<?php
namespace App\Controllers;

class IndexController extends BaseController {
  public function getIndex(){
    return $this->render('./no_users/inicio.php');
  }
}

?>
