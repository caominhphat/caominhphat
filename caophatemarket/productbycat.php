<!-- ---------------------------------------- Insert header , slider vao web------------------------>

<?php
include 'inc/header.php';

?> 	

<!-- -------------------------------------------------------------------------------------------- -->

<!-- ---------------------------------------- Main----------------------------------------------- -->

 <div class="main">
    <div class="content">
	<?php
	     	 $name_cat = $cat->get_name_by_cat($id);
	      	 if($name_cat){
	      	 	while($result_name = $name_cat->fetch_assoc()){
	      	?>
    	<div class="content_top">
    		<div class="heading">
    		<h3>Category : <?php echo $result_name['catName'] ?> </h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<?php
			}}
			?>
	      <div class="section group">
		  <?php
	      	 $productbycat = $cat->get_product_by_cat($id);
	      	 if($productbycat){
	      	 	while($result = $productbycat->fetch_assoc()){
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'] ?>"><img  style="height:250px;width:250px;" src="admin/uploads/<?php echo $result['image'] ?>"  alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],50); ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></span></p>
				     <div class="button"><span><a href="?page=details&action=detailscreen&proid=<?php echo $result['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
			<?php
			}

		}else{
			echo 'The category has no products';
		}
			?>
			</div>

	
	
    </div>
 </div>
<!-- -------------------------------------------------------------------------------------------- -->

 <!-- ---------------------------------------- Insert footer vao web------------------------------------>
<?php
include 'inc/footer.php';
?> 	               