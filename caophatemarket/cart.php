<!-- ---------------------------------------- Insert header , slider vao web------------------------>

<?php
include 'inc/header.php';

?>


<?php
	// if(!isset($_GET['id'])){
	// 	echo "<meta http-equiv='refresh' content='0;URL=?page=cart&action=cart&id=live'>";
	// }
?>
<!-- -------------------------------------------------------------------------------------------- -->

<!-- ---------------------------------------- Main----------------------------------------------- -->

<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <h2>Your Cart</h2>
                <?php
							if(isset($update_quantity_cart)){
								echo $update_quantity_cart;
								}
						?>
                <?php
							if(isset($delcart)){
								echo $delcart;
								}
						?>
                <table class="tblone">
                    <tr>
                        <th width="20%">Product Name</th>
                        <th width="10%">Image</th>
                        <th width="15%">Price</th>
                        <th width="25%">Quantity</th>
                        <th width="20%">Total Price</th>
                        <th width="10%">Action</th>
                    </tr>

                    <?php
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								while($result = $get_product_cart->fetch_assoc()){
							?>
                    <tr>
                        <td><?php echo $result['productName'] ?></td>
                        <td><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></td>
                        <td><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>" />
                                <input type="number" name="quantity" min="0"
                                    value="<?php echo $result['quantity'] ?>" />

                                <input type="submit" name="submit" value="Update" />
                            </form>
                        </td>
                        <td><?php
								$total = $result['price'] * $result['quantity'];
								echo $fm->format_currency($total)." "."VNĐ";
								 ?></td>

                        <td><a onclick="return confirm('Do you want to delete this product?');"
                                href="?page=cart&action=cart&cartid=<?php echo $result['cartId'] ?>">Xóa</a></td>
                    </tr>
                    <?php
							$subtotal += $total;
							$qty = $qty + $result['quantity'];
							}
						}
						?>

                </table>
                <?php
							$check_cart = $ct->check_cart();
								if($check_cart){
								?>
                <table style="float:right;text-align:left;" width="40%">
                    <tr>
                        <th>Sub Total : </th>
                        <td><?php 

									echo $fm->format_currency($subtotal)." "."VNĐ";
									//Tạo ra biến sum có giá trị bằng $subtotal trong 1 phiên làm việc xác định
									Session::set('sum',$subtotal);
									Session::set('qty',$qty);
								?></td>
                    </tr>
                    <tr>
                        <th>VAT : </th>
                        <td>10%</td>
                    </tr>
                    <tr>
                        <th>Grand Total :</th>
                        <td><?php 
								$vat = $subtotal * 0.1;
								$gtotal = $subtotal + $vat;
								echo $fm->format_currency($gtotal)." "."VNĐ";
								?></td>
                    </tr>
                </table>
                <?php
					}else{
						echo 'Cart is empty';
					}
					  ?>
            </div>
            <div class="shopping">
                <div class="shopleft">
                    <a href="?page=home"> <img src="images/shop.png" alt="" /></a>
                </div>
                <div class="shopright">
                    <a href="?page=payment&action=payment"> <img src="images/check.png" alt="" /></a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- -------------------------------------------------------------------------------------------- -->

<!-- ---------------------------------------- Insert footer vao web------------------------------------>
<?php
include 'inc/footer.php';
?>