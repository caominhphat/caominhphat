<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
	
	
		
?>
<?php

	// if(!isset($_GET['proid']) || $_GET['proid']==NULL){
 //       echo "<script>window.location ='404.php'</script>";
 //    }else{
 //        $id = $_GET['proid']; 
 //    }
 	
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
	    		
				<h2 style="width: 100%;text-align: center;">Edit Profile Customers</h2>
	    		
	    		<div class="clear"></div>
    		</div>
			<form action="" method="post">
			<table class="tblone">
				<tr>
					
						<?php
						if(isset($UpdateCustomers)){
							echo '<td colspan="3">'.$UpdateCustomers.'</td>';
						}
						?>
					
				</tr>
				<?php
				$id = Session::get('customer_id');
				$get_customers = $cs->show_customers($id);
				if($get_customers){
					while($result = $get_customers->fetch_assoc()){

				?>
				<tr>
					<td>Name</td>
					<td>:</td>
					<td><input type="text" name="name" value="<?php echo $result['name'] ?>"></td>
				</tr>
				
				<tr>
					<td>Phone</td>
					<td>:</td>
					<td><input type="text" name="phone" value="<?php echo $result['phone'] ?>"></td>
				
				</tr>
			
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><input type="text" name="email" value="<?php echo $result['email'] ?>"></td>
					
				</tr>
				<tr>
					<td>Address</td>
					<td>:</td>
					<td><input type="text" name="address" value="<?php echo $result['address'] ?>"></td>
					
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><input type="text" name="password" value="<?php echo $result['password'] ?>"></td>
					
				</tr>
				<tr>
					<td colspan="3"><input type="submit" name="save" value="Save"></td>
					
				</tr>
				
				<?php
					}
				}
				?>
			</table>
			</form>
 		</div>
 	</div>
<?php 
	include 'inc/footer.php';
	
 ?>
