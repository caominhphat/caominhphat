<?php 
class PaymentController{
    function payment(){
        require 'payment.php';
    }

    function offlinepayment(){
        require 'offlinepayment.php';
    }

    function success(){
        require 'success.php';
    }
}

?>