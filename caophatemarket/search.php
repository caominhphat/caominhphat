<?php
include 'inc/header.php';
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    			<h3>Key : <?php echo $tukhoa ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	    <div class="section group">
	    	<?php
				if (isset($search_product)) {
					if ($search_product) {
						while ($result = $search_product->fetch_assoc()) {
			?>
			<div class="grid_1_of_4 images_1_of_4">
				<div class="box">
					<img  style="width: 250px;height:250px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" />
					<div class="overlay">
						<a href="?page=details&action=detailscreen&proid=<?php echo $result['productId'] ?>">Details</a>
						<form id="myform" method="post" action="">
							<input type="hidden" name="id" value="<?php echo $result['productId'] ?>" />
							<input type="hidden" class="buyfield" name="quantity" value="1" min="1"/>
							<input type="submit" name="addcart" style='font-size:16px;' value="Add to cart">
						</form>
					</div>
				</div>
				<h2><?php echo $result['productName'] ?></h2>
				<p><?php echo $fm->textShorten($result['product_desc'], 50); ?></p>
				<p><span class="price"><?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?></span></p>
			</div>
			<?php
				}
					} else {
						echo 'Key Not Avaiable';
					}
				}
			?>
		</div>
    </div>
 </div>
<?php
include 'inc/footer.php';
?>
