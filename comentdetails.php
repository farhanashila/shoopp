<?php include 'inc/header.php';?>
<?php 
$login = Session :: get("cuslogin");
if($login == false){
header("Location:login.php");	
}
?>
<?php
if(isset($_GET['customerId'])){
	$id = $_GET['customerId'];
	$time = $_GET['time'];
	$confirm = $ct->commentShiftConfirm($id, $time);
}
?>
 <div class="main">
    <div class="content">
     	<div class="section group">
		<div class="order">
		<h2>Your Comments</h2>
		<table class="tblone">
							<tr>
							    <th>No</th>
								<th>Comments</th>
								<th>Reply</th>
								<th>Date</th>
								<th>Status</th>
								<th>Action</th>
								<th>Order No</th>
							</tr>
							<?php
							$cmrId = Session :: get("cmrId");
							$getOrder = $ct->getComment($cmrId);
							if($getOrder){
							$i = 0;
			                while($result = $getOrder->fetch_assoc()){
							$i++;
							?>
							<tr>
							    <td><?php echo $i; ?></td>
								<td><?php echo $result['cmnt']; ?></td>
								
								<td><?php echo $result['reply']; ?></td>
							
								<td><?php echo $fm->formatDate($result['date']); ?></td>
								<td>
								<?php

								if($result['status']== '0'){
									echo "Pending";
								}elseif($result['status']== '1'){
                                 echo "Shifted";									
								 }else{
								echo "Ok";
								}
								?>
								</td>
								<?php
								if($result['status']== '1'){ ?>
								<td><a href="?customerId=<?php echo $cmrId;?>&time=<?php echo $result['date'];?>">Confirm</a></td>	
								<?php }elseif($result['status']== '2'){ ?>
								<td>Done</td>
								<?php }elseif($result['status']== '0'){ ?>
								<td>N/A</td>
								<?php } ?>
								<td>#Order<?php echo $result['id'];?></td>
							</tr>
							<?php } } ?>
						</table>
		</div>
		</div>
       <div class="clear"></div>
    </div>
 </div>
 <?php include 'inc/footer.php';?>