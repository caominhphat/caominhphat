<?php 
        class WishlistController{
            function wishlist(){
                if (isset($_GET['proid'])) {
                    $customer_id = Session::get('customer_id');
                    $proid = $_GET['proid'];
                    $delwlist = $product->del_wlist($proid, $customer_id);
                }
                require 'wishlist.php';
            }
        }
?>