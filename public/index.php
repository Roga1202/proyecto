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

$router->get('/', function(){
  include_once 'inicio.php';
});

$router->get('informacion', function(){
  include_once './informacion.php';
});

$router->get('inscripcion', function(){
  include_once './inscripcion.php';
});

$router->get('sucursales', function(){
  include_once './sucursales.php';
});

$router->get('inicio_sesion', function(){
  include_once './inicio_sesion.php';
});

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
try {
    echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);
} catch (HttpRouteNotFoundException $e) {
    include_once './error.php';
} catch (HttpMethodNotAllowedException $e) {
    include_once './error.php';
}
?>