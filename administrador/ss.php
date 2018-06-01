<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';


use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;


$basedir= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);


$baseurl='https://' . $_SERVER['HTTP_HOST'] . $basedir;

define('BASE_URL', $baseurl);


$route = $_GET['route'] ?? '/';

function render($filename, $params = []){
  ob_start();
  extract($params);
  include $filename;
  return ob_get_clean();
};

$router = new RouteCollector();


// Inicio
$router->get('/', function(){
  return render('./inicio.php');
});


//Articulos
$router->get('/admin/articulos/administracion', function(){
  return render('./administracion_articulos.php');
});

//Guardar
$router->post('/admin/articulo/guardado', function(){
  require_once '../settings/sql/conexion.php';
  require_once '../settings/POO/producto.php';

  if(!empty($_POST)){
    $ID= null;
    $referencia=$_POST['referencia'];
    $nombre=$_POST['nombre'];
    $clientela=$_POST['clientela'];
    $categoria=$_POST['categoria'];
    // Valo de talla sin arreglar
    $talla= isset($_POST['talla']) ? $_POST['talla'] : null;
    //
    // Valo de talla sin arreglar
    $foto= isset($_FILES["archivo"]['name']) ? $_FILES["archivo"]['name'] : null;
    //
    $color=$_POST['color'];
    $marca=$_POST['marca'];
    $material=$_POST['material'];
    $descripcion=$_POST['descripcion'];
    $cantidad=$_POST['cantidad'];
    $precio=$_POST['precio'];
    $inicio=date("Y-m-d H:i:s");
    $usuario=1;

    require_once "../settings/script/arraytalla.php";
    require_once "../settings/script/arrayfoto.php";

    $producto= new Producto($ID,$referencia,$usuario,$inicio,$nombre,$clientela,$categoria,$arraytalla,$color,$marca,$material,$descripcion,$cantidad,$precio,$arrayfoto);
    $producto->uploaded();

  }
    return render('../settings/sql/save.php',['referencia'=> $referencia , 'nombre' => $nombre, 'clientela'=> $clientela , 'categgoia'=> $categoria , 'talla' => $talla , 'foto' => $foto , 'color' => $color , 'marca' => $marca , 'material' => $material , 'descripcion' => $descripcion, 'cantidad'=> $cantidad , 'precio'=> $precio , 'inicio' => $inicio , 'usuario' => $usuario, 'result' => $producto->result]);
});


//MODIFICACION DE ARTICULO
$router->get('/admin/articulo/modificacion?referencia={referencia}', function(){
  require '../settings/sql/conexion.php';

  $referencia= str_replace('/admin/articulo/modificacion?referencia=', '', $_GET['route']);

  $sql = "SELECT * FROM producto WHERE PR_referencia= '$referencia'";
  $resultado = $pdo->query($sql);
  $row = $resultado->fetch(MYSQLI_ASSOC);

  return render('./modificar_articulo.php', ['row' =>$row , 'referencia' => $referencia]);
});


//AGREGAR ARTICULO
$router->get('/admin/articulos/agregar', function(){
  return render('./agregar_articulo.php');
});

//DISPATCH
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

try {
    echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);
} catch (HttpRouteNotFoundException $e) {
    include_once '<?php echo BASE_URL;?>error.php';
} catch (HttpMethodNotAllowedException $e) {
    include_once '<?php echo BASE_URL;?>error.php';
}


// 		case '/admin/articulo/administrar':
//       require '../administrador/administracion_articulos.php';
//       break;
// 		case '/admin/articulo/registro':
//       require '../administrador/agregar_articulo.php';
//       break;
// 		case '/admin/articulo/guardado':
//       require '../settings/sql/save.php';
//       break;
// 		case "/admin/articulo/modificacion&referencia='$ref'" :
//       require "../administrador/modificar_articulo.php?referencia='$ref'";
//       break;

?>
