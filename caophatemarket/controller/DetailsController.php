<?php 
  class DetailsController{
    function detailscreen() {
        spl_autoload_register(function($class){
            include_once "classes/".$class.".php";
        });
          $ct = new cart();
        if(!isset($_GET['proid']) || $_GET['proid']==NULL){
            echo "<script>window.location ='404.php'</script>";
         }else{
              $id = $_GET['proid']; 
         }
     
       if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
     
             $quantity = $_POST['quantity'];
             $insertCart = $ct->add_to_cart($quantity, $id);
             
         }
        require "details.php";
    }
  }
?>

