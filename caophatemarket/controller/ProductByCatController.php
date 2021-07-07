<?php 
  class ProductbycatController{
    function productbycatscreen() {
        if(!isset($_GET['catid']) || $_GET['catid']==NULL){
            echo "<script>window.location ='404.php'</script>";
         }else{
             $id = $_GET['catid']; 
         }
        
        require "productbycat.php";
    }
  }
?>