<?php include 'inc/header.php';?>
<?php 
$login = Session :: get("cuslogin");
if($login == false){
header("Location:login.php");	
}
?>
<style>
.payment{width:500px;min-height:230px;text-align:center;border:1px solid #ddd;margin-left:385px;padding:50px;}
.payment h2 {
    border-bottom: 1px solid #ddd;
    margin-bottom: 80px;
    padding-bottom: 10px;
}
.payment a {

    background: #135a50;
    border-radius: 5px;
    color: #fff;
    font-size: 25px;
    padding: 5px 30px;

}
.back a{width:160px;margin:5px auto 0;padding: 7px 0;text-align: center;display: block;background:#135c6f;border 1px solid #333; color:#fff; border-radius:30px;font-size:25px;}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
		<div class= "payment">
		<h2>Choose Payment Option</h2>
		<a href="paymentoffline.php">Cash On Delivery</a>
		<a href="paymentonline.php">Pay Now</a>
 	    </div>
		<div class="back">
		<a href="cart.php">Go Back</a>
 		</div>
 	</div>
 	</div>
    <?php include 'inc/footer.php';?>
