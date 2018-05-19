<?php
  require_once '../sql/conexion.php';

  class producto{

  private $id;
  private $referencia;
  private $usuario;
  private $inicio;
  private $nombre;
  private $clientela;
  private $categoria;
  private $talla;
  private $color;
  private $marca;
  private $material;
  private $descripcion;
  private $cantidad;
  private $precio;
  private $foto;
  public $result;

    function __construct($ID,$referencia,$usuario,$inicio,$nombre,$clientela,$categoria,$talla,$color,$marca,$material,$descripcion,$cantidad,$precio,$foto){
    if(!empty($ID)){
      $this->id=$ID;
    }
    $this->referencia=$referencia;
    $this->usuario=$usuario;
    $this->inicio=$inicio;
    $this->nombre=$nombre;
    $this->clientela=$clientela;
    $this->categoria=$categoria;
    $this->talla=$talla;
    $this->color=$color;
    $this->marca=$marca;
    $this->material=$material;
    $this->descripcion=$descripcion;
    $this->cantidad=$cantidad;
    $this->precio=$precio;
    $this->foto=$foto;
  }

  function uploaded(){
    global $pdo;
    $sql = "INSERT INTO producto (PR_referencia, PR_inicio, PR_nombre, PR_clientela, PR_categoria, PR_talla, PR_color, PR_Marca, PR_material, PR_descripcion, PR_cantidad, PR_precio, PR_foto, AD_ID) VALUES('$this->referencia', '$this->inicio', '$this->nombre', '$this->clientela', '$this->categoria', '$this->talla', '$this->color', '$this->marca', '$this->material', '$this->descripcion', '$this->cantidad', '$this->precio', '$this->foto', '$this->usuario')";
    $query=$pdo->prepare($sql);
    $this->result=$query->execute([
    ':PR_referencia'=>$this->referencia,
    ':PR_inicio'=> $this->inicio,
    ':PR_nombre'=> $this->nombre,
    ':PR_clientela'=> $this->clientela,
    ':PR_categoria'=> $this->categoria,
    ':PR_talla'=> $this->talla,
    ':PR_color'=> $this->color,
    ':PR_marca'=> $this->marca,
    ':PR_material'=> $this->material,
    ':PR_descripcion'=> $this->descripcion,
    ':PR_cantidad'=> $this->cantidad,
    ':PR_precio'=> $this->precio,
    ':PR_foto'=> $this->foto,
    ':AD_ID'=> $this->usuario,
    ]);

    if($this->result){

      //Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
      foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
      {
       //Validamos que el archivo exista
       if($_FILES["archivo"]["name"][$key]) {
         $filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
         $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo

         $directorio = '../../archivos/files/' . $this->referencia . '/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

         //Validamos si la ruta de destino existe, en caso de no existir la creamos
         if(!file_exists($directorio)){
           mkdir($directorio,0777) or die("No se puede crear la carpeta de las fotos, asi que no seran guardados , sin embargo , el producto se guardo.");
         }

         $dir=opendir($directorio); //Abrimos el directorio de destino
         $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo

         //Movemos y validamos que el archivo se haya cargado correctamente
         //El primer campo es el origen y el segundo el destino
         if(move_uploaded_file($source, $target_path)) {
           echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
           } else {
           echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
         }
         closedir($dir); //Cerramos el directorio de destino
       }
      }
    }
  }

  function update(){

    global $pdo;
    $sql = "UPDATE producto SET PR_referencia= '$this->referencia' , AD_ID='$this->usuario', PR_inicio='$this->inicio', PR_nombre='$this->nombre', PR_clientela='$this->clientela', PR_categoria='$this->categoria', PR_talla='$this->talla',PR_color='$this->color', PR_marca='$this->marca', PR_material='$this->material', PR_descripcion='$this->descripcion', PR_cantidad= '$this->cantidad', PR_precio='$this->precio', PR_foto='$this->foto' WHERE PR_ID ='$this->id'";
    $query=$pdo->prepare($sql);

    $this->result=$query->execute([
    ':PR_referencia'=>$this->referencia,
    ':AD_ID'=> $this->usuario,
    ':PR_inicio'=> $this->inicio,
    ':PR_nombre'=> $this->nombre,
    ':PR_clientela'=> $this->clientela,
    ':PR_categoria'=> $this->categoria,
    ':PR_talla'=> $this->talla,
    ':PR_color'=> $this->color,
    ':PR_marca'=> $this->marca,
    ':PR_material'=> $this->material,
    ':PR_descripcion'=> $this->descripcion,
    ':PR_cantidad'=> $this->cantidad,
    ':PR_precio'=> $this->precio,
    ':PR_foto'=> $this->foto,
    ]);
  }
}
?>
