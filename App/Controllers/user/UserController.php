<?php
namespace App\Controllers\user;

use App\Controllers;
use App\Controllers\BaseController;


class UserController extends BaseController {

  public function getindex(){
    return $this->render('./user/index.twig');
  }
}

?>
