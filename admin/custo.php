<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helper/format.php';?>
<?php 
$pd= new Product();
$fm= new Format();
?>
<?php
if (isset($_GET['delpro'])){
	$id= $_GET['delpro'];
    $delpro = $pd->delcusById($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Customer List</h2>
        <div class="block">  
		<?php
				if(isset($delpro)){
					echo $delpro;
				}
		?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Customer Name</th>
					<th>Address</th>
					<th>City</th>
					<th>Country</th>
					<th>ZIP</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$getPd = $pd->getAllCustomer();
			// $getPd=$pd->getCustomerData($id);
			if($getPd){
			$i=0;
			while ($result = $getPd->fetch_assoc()){
			$i++;
						
			?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['name']; ?></td>
					<td><?php echo $result['address']; ?></td>
				    <td><?php echo $result['city']; ?></td>
					<td><?php echo $result['country']; ?></td>
										<td><?php echo $result['zip']; ?></td>

					<td><?php echo $result['phone']; ?></td>
					<td><?php echo $result['email']; ?></td>


					<td>
					<a onclick="return confirm('Are You Sure To Delete?')" 
					href="?delpro=<?php echo $result['id']; ?>">Delete</a></td>
				</tr>
			<?php } } ?>	
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
