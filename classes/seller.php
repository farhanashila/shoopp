<?php 
     $filepath = realpath(dirname(__FILE__));
	 include_once ($filepath.'/../library/database.php');
	 include_once ($filepath.'/../helper/format.php');
?>

<?php

class seller{
        private $db;
        private $fm;
    public function __construct(){
        $this->db=new Database();
        $this->fm=new Format();
    }
	public function sellerRegistration($name,$type,$brandName,$address,$city,$country,$zip,$phone,$email,$pass){
	$name= $this->fm->validation($name);
    $type= $this->fm->validation($type);
	$brandName= $this->fm->validation($brandName);
	$address= $this->fm->validation($address);
    $city= $this->fm->validation($city);
	$country= $this->fm->validation($country);
	$zip= $this->fm->validation($zip);
	$phone= $this->fm->validation($phone);
	$email= $this->fm->validation($email);
	$pass= $this->fm->validation($pass);
	
	$name = mysqli_real_escape_string($this->db->link,$name);
	$type = mysqli_real_escape_string($this->db->link,$type);
	$brandName = mysqli_real_escape_string($this->db->link,$brandName);
	$address = mysqli_real_escape_string($this->db->link,$address);
	$city = mysqli_real_escape_string($this->db->link,$city);
	$country = mysqli_real_escape_string($this->db->link,$country);
	$zip = mysqli_real_escape_string($this->db->link,$zip);
	$phone = mysqli_real_escape_string($this->db->link,$phone);
	$email = mysqli_real_escape_string($this->db->link,$email);
	$pass = mysqli_real_escape_string($this->db->link,$pass);
	
	
	if($name == "" || $type == "" || $brandName == "" ||$address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "" || $pass == ""){
		    $msg="<span class='error'> Fields must not be empty ! </span>";
            return $msg;
	}
	$mailquery="SELECT * FROM tbl_seller WHERE email='$email' LIMIT 1";
	$mailchk = $this->db->select($mailquery);
	if($mailchk !=false){
		$msg="<span class='error'> Email Already Exist ! </span>";
        return $msg;
	}
	$namequery="SELECT * FROM tbl_seller WHERE brandName='$brandName' LIMIT 1";
	$namechk = $this->db->select($namequery);
	if($namechk !=false){
		$msg="<span class='error'> Brand Name Already Exist ! </span>";
        return $msg;
	}
	$phnquery="SELECT * FROM tbl_seller WHERE phone='$phone' LIMIT 1";
	$phnchk = $this->db->select($phnquery);
	if($phnchk !=false){
		$msg="<span class='error'> Phone Already Exist ! </span>";
        return $msg;
	}else{
		$query= "INSERT INTO tbl_seller(name,type,brandName, address, city, country, zip, phone, email, pass) VALUES('$name','$type','$brandName', '$address', '$city', '$country', '$zip', '$phone', '$email', '$pass')";
		$inserted_row = $this->db->insert($query);
		if($inserted_row){
			$msg="<span class='success'>Successfully Registered.</span>";
			return $msg;
		}else{
			$msg="<span class='error'> seller information  Not Inserted !</span>";
		    return $msg;
		}
	}
}
public function sellerLogin($data){
	$email = mysqli_real_escape_string($this->db->link, $data['email']);
	$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));

	if(empty($email) || empty($pass)){
	$msg="<span class='error'> Fields must not be empty ! </span>";
    return $msg;	
	}
	$query = "SELECT * FROM tbl_seller WHERE email='$email' AND pass='$pass'";
	$result = $this->db->select($query);

	if($result != false){
	$value = $result->fetch_assoc();
    Session :: set("sellogin",true);
    Session :: set("slrId",$value['id']);
	Session :: set("slrName",$value['name']);
	header("Location:se.php");
	}
	else{
	$msg="<span class='error'> Email Or Password Not Matched ! </span>";
    return $msg;	
	}
}
public function getsellerData($id){
	 $query="SELECT * FROM tbl_seller WHERE id ='$id'";
	 $result = $this->db->select($query);
     return $result;
	}
public function sellerUpdate($data, $slrId){
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		$type = mysqli_real_escape_string($this->db->link, $data['type']);
		$brandName = mysqli_real_escape_string($this->db->link, $data['brandName']);
	$address = mysqli_real_escape_string($this->db->link, $data['address']);
	$city = mysqli_real_escape_string($this->db->link, $data['city']);
	$country = mysqli_real_escape_string($this->db->link, $data['country']);
	$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
	$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
	$email = mysqli_real_escape_string($this->db->link, $data['email']);
	
	if($name == "" || $type == "" || $brandName == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == ""){
		    $msg="<span class='error'> Fields must not be empty ! </span>";
            return $msg;
	}else{
		
		 $query =   "UPDATE tbl_seller
				SET
				name='$name',
				type='$type',
                brandName='$brandName',

				address='$address',
				city='$city',
				country='$country',
				zip='$zip',
				phone='$phone',
				email='$email'
				WHERE id='$slrId'";
				$updated_row= $this->db->update($query);
				if($updated_row){
					$msg="<span class='success'>Your Data Updated Successfully.</span>";
				    return $msg;
				}else{
					$msg="<span class='error'> Your Data Not Updated !</span>";
				    return $msg;
				}
	}
	}
	
}
?>