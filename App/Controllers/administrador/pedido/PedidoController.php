<?php
namespace App\Controllers\administrador\pedido;

use App\Controllers\BaseController;
use App\Models;
use Sirius\Validation\Validator;

class PedidoController extends BaseController {
  //index
  public function getindex(){
    $adminId= $_SESSION['userId'];
    $admin= \App\Models\Administrador::query()->where('AD_ID', '=', $adminId)->first();
    return $this->render('/administrador/pedido/ver_pedidos.twig',[ 'admin' => $admin]);
  }

  //agregar articulo formulario
  public function getagregar(){
    $adminId= $_SESSION['userId'];
    $admin= \App\Models\Administrador::query()->where('AD_ID', '=', $adminId)->first();
    $proveedores= \App\Models\Proveedor::query()->orderBy('PRV_ID', 'asc')->get();
    return $this->render('/administrador/pedido/agregar_pedido.twig',[
      'admin'=> $admin,
      'proveedores' => $proveedores,
    ]);
  }

  //envio articulo formulario
  public function postguardado(){
    $errors= [];
    $result= false;
    $validator= new \Sirius\Validation\Validator();

    $validator->add(
      array(
        'proveedor'=>'Required | Integer',
        'nombre'=> 'Required | AlphaNumHyphen |  MaxLength(45)',
        'talla'=> 'Required | AlphaNumeric',//VALIDACION PENDIENTE
        'marca'=> 'Required |  MaxLength(60)',
        'material'=> 'Required | AlphaNumeric |  MaxLength(45)',
        'cantidad'=> 'Required | Integer',
      )
    );


    if ($validator->validate($_POST)) {
      $ID= null;
      $proveedor=$_POST['proveedor'];
      $nombre=$_POST['nombre'];
      $talla=$_POST['talla'];
      $marca=$_POST['marca'];
      $material= $_POST['material'];
      $cantidad=$_POST['cantidad'];
      $usuario=$_SESSION['userId'];



      $pedido= new \App\Models\Pedido([

        'PRV_ID'=>$proveedor,
        'PD_nombre'=> $nombre,
        'PD_talla'=> $talla,
        'PD_mmarca'=> $marca,
        'PD_material'=> $material,
        'PD_cantidad'=> $cantidad,
        'AD_ID'=> $usuario,
      ]);
      $pedido->save();
      $result=true;
    } else{
      $errors= $validator->getmessages();
    }

      return $this->render('administrador/pedido/agregar_pedido.twig',[
        'result' => $result,
        'errors' => $errors,
      ]);
  }


  public function geteliminar($referencia){
      $ID=$referencia;
      $proveedor= \App\Models\Pedido::query()->where('PD_ID', $ID)->delete();

    return $this->render('/administrador/pedido/ver_pedidos.twig');
  }


}

?>
