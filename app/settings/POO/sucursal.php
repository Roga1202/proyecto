<?php
  require_once '../sql/conexion.php';

  class sucursal{

  private $id;
  private $nombre;
  private $latitud;
  private $longitud;
  private $numerofiscal;
  private $direccion;
  private $inicio;
  private $cupoempleados;
  private $empleados;
  private $usuario;
  private $telefono;
  public $result;

    function __construct($ID,$nombre,$latitud,$longitud,$numerofiscal,$direccion,$inicio,$cupoempleados,$empleados,$telefono,$usuario){
    if(!empty($ID)){
      $this->id=$ID;
    }
    $this->nombre=$nombre;
    $this->latitud=$latitud;
    $this->longitud=$longitud;
    $this->numerofiscal=$numerofiscal;
    $this->direccion=$direccion;
    $this->inicio=$inicio;
    $this->cupoempleados=$cupoempleados;
    $this->empleados=$empleados;
    $this->telefono=$telefono;
    $this->usuario=$usuario;
  }

  function uploaded(){
    global $pdo;
    $sql = "INSERT INTO sucursal(SU_nombre, SU_lat, SU_lng, SU_numerofiscal, SU_direccion, SU_inicio, SU_cupoempleados, SU_empleados, SU_telefono, AD_ID) VALUES ('$this->nombre', '$this->latitud', '$this->longitud', '$this->numerofiscal', '$this->direccion', '$this->inicio', '$this->cupoempleados', '$this->empleados', '$this->telefono', '$this->usuario')";

    $query=$pdo->prepare($sql);
    $this->result=$query->execute([
      ':SU_nombre'=>$this->nombre,
      ':SU_lat'=> $this->latitud,
      ':SU_lng'=> $this->longitud,
      ':SU_numerofiscal'=> $this->numerofiscal,
      ':SU_direccion'=> $this->direccion,
      ':SU_inicio'=> $this->inicio,
      ':SU_cupoempleados'=> $this->cupoempleados,
      ':SU_empleados'=> $this->empleados,
      ':SU_telefono'=> $this->telefono,
      ':AD_ID'=> $this->usuario,
    ]);

  }

  function update(){

    global $pdo;
    $sql = "UPDATE producto SET PR_referencia= '$this->referencia' , PR_usuario='$this->usuario', PR_inicio='$this->inicio', PR_nombre='$this->nombre', PR_clientela='$this->clientela', PR_categoria='$this->categoria', PR_talla='$this->talla',PR_color='$this->color', PR_marca='$this->marca', PR_material='$this->material', PR_descripcion='$this->descripcion', PR_cantidad= '$this->cantidad', PR_precio='$this->precio', PR_foto='$this->foto' WHERE PR_ID ='$this->id'";
    $query=$pdo->prepare($sql);

    $this->result=$query->execute([
    ]);
  }
}
?>
