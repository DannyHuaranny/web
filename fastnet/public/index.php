<?php

ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

session_start();

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'fastnet',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();
/* -------------------------clientes---------------------------- */
$map->get('cliente.inicio', '/fastnet/clientes', [
    'controller' => 'App\Controllers\ClientesController',
    'action' => 'index',
    'auth' => true
]);
$map->get('cliente.perfil', '/fastnet/clientes/{id}/perfil', [
    'controller' => 'App\Controllers\ClientesController',
    'action' => 'perfil',
    'auth' => true
]);
$map->get('cliente.nuevoForm', '/fastnet/clientes/nuevo', [
    'controller' => 'App\Controllers\ClientesController',
    'action' => 'nuevoForm',
    'auth' => true
]);
$map->post('cliente.save', '/fastnet/clientes/save', [
    'controller' => 'App\Controllers\ClientesController',
    'action' => 'postSave',
    'auth' => true
]);
$map->get('cliente.UpdateForm', '/fastnet/clientes/{id}/update', [
    'controller' => 'App\Controllers\ClientesController',
    'action' => 'updateForm',
    'auth' => true
]);
$map->post('cliente.update', '/fastnet/clientes/{id}/update', [
    'controller' => 'App\Controllers\ClientesController',
    'action' => 'postUpdate',
    'auth' => true
]);
$map->get('cliente.delete', '/fastnet/clientes/{id}/delete', [
    'controller' => 'App\Controllers\ClientesController',
    'action' => 'postDelete',
    'auth' => true
]);/*-----------------------documentos------------------------------ */
$map->get('documentos.lista', '/fastnet/documentos', [
    'controller' => 'App\Controllers\DocumentosController',
    'action' => 'index',
    'auth' => true
]);
$map->get('documentos.addForm', '/fastnet/documentos/add', [
    'controller' => 'App\Controllers\DocumentosController',
    'action' => 'nuevoForm',
    'auth' => true
]);
$map->post('documentos.save', '/fastnet/documentos/save', [
    'controller' => 'App\Controllers\DocumentosController',
    'action' => 'postSave',
    'auth' => true
]);
$map->get('documentos.updateForm', '/fastnet/documentos/{id}/update', [
    'controller' => 'App\Controllers\DocumentosController',
    'action' => 'updateForm',
    'auth' => true
]);
$map->post('documentos.update', '/fastnet/documentos/{id}/update', [
    'controller' => 'App\Controllers\DocumentosController',
    'action' => 'postUpdate',
    'auth' => true
]);
$map->get('documentos.delete', '/fastnet/documentos/{id}/delete', [
    'controller' => 'App\Controllers\DocumentosController',
    'action' => 'postDelete',
    'auth' => true
]);
/* -----------------------planes------------------------------ */
$map->get('planes.index', '/fastnet/planes', [
    'controller' => 'App\Controllers\PlanesController',
    'action' => 'index'
]);
$map->get('planes.delete', '/fastnet/planes/{id}/delete', [
    'controller' => 'App\Controllers\PlanesController',
    'action' => 'postDelete'
]);
$map->get('planes.addForm', '/fastnet/planes/add', [
    'controller' => 'App\Controllers\PlanesController',
    'action' => 'nuevoForm'
]);
$map->post('planes.save', '/fastnet/planes/save', [
    'controller' => 'App\Controllers\PlanesController',
    'action' => 'postSave'
]);

$map->get('planes.updateForm', '/fastnet/planes/{id}/update', [
    'controller' => 'App\Controllers\PlanesController',
    'action' => 'updateForm'
]);
$map->post('planes.update', '/fastnet/planes/{id}/update', [
    'controller' => 'App\Controllers\PlanesController',
    'action' => 'postUpdate'
]);
/* -----------------------router------------------------------ */
$map->get('routers.index', '/fastnet/routers', [
    'controller' => 'App\Controllers\RoutersController',
    'action' => 'index'
]);
$map->get('routers.addForm', '/fastnet/routers/add', [
    'controller' => 'App\Controllers\RoutersController',
    'action' => 'nuevoForm'
]);

$map->post('routers.save', '/fastnet/routers/save', [
    'controller' => 'App\Controllers\RoutersController',
    'action' => 'postSave'
]);

$map->get('routers.updateForm', '/fastnet/routers/{id}/update', [
    'controller' => 'App\Controllers\RoutersController',
    'action' => 'updateForm'
]);

$map->post('routers.update', '/fastnet/routers/{id}/update', [
    'controller' => 'App\Controllers\RoutersController',
    'action' => 'postUpdate'
]);

$map->get('routers.delete', '/fastnet/routers/{id}/delete', [
    'controller' => 'App\Controllers\RoutersController',
    'action' => 'postDelete'
]);
/* -----------------------zonas------------------------------ */
$map->get('zonas.index', '/fastnet/zonas', [
    'controller' => 'App\Controllers\ZonasController',
    'action' => 'index'
]);
$map->get('zonas.addForm', '/fastnet/zonas/add', [
    'controller' => 'App\Controllers\ZonasController',
    'action' => 'nuevoForm'
]);
$map->post('zonas.save', '/fastnet/zonas/save', [
    'controller' => 'App\Controllers\ZonasController',
    'action' => 'postSave'
]);

$map->get('zonas.updateForm', '/fastnet/zonas/{id}/update', [
    'controller' => 'App\Controllers\ZonasController',
    'action' => 'updateForm'
]);

$map->post('zonas.update', '/fastnet/zonas/{id}/update', [
    'controller' => 'App\Controllers\ZonasController',
    'action' => 'postUpdate'
]);

$map->get('zonas.delete', '/fastnet/zonas/{id}/delete', [
    'controller' => 'App\Controllers\ZonasController',
    'action' => 'postDelete'
]);
/* -----------------------servicios------------------------------ */
$map->get('servicios.index', '/fastnet/servicios', [
    'controller' => 'App\Controllers\ServiciosController',
    'action' => 'index'
]);
$map->get('servicios.addForm', '/fastnet/servicios/add', [
    'controller' => 'App\Controllers\ServiciosController',
    'action' => 'nuevoForm'
]);

$map->post('servicios.save', '/fastnet/servicios/save', [
    'controller' => 'App\Controllers\ServiciosController',
    'action' => 'postSave'
]);

$map->get('servicios.updateForm', '/fastnet/servicios/{id}/update', [
    'controller' => 'App\Controllers\ServiciosController',
    'action' => 'updateForm'
]);
$map->post('servicios.update', '/fastnet/servicios/{id}/update', [
    'controller' => 'App\Controllers\ServiciosController',
    'action' => 'postUpdate'
]);
$map->get('servicios.delete', '/fastnet/servicios/{id}/delete', [
    'controller' => 'App\Controllers\ServiciosController',
    'action' => 'postDelete'
]);
/* -----------------------tipo instalaciones------------------------------ */
$map->get('instalaciones_tipo.index', '/fastnet/instalaciones_tipo', [
    'controller' => 'App\Controllers\InstalacionesTipoController',
    'action' => 'index'
]);

$map->get('instalaciones_tipo.addForm', '/fastnet/instalaciones_tipo/add', [
    'controller' => 'App\Controllers\InstalacionesTipoController',
    'action' => 'nuevoForm'
]);

$map->post('instalaciones_tipo.save', '/fastnet/instalaciones_tipo/save', [
    'controller' => 'App\Controllers\InstalacionesTipoController',
    'action' => 'postSave'
]);

$map->get('instalaciones_tipo.updateForm', '/fastnet/instalaciones_tipo/{id}/update', [
    'controller' => 'App\Controllers\InstalacionesTipoController',
    'action' => 'updateForm'
]);

$map->post('instalaciones_tipo.update', '/fastnet/instalaciones_tipo/{id}/update', [
    'controller' => 'App\Controllers\InstalacionesTipoController',
    'action' => 'postUpdate'
]);

$map->get('instalaciones_tipo.delete', '/fastnet/instalaciones_tipo/{id}/delete', [
    'controller' => 'App\Controllers\InstalacionesTipoController',
    'action' => 'postDelete'
]);
/* -----------------------ips------------------------------ */
$map->get('ips.index', '/fastnet/ips', [
    'controller' => 'App\Controllers\IpsController',
    'action' => 'index'
]);

$map->get('ips.addForm', '/fastnet/ips/add', [
    'controller' => 'App\Controllers\IpsController',
    'action' => 'nuevoForm'
]);

$map->post('ips.save', '/fastnet/ips/save', [
    'controller' => 'App\Controllers\IpsController',
    'action' => 'postSave'
]);

$map->get('ips.updateForm', '/fastnet/ips/{id}/update', [
    'controller' => 'App\Controllers\IpsController',
    'action' => 'updateForm'
]);

$map->post('ips.update', '/fastnet/ips/{id}/update', [
    'controller' => 'App\Controllers\IpsController',
    'action' => 'postUpdate'
]);

$map->get('ips.delete', '/fastnet/ips/{id}/delete', [
    'controller' => 'App\Controllers\IpsController',
    'action' => 'postDelete'
]);
/* ------------------------users--------------------------- */
$map->get('users.index', '/fastnet/users', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'index',
    'auth' => true
]);
$map->get('users.addForm', '/fastnet/users/nuevo', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'nuevoForm',
    'auth' => true
]);
$map->post('users.save', '/fastnet/users/save', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'postSave',
    'auth' => true
]);
$map->get('users.delete', '/fastnet/users/{idUser}/{idPersona}/delete', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'postDelete',
    'auth' => true
]);
/* ----------------------auth--------------------------- */
$map->get('login.formulario', '/fastnet/login', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'loginForm'
]);
$map->get('login.logout', '/fastnet/logout', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogout',
    'auth' => true
]);
$map->post('login.auth', '/fastnet/auth', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'postLogin'
]);
$map->get('prueba', '/fastnet/', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'estilo'
]);
/* -----------------------servidores------------------------------ */
$map->get('servidores.index', '/fastnet/servidores', [
    'controller' => 'App\Controllers\ServidoresController',
    'action' => 'index'
]);

$map->get('servidores.addForm', '/fastnet/servidores/add', [
    'controller' => 'App\Controllers\ServidoresController',
    'action' => 'nuevoForm'
]);

$map->post('servidores.save', '/fastnet/servidores/save', [
    'controller' => 'App\Controllers\ServidoresController',
    'action' => 'postSave'
]);
/* ------------------------contratos---------------------------- */
$map->get('contratos.index', '/fastnet/contratos', [
    'controller' => 'App\Controllers\ContratosController',
    'action' => 'index'
]);
$map->get('contratos.addForm', '/fastnet/contratos/add', [
    'controller' => 'App\Controllers\ContratosController',
    'action' => 'nuevoForm'
]);
$map->post('contratos.save', '/fastnet/contratos/save', [
    'controller' => 'App\Controllers\ContratosController',
    'action' => 'postSave'
]);
$map->get('contratos.updateForm', '/fastnet/contratos/{id}/update', [
    'controller' => 'App\Controllers\ContratosController',
    'action' => 'updateForm'
]);
$map->post('contratos.update', '/fastnet/contratos/{id}/update', [
    'controller' => 'App\Controllers\ContratosController',
    'action' => 'postUpdate'
]);
$map->get('contratos.delete', '/fastnet/contratos/{id}/delete', [
    'controller' => 'App\Controllers\ContratosController',
    'action' => 'postDelete'
]);
/* */

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);


if (!$route) {
    echo 'No existe la ruta';
} else {
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];
    $needsAuth = $handlerData['auth'] ?? false;

    $sessionUserId = $_SESSION['userId'] ?? null;
    if ($needsAuth && !$sessionUserId) {
        echo 'Ruta protegida';
        die;
    }

    foreach ($route->attributes as $key => $attribute) {
        $request = $request->withAttribute($key, $attribute);
    }


    $controller = new $controllerName;
    $response = $controller->$actionName($request);

    foreach($response->getHeaders() as $name => $values)
    {
        foreach($values as $value) {
            header(sprintf('%s: %s', $name, $value), false);
        }
    }
    http_response_code($response->getStatusCode());
    echo $response->getBody();
}
