
 <?php include 'inc/sellerhead.php';?>

<?php 
$selllogin = Session :: get("sellogin");
if($selllogin == false){
header("Location:selllogin.php");	
}
?>
<style>
.tblone{width: 550px; margin: 0 auto; border: 2px solid #ddd;}
.tblone tr td{text-align: justify;}
.tblone tr td h2{text-align: center;}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
		<?php
		$id=Session :: get("slrId");
		$getdata = $slr->getsellerData($id);
	    if($getdata){
	    while($result = $getdata->fetch_assoc()){
		?>
    	<table class="tblone"> 
		<tr>
		<td colspan="3"><h2>Your Profile Details</h2></td>
		</tr>
		<tr>
		<td width="20%">Name</td>
		<td width="5%">:</td>
		<td><?php echo $result['name']; ?></td>
		</tr>
		<tr>
		<td>Phone</td>
		<td>:</td>
		<td><?php echo $result['phone']; ?></td>
		</tr>
		<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo $result['email']; ?></td>
		</tr>
		<tr>
		<td>Bussiness Type</td>
		<td>:</td>
		<td><?php echo $result['type']; ?></td>
		</tr>

           <tr>
		<td>Brand name</td>
		<td>:</td>
		<td><?php echo $result['brandName']; ?></td>
		</tr>
		<tr>
		<td>Address</td>
		<td>:</td>
		<td><?php echo $result['address']; ?></td>
		</tr>
		

		<tr>
		<td>City</td>
		<td>:</td>
		<td><?php echo $result['city']; ?></td>
		</tr>
		<tr>
		<td>Zip-Code</td>
		<td>:</td>
		<td><?php echo $result['zip']; ?></td>
		</tr>
		<tr>
		<td>Country</td>
		<td>:</td>
		<td><?php echo $result['country']; ?></td>
		</tr>
		<tr>
		<td></td>
		<td></td>
		<td><a href="editsellerprofile.php">Update Details</a></td>
		</tr>
		</table>
 		<?php } } ?>		
 		</div>
 	</div>
 	</div>
	<?php include 'inc/footer.php';?>