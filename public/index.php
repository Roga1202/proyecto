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


$baseurl='http://' . $_SERVER['HTTP_HOST'] . $basedir;

define('BASE_URL', $baseurl);


$route = $_GET['route'] ?? '/';

function render($filename, $params = []){
  ob_start();
  extract($params);
  include $filename;
  return ob_get_clean();
};

$router = new RouteCollector();

$router->controller('/', App\controllers\IndexController::class);

$router->controller('/informacion', App\Controllers\informacion\IndexController::class);

$router->controller('/inscripcion', App\Controllers\inscripcion\IndexController::class);

$router->controller('/sucursales', App\Controllers\sucursales\IndexController::class);

$router->controller('/inicio_sesion', App\Controllers\inicio_sesion\IndexController::class);

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
try {
    echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);
} catch (HttpRouteNotFoundException $e) {
    include_once './error.php';
} catch (HttpMethodNotAllowedException $e) {
    include_once './error.php';
}
?>
