<?php include 'inc/header.php';?>
<?php 
$login = Session :: get("cuslogin");
if($login == true){
header("Location:order.php");	
}
?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
	$custLogin=$cmr->customerLogin($_POST);
    }
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
		 <?php 
				if(isset($custLogin)){
					echo $custLogin;
				}
		?>
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post" id="member">
                	<input name="email" placeholder="Email" type="text">
                    <input name="pass" placeholder="Password" type="password"/>
					<div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
                    </div>
                 </form>
					
				<?php 
				$name = $address = $city = $country = $zip = $phone = $email = $pass = "";
                $errname = $erraddress = $errcity = $errcountry = $errzip = $errphone = $erremail = $errpass = "";				
				if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
					If(empty($_POST['name'])){
						$errname= "<p style='color:red'>*Name Is Required</p>";
					}elseif(!preg_match("/^[a-zA-Z ]*$/", $_POST['name'])){
						$errname= "<p style='color:red'>*Olny Letter And White Space Allowed</p>";
					}
					else{
					    $name=$_POST['name'];
					}
					
					If(empty($_POST['address'])){
						$erraddress= "<p style='color:red'>*Address Is Required</p>";
					}else{
					    $address=$_POST['address'];
					}
					
					If(empty($_POST['city'])){
						$errcity= "<p style='color:red'>*City Is Required</p>";
					}elseif(!preg_match("/^[a-zA-Z ]*$/", $_POST['city'])){
						$errcity= "<p style='color:red'>*City Name Must Be Letters!</p>";
					}
					else{
					    $city=$_POST['city'];
					}
					
					If(empty($_POST['country'])){
						$errcountry= "<p style='color:red'>*Country Is Required</p>";
					}elseif(!preg_match("/^[a-zA-Z ]*$/", $_POST['country'])){
						$errcountry= "<p style='color:red'>*Country Name Must Be Letters!</p>";
					}
					else{
					    $country=$_POST['country'];
					}
					
					If(empty($_POST['zip'])){
						$errzip= "<p style='color:red'>*Zip-Code Is Required</p>";
					}elseif(!is_numeric($_POST['zip']))
						{
					    $errzip= "<p style='color:red'>*Zip-Code Must Have Digits</p>";
						}
					else{
					    $zip=$_POST['zip'];
					}
					
					If(empty($_POST['phone'])){
						$errphone= "<p style='color:red'>*Phone No Is Required</p>";
					}elseif(!is_numeric($_POST['phone']))
						{
					    $errphone= "<p style='color:red'>*Phone No Must Have Digits</p>";
						}
					else{
					    $phone=$_POST['phone'];
					}
					
					If(empty($_POST['email'])){
						$erremail= "<p style='color:red'>*Email Address Is Required</p>";
					}elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
						$erremail= "<p style='color:red'>*Invalid Email Format</p>";
					}
					else{
					    $email=$_POST['email'];
					}
					
					If(empty($_POST['pass'])){
						$errpass= "<p style='color:red'>*Password Is Required</p>";
					}else{
					    $pass=md5($_POST['pass']);
					}
					$customerReg=$cmr->customerRegistration($name,$address,$city,$country,$zip,$phone,$email,$pass);
					
				}
				?>
					
    	<div class="register_account">
		<?php 
				if(isset($customerReg)){
					echo $customerReg;
				}
		?>
    		<h3>Register New Account</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<p style="color:red">*All Fields Are Required</p>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name*"/><?php echo $errname;?>
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City*"/><?php echo $errcity;?>
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Zip-Code*"/><?php echo $errzip;?>
							</div>
							<div>
								<input type="text" name="email" placeholder="Email*"/><?php echo $erremail;?>
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Address*"/><?php echo $erraddress;?>
						</div>
						<div>
							<input type="text" name="country" placeholder="Country*"/><?php echo $errcountry;?>
						</div>
		           <div>
		          <input type="text" name="phone" placeholder="Phone*" /><!-- type="tel" pattern="[0-9]{13}" title="Must have 13 digit including country code" required --> <?php echo $errphone;?>
		          </div>
				  
				  <div>
					<input type="text" name="pass" placeholder="Password*"/><!-- type="password"  pattern=".{6,20}" title="password must be 6 to 20 characters"--> <?php echo $errpass;?>
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php include 'inc/footer.php';?>