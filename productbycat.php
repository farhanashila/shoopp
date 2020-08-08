<?php include 'inc/header.php';?>
<?php
if(!isset($_GET['catId']) || $_GET['catId'] == NULL){
	echo "<script>window.location = '404.php'; </script>";
}else{
	$id= preg_replace('/[^-a-zA-z0-9_]/', '', $_GET['catId']);
}
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from Category</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		  <?php
		  $productbycart = $pd->productByCart($id);
		  if($productbycart){
		  while($result = $productbycart->fetch_assoc()){
		  ?>
				<div class="grid_1_of_4 images_1_of_4">
					  <a href="details.php?proid=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					  <h2> <?php echo $result['productName']; ?> </h2>
					 <p><?php echo $fm->textShorten($result['body'], 60); ?></p>
					 <p><span class="price">Tk.<?php echo $result['price']; ?></span></p>  
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
		  <?php } }else{
			  header("Location:404.php");
			  //echo "Products Of This Category Are Not Avaiable !";
		  }

		  ?>
			</div>
    </div>
 </div>

<?php include 'inc/footer.php';?>