
<?php
require_once 'Controller/IndexController.php';

//Primera parte - Nombre Controlador
$controller = 'Index';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    require_once "Controller/$controller"."Controller.php";
    $controller = $controller . 'Controller';
    $controller = new $controller;
    $controller->View();    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = ucfirst($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'View';
    
    // Instanciamos el controlador
    require_once "Controller/$controller"."Controller.php";
    $controller = $controller . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}