<?php
require 'Database.php';
require './Models/BaseModel.php';
require "./Controllers/BaseController.php";
if(!isset($_REQUEST['controller'])&&isset($_SESSION['admin'])){
    echo "ok";  
    return;
}
$controllerName = ucfirst((strtolower($_REQUEST['controller']) ?? 'Welcome') . 'Controller');

$actionName = $_REQUEST['action'] ?? 'index';

require "./Controllers/${controllerName}.php";

$controllerObject = new $controllerName;
    $controllerObject -> $actionName();
return;