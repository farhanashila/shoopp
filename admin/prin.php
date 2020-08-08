<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
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

<?php

                 
                 $id="";
                 $cmrId="";
                $productId ="" ;
                $productName = "";
                $date = "";
                $image = "";
                $quantity ="";
                $price = "";


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>school</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <style>
      body{
  background-image: url("back.jpeg");
  background-size: cover;
  background-repeat: no-repeat;
}
h4{
  text-align: center;
}
section
{
  text-align: center;
}
</style>
</head>

<body> 





  

<div class="grid_10">
            <div class="box round first grid">

  
<div class="container">
    
         <hr>
              <div class="text-center text-primary">
                <h4 >Sale Information</h4>
                <?php
        if(isset($delOrder)){
          echo $delOrder;
        }
    ?>
              </div>
              <hr>
        <table class="data display datatable" id="example">
      <thead>
        <tr>
           <th>Order N0.</th>
          <th>Product</th>
          <th>Order Time </th>
          <th>Image</th>
          <th>Quantity</th>
          <th>Price</th>
          <!-- <th>Cutomer ID</th> -->

          <th>Customer Details</th>
          <th>Action</th>
                 </tr>
      </thead>

      <?php if(isset($_POST['Find']))
{
       
    try {
        $dsn = new PDO("mysql:host=localhost;dbname=db_shop","root","");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
    
    $date = $_POST['date'];
    $Time1="00:00:00";
    $Time2="23:59:59";
     $pdoQuery = "SELECT * FROM tbl_sale WHERE date(date) = :date";
   
    
    $pdoResult = $dsn->prepare($pdoQuery);
    
    
    $pdoExec = $pdoResult->execute(array(":date"=>$date ));
  
    if($pdoExec)
    {
            
        if($pdoResult->rowCount()>0)
        { 

            foreach($pdoResult as $row)
            {
              ?>
              <tbody>
           <tr><td>
           <?php 
            echo "#".$id=$row['id'];?></td>

             <!-- <td><?php   echo  $cmrId = $row['cmrId'];?></td> -->
               <td><?php echo $productName = $row['productName'];?></td>

            <td>   <?php echo $fm->formatDate( $date = $row['date']);?></td>
             <td><img src="<?php echo $image=$row['image']; ?>" height="40px" width="60px"/></td>
              <td><?php echo  $quantity = $row['quantity'];?></td>
             <td><?php  echo  $price = $row['price'];?></td>
             <td><a href="customer.php?custId=<?php echo $cmrId=$row['cmrId'];?>">View Details</a></td>

            <td><a href="?delproid=<?php echo $cmrId;?>&price=<?php echo $price;?>&time=<?php echo $date;?>">delete</a></td>


         <?php   }
        }
           
        else{
            echo 'No Data With This ID';
        }
    }else{
        echo 'ERROR Data Not Inserted';
    }
}

?>
                        

      <!-- <tbody>
           <tr>
            
              <td>#order<?php echo $id ;?></td>
              <td> <?php echo $productName;?></td>
              <td> <?php echo $fm->formatDate ($date);?></td>
              <td><img src="<?php echo $image; ?>" height="40px" width="60px"/></td>
              <td> <?php echo $quantity;?></td> 
              <td> <?php echo $price;?></td> -->
              <!-- <td><?php echo $cmrId;?></td>
             <td><a href="customer.php?custId=<?php echo $cmrId;?>">View Details</a></td>
    </tr>
 -->             </tbody>
        </table>
    

        </div>
        </br>
         </br>
          </br>
        <button style="margin-left: 45%;margin-top: 5%" onclick="window.print()">Print this page</button>
               

</section>

                <br>

      </div>
      
      

    </div>
  

    </body>

</html>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
    setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>