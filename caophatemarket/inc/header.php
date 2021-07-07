<?php include_once 'lib/session.php';
    Session::init(); ?>

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
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="shortcut icon" type="image/png" href="images/favicon1.png"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<script type="text/javascript" src="js/bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-4.5.0-dist/css/bootstrap.min.css"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>




<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
<div style="max-width: 1300px;margin-left: auto;margin-right: auto;">
  <div style="width:100%" class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href=""><img style="height: 150px;max-width:350px;" src="images/logo_web.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			  <div style="transform: translate(5%, 0);">
			  <div class="search_box">
				    <form action="?page=search&action=search" method="POST">
					<input type="text" placeholder="Search for products" name="tukhoa">
				    	<input type="submit" name="search_product" value="Tìm kiếm"> 
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="?page=cart&action=cart" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">
									
									<?php
									$check_cart = $ct->check_cart();
										if($check_cart){
											//Hiển thị biến sum của giỏ hàng(biến sum này thuộc về mỗi phiên làm việc riêng biệt)
											$sum = Session::get("sum");
											$qty = Session::get("qty");
											echo $fm->format_currency($sum).' '.'đ'.'-'.'sl:'.$qty ;
											}else{
											echo 'Empty';
										}
									?>
								</span>
							</a>
						</div>
			      </div>
				  <?php 
				if(isset($_GET['customer_id'])){
					$customer_id = $_GET['customer_id'];
					// Khi logout xoa gio hang hien tai
					$delCart = $ct->del_all_data_cart();
					// $delCompare = $ct->del_compare($customer_id);
					Session::destroy();
				}
				?>
		   <div class="login">
		   <?php
			$login_check = Session::get('customer_login'); 
			if($login_check==false){
				echo '<a href="?page=login&action=login" style="font-size:16px;text-align:center;line-height:35px;">Login</a></div>';
			}else{
				echo '<a href="?customer_id='.Session::get('customer_id').'" style="font-size:16px;text-align:center;line-height:35px;">Logout</a></div>';
			}
			?>
				
		   </div>
			  </div>
			   
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="?page=home">Home</a></li>
	  <li><a href="?page=product&action=product">Products</a> </li>
	  <li><a href="?page=cart&action=cart">Cart</a></li>
	  <?php
			$login_check = Session::get('customer_login'); 
			if($login_check==false){
				echo '';
			}else{
				echo '<li><a href="?page=profile&action=profile">Profile</a> </li>';
				echo '<li><a href="?page=order&action=order">Order</a> </li>';
				echo '<li><a href="?page=wishlist&action=wishlist">Wishlist</a> </li>';
			}
			 ?>
			


	  <li><a href="contact.php">Contact</a> </li>
	  <div class="clear"></div>
	</ul>
</div>
