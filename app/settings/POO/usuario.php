<?php
  require_once '../sql/conexion.php';

  class usuario{

  private $id;
  private $cedula;
  private $usuario;
  private $correo;
  private $contrasena;
  private $clientela;
  private $inicio;
  private $direccion;
  private $telefono;
  private $primernombre;
  private $otronombre;
  private $primerapellido;
  private $otroapellido;
  private $pregunta;
  private $respuesta;
  private $cl_id;
  public $result;

    function __construct($ID,$primernombre,$primerapellido,$cedula,$email,$contrasena,$pregunta,$respuesta,$direccion,$numero,$inicio,$cl_id){
    if(!empty($ID)){
      $this->id=$ID;
    }
    $this->primernombre=$primernombre;
    $this->primerapellido=$primerapellido;
    $this->cedula=$cedula;
    $this->email=$email;
    $this->contrasena=$contrasena;
    $this->pregunta=$pregunta;
    $this->respuesta=$respuesta;
    $this->direccion=$direccion;
    $this->telefono=$numero;
    $this->inicio=$inicio;
    $this->cl_id=$cl_id;
  }

  function uploaded(){
    global $pdo;
    $sql = "INSERT INTO clienteweb(CLWEB_CI, CLWEB_correo, CLWEB_contrasena, CLWEB_inicio, CLWEB_direccion, CLWEB_telefono, CLWEB_primernombre, CLWEB_primerapellido, CLWEB_pregunta,CLWEB_respuesta , CL_ID) VALUES ('$this->cedula', '$this->email', '$this->contrasena', '$this->inicio', '$this->direccion', '$this->telefono', '$this->primernombre', '$this->primerapellido', '$this->pregunta', '$this->respuesta', '$this->cl_id')";

    $query=$pdo->prepare($sql);
    $this->result=$query->execute([
      ':CLWEB_CI'=>$this->cedula,
      ':CLWEB_correo'=> $this->email,
      ':CLWEB_contrasena'=> $this->contrasena,
      ':CLWEB_inicio'=> $this->inicio,
      ':CLWEB_direccion'=> $this->direccion,
      ':CLWEB_telefono'=> $this->telefono,
      ':CLWEB_primernombre'=> $this->primernombre,
      ':CLWEB_primerapellido'=> $this->primerapellido,
      ':CLWEB_pregunta'=> $this->pregunta,
      ':CLWEB_respuesta'=> $this->respuesta,
      ':CL_ID'=> $this->cl_id,
    ]);

  }

  function update(){

    global $pdo;
    $sql = "UPDATE producto SET PR_referencia= '$this->referencia' , PR_usuario='$this->usuario', PR_inicio='$this->inicio', PR_nombre='$this->nombre', PR_clientela='$this->clientela', PR_categoria='$this->categoria', PR_talla='$this->talla',PR_color='$this->color', PR_marca='$this->marca', PR_material='$this->material', PR_descripcion='$this->descripcion', PR_cantidad= '$this->cantidad', PR_precio='$this->precio', PR_foto='$this->foto', CL_ID='$this->cl_id' WHERE PR_ID ='$this->id'";
    $query=$pdo->prepare($sql);

    $this->result=$query->execute([
    ]);
  }
}
?>
