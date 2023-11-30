<?php
declare(strict_types = 1);
require_once('controllers/MainController.php');
require_once('controllers/Router/Router.php');
//require_once('controllers/Router/Route.php');


$router = new Router();
if(!isset($_GET['action'])) $_GET['action']="index";
//$router->routing("index",null);
//$controler = new MainController();
$action = $_GET['action'];
$router->routing($action,null);


//$controler->index();


 
 
?>  