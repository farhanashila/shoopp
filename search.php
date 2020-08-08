<?php include 'inc/header.php';?>
<?php 
if(!isset($_GET['search']) || $_GET['search'] == NULL){
	echo "<script>window.location = 'writesome.php'; </script>";
}else{
	$search= $_GET['search'];
}
?>
<style>
.section h1 {
	width:500px;
	margin-left:250px;
    border-bottom: 1px solid #ddd;
    margin-bottom: 80px;
	margin-top: 80px;
    padding-bottom: 10px;
	text-align:center;
	font-size:25px;
	background: Green; none repeat scroll 0 0;border-radius:5px;color:#fff;padding: 5px 30px;
}
</style>


 <div class="section group">
			 <?php
				$query = "SELECT * FROM tbl_product WHERE productName LIKE '%$search%'";
				$post = $db->select($query);
				if($post){
					while($result = $post->fetch_assoc()){
?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2> <?php echo $result['productName']; ?> </h2>
					 <p><?php echo $fm->textShorten($result['body'], 60); ?></p>
					 <p><span class="price">Tk.<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>

			<?php } }else{ ?>
			<h1> Your Product Is Not Available </h1>
			<?php } ?>
				</div>
 <?php include 'inc/footer.php';?>
			 
