<?php 
    include_once 'lib/session.php';
    Session::init(); 
?>

<?php 
	include_once 'lib/database.php';
	include_once 'helpers/format.php';

	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
		

	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$br = new brand();
	$cat = new category();
	$cs = new customer();
	$product = new product();
?>
<?php 
  $c = $_GET["page"] ?? "home";
  $a = $_GET["action"] ?? "homescreen";
  $controllerName = ucfirst($c). "Controller";//HomeController
  require "controller/" . $controllerName . ".php";
  $controller = new $controllerName();//new HomeController();
  $controller->$a();//$controller->home();
		  	 	
?>
