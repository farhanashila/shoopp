<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/cart.php');
$ct = new Cart();
$fm = new Format();
?>
<?php
if(isset($_GET['shiftid'])){
	$id = $_GET['shiftid'];
	$time = $_GET['time'];
	$price = $_GET['price'];
	$shift = $ct->productShifted($id, $time, $price);
}
if(isset($_GET['delproid'])){
	$id = $_GET['delproid'];
	$time = $_GET['time'];
	$price = $_GET['price'];
	$delOrder = $ct->delProductSell($id, $time, $price);
}
?>
<html>
<style>
.sb-search {
  float: right;
  overflow: hidden;
}
.sb-search-submit{
	 height: 10px;
  margin: 0;
  /*z-index: 10;*/
  padding: 10px 20px 30px ;
  font-family: inherit;
  font-size: 20px;

}
.sb-search-input {
  border: none;
  outline: none;
  background: #ddd;
  /*width: 90%;*/
  height: 10px;
  margin: 0;
  z-index: 10;
  padding: 20px 55px 20px 20px;
  font-family: inherit;
  font-size: 20px;
  color: #2c3e50;

}
@media print {
  .printme  {
    display: block;
  }
  .no-printme  {
    display: none;
  }
  
}

</style>
<div class="printme">    
        <h2 style="text-align:center;margin-left:auto;margin-right:auto;display:block;margin-top:5%;margin-bottom:2%">Sale Information</h2>
        
		  <div style="text-align:center;">
 
            <table align="center" >
			<thead>
				<tr>
					<th>SL</th>
					<th>Order N0.</th>
					<th>Order Time </th>
					<th>Product</th>
					<th>Image</th>
					<th>Quantity</th>
					<th>Price</th>
						<!-- <th>Cutomer ID</th> -->

					<th>Cutomer Details</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
					$ct = new Cart();
					$fm = new Format();
					$getOrder = $ct->getAllSaleProduct();
					if($getOrder){
						$i=1;
					while($result= $getOrder->fetch_assoc()){
					?>
						<tr class="odd gradeX">
                             <td><?php echo $i++ ;?></td>
							<td>#Order<?php echo $result['id'];?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td><?php echo $result['productName'];?></td>
							<td><img src="<?php echo $result['image']; ?>" height="40px" width="60px"/></td>
							<td><?php echo $result['quantity'];?></td>
							<td>Tk.<?php echo $result['price'];?></td>
							 <!-- <td><?php echo $result['cmrId'];?></td>  -->
							<td><a href="customer.php?custId=<?php echo $result['cmrId'];?>">View Details</a></td>
							
							
							<?php } ?>
						</tr>
					<?php }  ?>
					</tbody>
					
				</table>
</div>
		</div>
		<div class="no-printme">
				<button style="margin-left: 45%;margin-top: 5%" onclick="window.print()">Print this page</button>
             </div>  
            

			
       
    

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
