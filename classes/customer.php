<?php 
     $filepath = realpath(dirname(__FILE__));
	 include_once ($filepath.'/../library/database.php');
	 include_once ($filepath.'/../helper/format.php');
?>

<?php

class Customer{
        private $db;
        private $fm;
    public function __construct(){
        $this->db=new Database();
        $this->fm=new Format();
    }
	
public function customerRegistration($name,$address,$city,$country,$zip,$phone,$email,$pass){
	$name= $this->fm->validation($name);
	$address= $this->fm->validation($address);
    $city= $this->fm->validation($city);
	$country= $this->fm->validation($country);
	$zip= $this->fm->validation($zip);
	$phone= $this->fm->validation($phone);
	$email= $this->fm->validation($email);
	$pass= $this->fm->validation($pass);
	
	$name = mysqli_real_escape_string($this->db->link,$name);
	$address = mysqli_real_escape_string($this->db->link,$address);
	$city = mysqli_real_escape_string($this->db->link,$city);
	$country = mysqli_real_escape_string($this->db->link,$country);
	$zip = mysqli_real_escape_string($this->db->link,$zip);
	$phone = mysqli_real_escape_string($this->db->link,$phone);
	$email = mysqli_real_escape_string($this->db->link,$email);
	$pass = mysqli_real_escape_string($this->db->link,$pass);
	
	
	if($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "" || $pass == ""){
		    $msg="<span class='error'> Fields must not be empty ! </span>";
            return $msg;
	}
	$mailquery="SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
	$mailchk = $this->db->select($mailquery);
	if($mailchk !=false){
		$msg="<span class='error'> Email Already Exist ! </span>";
        return $msg;
	}else{
		$query= "INSERT INTO tbl_customer(name, address, city, country, zip, phone, email, pass) VALUES('$name', '$address', '$city', '$country', '$zip', '$phone', '$email', '$pass')";
		$inserted_row = $this->db->insert($query);
		if($inserted_row){
			$msg="<span class='success'>Successfully Registered.</span>";
			return $msg;
		}else{
			$msg="<span class='error'> Customer Data  Not Inserted !</span>";
		    return $msg;
		}
	}
}
public function customerLogin($data){
	$email = mysqli_real_escape_string($this->db->link, $data['email']);
	$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));
	if(empty($email) || empty($pass)){
	$msg="<span class='error'> Fields must not be empty ! </span>";
    return $msg;	
	}
	$query = "SELECT * FROM tbl_customer WHERE email='$email' AND pass='$pass'";
	$result = $this->db->select($query);
	if($result != false){
	$value = $result->fetch_assoc();
    Session :: set("cuslogin",true);
    Session :: set("cmrId",$value['id']);
	Session :: set("cmrName",$value['name']);
	header("Location:cart.php");
	}else{
	$msg="<span class='error'> Email Or Password Not Matched ! </span>";
    return $msg;	
	}
}
public function getCustomerData($id){
	 $query="SELECT * FROM tbl_customer WHERE id ='$id'";
	 $result = $this->db->select($query);
     return $result;
	}
public function customerUpdate($data, $cmrId){
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
	$address = mysqli_real_escape_string($this->db->link, $data['address']);
	$city = mysqli_real_escape_string($this->db->link, $data['city']);
	$country = mysqli_real_escape_string($this->db->link, $data['country']);
	$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
	$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
	$email = mysqli_real_escape_string($this->db->link, $data['email']);
	
	if($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == ""){
		    $msg="<span class='error'> Fields must not be empty ! </span>";
            return $msg;
	}else{
		
		 $query =   "UPDATE tbl_customer
				SET
				name='$name',
				address='$address',
				city='$city',
				country='$country',
				zip='$zip',
				phone='$phone',
				email='$email'
				WHERE id='$cmrId'";
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