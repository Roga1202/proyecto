<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';


use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;

$route = $_GET['route'] ?? '/';



$router = new RouteCollector();


// Inicio
$router->get('/', function(){
  include_once './inicio.php';
});


//Articulos
$router->get('/admin/articulos/administracion_articulos', function(){
  include_once './administracion_articulos.php';
});

// //Guardar
// $router->any('/admin/articulos/guardar', function(){
//   include_once '../settings/sql/save.php';
// });

// $router->get('/admin/articulo/modificacion?referencia={referencia}', function($referencia){
//   $dir='./modificar_articulo.php?ref='.$referencia;
//   include_once $dir   ;
// });

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
try {
    echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);
} catch (HttpRouteNotFoundException $e) {
    include_once '../public/error.php';
} catch (HttpMethodNotAllowedException $e) {
    include_once './inicio.php';
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
