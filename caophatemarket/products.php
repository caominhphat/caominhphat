<!-- ---------------------------------------- Insert header , slider vao web------------------------>

<?php
include 'inc/header.php';

?>
<!-- -------------------------------------------------------------------------------------------- -->

<!-- ---------------------------------------- Main----------------------------------------------- -->

 <div class="main">
    <div class="content">
	<?php
$get_all_brand = $product->show_all_brand();
if ($get_all_brand) {
    while ($result = $get_all_brand->fetch_assoc()) {

        ?>
    	<div class="content_bottom">
    		<div class="heading">
    		<h3>Latest from <?php echo $result["brandName"]; ?></h3>
    		</div>

    		<div class="clear"></div>
    	</div>

		
	      <div class="section group">
		  <?php 
			$get_all_product_of_brand = $product->show_all_product_of_brand($result["brandId"]);
			if($get_all_product_of_brand){
				while($result1 = $get_all_product_of_brand->fetch_assoc()){

				
		?>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="?page=details&action=detailscreen&proid=<?php echo $result1['productId'] ?>"><img style="height:300px;" src="admin/uploads/<?php echo $result1['image'] ?>" width="150px" alt="" /></a>
					 <h2><?php echo $result1['productName'] ?></h2>
					 <p><span class="price"><?php echo $fm->format_currency($result1['price'])." "."VNĐ" ?></span></p>
					 <div class="button"><span><a href="?page=details&action=detailscreen&proid=<?php echo $result1['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php 
				}
			}
			?>
			</div>
			
			<?php
}
}
?>

    </div>
 </div>
<!-- -------------------------------------------------------------------------------------------- -->

 <!-- ---------------------------------------- Insert footer vao web------------------------------------>
<?php
include 'inc/footer.php';
?>