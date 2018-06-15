<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';

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

// Inicio
$router->controller('/', App\controllers\IndexController::class);
$router->controller('/informacion', App\Controllers\inicio\informacion\IndexController::class);
$router->controller('/inscripcion', App\Controllers\inicio\inscripcion\IndexController::class);
$router->controller('/sucursales', App\Controllers\inicio\sucursales\IndexController::class);
$router->controller('/inicio_sesion', App\Controllers\inicio\inicio_sesion\IndexController::class);

//Administrador
$router->controller('/administrador', App\Controllers\administrador\IndexController::class);

//Articulos
$router->controller('/administrador/articulos', App\Controllers\administrador\articulos\ArticuloController::class);


//MODIFICACION DE ARTICULO
$router->get('/admin/articulo/modificacion?referencia={referencia}', function(){
  require '../settings/sql/conexion.php';

  $referencia= str_replace('/admin/articulo/modificacion?referencia=', '', $_GET['route']);

  $sql = "SELECT * FROM producto WHERE PR_referencia= '$referencia'";
  $resultado = $pdo->query($sql);
  $row = $resultado->fetch(MYSQLI_ASSOC);

  return render('./modificar_articulo.php', ['row' =>$row , 'referencia' => $referencia]);
});




$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
try {
    echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);
} catch (HttpRouteNotFoundException $e) {
    include_once './error.php';
} catch (HttpMethodNotAllowedException $e) {
    include_once './errors.php';
}
?>
