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



<!-- <div class="topnav">
    <div class=" bg-dark"><a> <img src="images/log.png" alt="" style="width:70px; "></a>    <a class="navbar-brand" href="#">WonderHouse</a>
</div>

   
          <div class="topnav-right">
      <a class="" href="#home">Home</a> -->

    <!-- <a class="" href="sell.php">sell prodeuct</a>
     <a class="" href="#home">View Brand</a>
    <a href="contact.php">FAQ</a>
  </div>
</div> --> 
  <div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	<!--   <li><a href="index.php">Home</a></li>
 -->	   <?php
				  if(isset($_GET['seid'])){
					  $slrId = Session :: get("slrId");
					  $delData= $ct->delCustomerCart();
					  $delComp= $pd->delCompareData($slrId);
					  Session::destroy();
				  }
				  ?>
		
		   <?php 
           $selllogin = Session :: get("sellogin");
           if($selllogin == false){ ?>
           <li> <a href="selllogin.php">Login</a>	 </li>
		   <?php }else{ ?>
		   <li> <a href="?seid=<?php Session :: get('slrId')?>">Logout</a>  </li>
		   <?php  }
	       ?>
           
           <?php
	  $selllogin=Session :: get("sellogin");
	  if($selllogin==true){ ?>
		<li><a href="sellerprofile.php">Profile</a> </li>  
	  <?php }
	  ?>
	 
		  <!-- <li><a href="category.php">Category</a> </li>
	  <li><a href="contact.php">Contact</a> </li>
	 
 -->	  <div class="clear"></div>
	</ul>
</div>
<!-- <div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange11">
	<li><a href="admin/login.php" target="_blank">Admin</a> </li>
	  <div class="clear"></div>
	</ul>
</div> --!>
