<?php 
class CartController{

    function cart(){
        spl_autoload_register(function($class){
            include_once "classes/".$class.".php";
        });
        $ct = new cart();
        if(isset($_GET['cartid'])){
            $cartid = $_GET['cartid']; 
            $delcart = $ct->del_product_cart($cartid);
        }
    
             //Update số lượng hàng trong giỏ hàng
         if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $cartId = $_POST['cartId'];
            $quantity = $_POST['quantity'];
            $update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId);
            if($quantity<=0){
                $delcart = $ct->del_product_cart($cartId);
            }
            if($update_quantity_cart || $delcart){
                 echo "<meta http-equiv='refresh' content='0;URL=?page=cart&action=cart&id=live'>";
            }
              
            
        }
            require 'cart.php';
    }

   
}
?>