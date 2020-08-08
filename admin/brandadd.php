<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php 
$brand = new Brand();
if ($_SERVER['REQUEST_METHOD']== 'POST'){
	$brandName=$_POST['brandName'];
    $address=$_POST['address'];

    $type=$_POST['type'];

	$InsertBrand =$brand->brandInsert($brandName,$type,$address);

}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
               <div class="block copyblock"> 
			   <?php
			   if(isset($InsertBrand))
			   {
				   echo $InsertBrand;
			   }
			   
			   ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name= "brandName" placeholder="Enter Brand Name..." class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <input type="text" name= "address" placeholder="Enter Brand Address..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                                 
             <select class="form-control" id="type" name="type" required="" placeholder="Enter type">
             <option>personal</option>
             <option>Bussiness</option>
                            </td>
                        </tr>

						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>