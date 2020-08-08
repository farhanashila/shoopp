<?php 
     include 'library/session.php';
     Session::init();
	 include 'library/database.php';
     include 'helper/format.php';
	 
	 spl_autoload_register(function($class){
		 include_once "classes/".$class.".php";
	 });
	     $db = new Database();
         $fm = new Format();
		 $pd = new Product();
		 $cat = new Category();
		 $ct = new Cart();
		 $cmr = new Customer();
		 $slr = new seller();
	 
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script> 
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
<style>
.body{margin:;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #008080		;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 8px 12px;
  text-decoration: none;
  font-size: 12px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav-right {
  float: right;}
</style>

</head>
<body>



<div class="topnav">
    <div class=" bg-dark"><a> <img src="images/log.png" alt="" style="width:70px; "></a>    <a class="navbar-brand" href="#">WonderHouse</a>
</div>

   
          <div class="topnav-right">
     <!-- <a class="" href="#home">Home</a> -->

    <a class="" href="contact.php">Customer Care</a>
     <a class="" href="viewbrand.php">View Brand</a>
    <a href="faq.php">FAQ</a>
      <div class="topnav-right">
		   <?php 
           $login = Session :: get("cuslogin");
           if($login == false){ ?>
           <a href="login.php"> Login / Signup</a></div>	
		   <?php }else{ ?>
		   <a href="?cid=<?php Session :: get('cmrId')?>">Logout</a></div>  
		   <?php  }
	       ?>

		 <div class="clear"></div>

  </div>
</div>
  <div class="wrap">
		<div class="header_top">
			<!-- <div class="logo">
				<a href="index.php"><img src="images/log.png" alt="" /></a>
			</div>
 -->			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="get">
				    	<input type="text" name="search"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"> <input type="submit" name="submit "value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">
								<?php
								$getData =$ct->checkCartTable();
								if($getData){
								$sum = Session::get("sum");
								$qty = Session::get("qty");
								echo "Tk.".$sum." | Q: ".$qty;
								}else{
									echo "(Empty)";
								}
								
								?>
								</span>
							</a>
						</div>
			      </div>
				  <?php
				  if(isset($_GET['cid'])){
					  $cmrId = Session :: get("cmrId");
					  $delData= $ct->delCustomerCart();
					  $delComp= $pd->delCompareData($cmrId);
					  Session::destroy();
				  }
				  ?>
		 	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <?php
	  $chkCart= $ct->checkCartTable();
	  if($chkCart){ ?>
		<li><a href="cart.php">Cart</a></li>  
		<li><a href="payment.php">Payment</a></li>  
	  <?php }
	  ?>
	  <?php
	  $cmrId = Session :: get("cmrId");
	  $chkOrder= $ct->checkOrder($cmrId);
	  if($chkOrder){ ?>
		<li><a href="orderdetails.php">Order</a></li>  
	  <?php }
	  ?>
	  <?php
	  $login=Session :: get("cuslogin");
	  if($login==true){ ?>
		<li><a href="profile.php">Profile</a> </li>  
	  <?php }
	  ?>
	  <?php 
      $getPd = $pd->getComparedData($cmrId);
      if($getPd){
	  ?>
	  <li><a href="compare.php">Compare</a> </li>
	  <?php } ?>
	  	  <?php 
      $checkwlist = $pd->checkWlistData($cmrId);
      if($checkwlist){
	  ?>
	  <li><a href="wishlist.php">Wish List</a> </li>
	  <?php } ?>
	  <li><a href="category.php">Category</a> </li>
	  <li><a href="contact.php">Contact</a> </li>
	 
	  <div class="clear"></div>
	</ul>
</div>
<!-- <div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange11">
	<li><a href="admin/login.php" target="_blank">Admin</a> </li>
	  <div class="clear"></div>
	</ul>
</div> --!>
