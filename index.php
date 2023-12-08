<?php
declare(strict_types = 1);
require_once('controllers/MainController.php');
require_once('controllers/Router/Router.php');
//require_once('controllers/Router/Route.php');
if(isset($_POST) && !empty($_POST))
$data = $_POST;
else $data = null;


$router = new Router();
if(!isset($_GET['action'])) $_GET['action']="index";
//$router->routing("index",null);
//$controler = new MainController();
$action = $_GET['action'];
$router->routing($action,$data);


  

 
 
?>  