<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';

session_start();

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;

//URL
$basedir= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseurl='http://' . $_SERVER['HTTP_HOST'] . $basedir;
define('BASE_URL', $baseurl);

//variables entorno
$dotenv = new \Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();


use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASS'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();



$route = $_GET['route'] ?? '/';
$router = new RouteCollector();

//Filtro

$router->filter('nousuario', function(){
  if (!isset($_SESSION['userId']) and !isset($_SESSION['permisos'])) {
    header('Location:' . BASE_URL . '');
    return false;
  }
});




$router->group(['before' => 'nousuario'], function ($router) {
  $router->controller('/user', App\controllers\user\UserController::class);
  $router->controller('/administrador', App\Controllers\administrador\IndexController::class);
  $router->controller('/administrador/articulos', App\Controllers\administrador\articulos\ArticuloController::class);
  $router->controller('/administrador/proveedor', App\Controllers\administrador\proveedor\ProveedorController::class);
  $router->controller('/administrador/usuarios', App\Controllers\administrador\usuarios\UserController::class);
  $router->controller('/administrador/pedido', App\Controllers\administrador\pedido\PedidoController::class);

});




// Inicio
$router->controller('/', App\controllers\IndexController::class);

// Sesion
$router->controller('/sesion', App\controllers\SesionController::class);



$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
try {
    echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);
} catch (HttpRouteNotFoundException $e) {
    include_once 'error.php';
} catch (HttpMethodNotAllowedException $e) {
    include_once 'error.php';
}
?>
