<?php 
     $filepath = realpath(dirname(__FILE__));
	 include_once ($filepath.'/../library/database.php');
	 include_once ($filepath.'/../helper/format.php');
?>
<?php

class Cart{
        private $db;
        private $fm;
    public function __construct(){
        $this->db=new Database();
        $this->fm=new Format();
    }
	public function addToCart($quantity,$id){
	$quantity= $this->fm->validation($quantity);
    $quantity = mysqli_real_escape_string($this->db->link,$quantity);
	$productId = mysqli_real_escape_string($this->db->link,$id);
	$sId= session_id();
	
	$squery = "SELECT * FROM tbl_product WHERE productId = '$productId'";
	$result = $this->db->select($squery)->fetch_assoc();
	
    $productName = $result['productName'];
	$price = $result['price'];
	$image = $result['image'];
	
	$chquery = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId = '$sId'";
	$getPro = $this->db->select($chquery);
	if($getPro){
	$msg = "Product Already Added !";
    return $msg;
	}else{
	$query= "INSERT INTO tbl_cart(sId, productId, productName, price, quantity, image) VALUES('$sId', '$productId', '$productName', '$price', '$quantity', '$image') ";
    $inserted_row = $this->db->insert($query);
		if($inserted_row){
			header("Location:cart.php");
		}else{
			header("Location:404.php");
		}
	}
	}
	public function getCartProduct(){
	  $sId= session_id();
	  $query="SELECT * FROM tbl_cart WHERE sId ='$sId'";
	  $result = $this->db->select($query);
      return $result;	 
	   
	}
	public function updateCartQuantity($cartId,$quantity){
	$cartId = mysqli_real_escape_string($this->db->link,$cartId);
    $quantity = mysqli_real_escape_string($this->db->link,$quantity);	
	$query =   "UPDATE tbl_cart
				SET
				quantity='$quantity'
				WHERE cartId='$cartId'";
				$updated_row= $this->db->update($query);
				if($updated_row){
					header("Location:cart.php");
				}else{
					$msg="<span class='error'> Quantity Not Updated !</span>";
				    return $msg;
				}
	}
	public function delProductByCart($delId){
		$delId = mysqli_real_escape_string($this->db->link,$delId);
		$query= "DELETE FROM tbl_cart WHERE cartId='$delId'";
		$deldata = $this->db->delete($query);
		if($deldata){
	    echo "<script>window.location = 'cart.php'; </script>";
		}else{
		$msg="<span class='error'> Product Not Deleted !</span>";
	    return $msg;
	    }
	}
	public function checkCartTable(){
		
		$sId= session_id();
	    $query="SELECT * FROM tbl_cart WHERE sId ='$sId' ";
	    $result = $this->db->select($query);
        return $result;
	}
	public function delCustomerCart(){
		$sId= session_id();
		$query= "DELETE FROM tbl_cart WHERE sId='$sId'";
		$deldata = $this->db->delete($query);
	}
    public function OrderProduct($cmrId){
	$sId= session_id();
	    $query="SELECT * FROM tbl_cart WHERE sId ='$sId'";
	    $getPro = $this->db->select($query);
    if($getPro){
	while($result= $getPro->fetch_assoc()){
	$productId = $result['productId'];
	$productName = $result['productName'];
	$quantity = $result['quantity'];	
	$price = $result['price'] * $quantity;
    $image = $result['image'];
	$query= "INSERT INTO tbl_order(cmrId, productId, productName, quantity, price, image) VALUES('$cmrId', '$productId', '$productName', '$quantity', '$price', '$image')";
    $inserted_row = $this->db->insert($query);	
	}
    }		
	}
	 
	public function payableAmount($cmrId){
	$query="SELECT price FROM tbl_order WHERE cmrId ='$cmrId' AND date = NOW()";
	$result = $this->db->select($query);
    return $result;	
	}
	public function getOrderedProduct($cmrId){
	$query="SELECT * FROM tbl_order WHERE cmrId ='$cmrId' ORDER BY date DESC";
	$result = $this->db->select($query);
    return $result;		
	}
	public function checkOrder($cmrId){
	    $query="SELECT * FROM tbl_order WHERE cmrId ='$cmrId'";
	    $result = $this->db->select($query);
        return $result;	
	}
	public function getAllOrderProduct(){

		$query="SELECT o.*,p.pquantity FROM tbl_order as o ,tbl_product as p where o.productId=p.productId
		 ORDER BY date";
	    $result = $this->db->select($query);
        return $result;	
	}
	public function productShifted($id, $time, $price){
	$id = mysqli_real_escape_string($this->db->link,$id);
    $time = mysqli_real_escape_string($this->db->link,$time);
	$price = mysqli_real_escape_string($this->db->link,$price);


	// $query =   "UPDATE tbl_order
	// 			SET
	// 			status='1'
	// 			WHERE cmrId ='$id' AND date='$time' AND price= '$price'";
	// 			$updated_row= $this->db->update($query);
	// 			if($updated_row){
	// 				$msg="<span class='success'>Updated Successfully.</span>";
	// 			    return $msg;
	// 			}else{
	// 				$msg="<span class='error'>Not Updated !</span>";
	// 			    return $msg;
		// }
	$query =   "UPDATE tbl_product p
                 INNER JOIN tbl_order o ON p.productId = o.productId
                SET o.status='1' , p.pquantity = (p.pquantity-o.quantity) WHERE o.cmrId ='$id' AND o.date='$time' AND o.price= '$price' AND p.pquantity>=o.quantity";
				$updated_row= $this->db->update($query);
				if($updated_row){
					$msg="<span class='success'>Product can be shifted if Available.</span>";
				    return $msg;
				 }
				else{
					$msg="<span class='error'>Not Updated !</span>";
				    return $msg;
		}
	}
	public function delProductShifted($id, $time, $price){
    $id = mysqli_real_escape_string($this->db->link,$id);
    $time = mysqli_real_escape_string($this->db->link,$time);
	$price = mysqli_real_escape_string($this->db->link,$price);	
	$query =   "UPDATE tbl_order
				SET
				status='2'
				WHERE cmrId ='$id' AND date='$time' AND price= '$price'";
				$updated_row= $this->db->update($query);
	$query= "DELETE from tbl_order WHERE cmrId ='$id' AND date='$time' AND price= '$price'";

		$deldata = $this->db->delete($query);
		if($deldata){

					$msg="<span class='success'>Data Deleted Successfully.</span>";
				    return $msg;
				}else{
					$msg="<span class='error'> Data Not Deleted !</span>";
				    return $msg;
		}
	}
	public function delProductSell($id, $time, $price){
    $id = mysqli_real_escape_string($this->db->link,$id);
    $time = mysqli_real_escape_string($this->db->link,$time);
	$price = mysqli_real_escape_string($this->db->link,$price);	
	
	$query= "DELETE from tbl_sale WHERE cmrId ='$id' AND date='$time' AND price= '$price'";

		$deldata = $this->db->delete($query);
		if($deldata){

             // echo "<script>window.location = 'search.php'; </script>";

					$msg="<span class='success'>Data Deleted Successfully.</span>";
				    return $msg;

				}else{
					$msg="<span class='error'> Data Not Deleted !</span>";
				    return $msg;
		}
	}
	public function productShiftConfirm($id, $time, $price){
		$id = mysqli_real_escape_string($this->db->link,$id);
    $time = mysqli_real_escape_string($this->db->link,$time);
	$price = mysqli_real_escape_string($this->db->link,$price);
	$query =   "UPDATE tbl_order
				SET
				status='2'
				WHERE cmrId ='$id' AND date='$time' AND price= '$price'";
				$updated_row= $this->db->update($query);
				if($updated_row){


					$msg="<span class='success'>Updated Successfully.</span>";
				    return $msg;
				}
			
				else{
					$msg="<span class='error'>Not Updated !</span>";
				    return $msg;
		}
	}
	// problem
	 public function SaleProduct($cmrId){
	//  	$sId= session_id();
	//     $query="SELECT * FROM tbl_order WHERE status ='1'";
	//     $getPro = $this->db->select($query);
 //    if($getPro){
	// while($result= $getPro->fetch_assoc()){
	// $productId = $result['productId'];
	// $productName = $result['productName'];
	// $quantity = $result['quantity'];	
	// $price = $result['price'];
 //    $image = $result['image'];
 //    $date=$result['date'];
	// $query= "INSERT INTO tbl_sale(cmrId, productId, productName, quantity, price, image,date) VALUES('$cmrId', '$productId', '$productName', '$quantity', '$price', '$image','$date')";
 //    $inserted_row = $this->db->insert($query);	
	// }
 //    }		
	// }

	 $sId= session_id();
	    $query="SELECT * FROM tbl_order where status='1' ";
	    $Pro = $this->db->select($query);
    if($Pro){
	while($result= $Pro->fetch_assoc()){
	$productId = $result['productId'];
	$productName = $result['productName'];
	$quantity = $result['quantity'];	
	$price = $result['price'];
    $image = $result['image'];
    $date= $result['date'];
     $chquery = "SELECT * FROM tbl_sale WHERE productId = '$productId' AND date = '$date' AND cmrId=$cmrId";
 $getPro = $this->db->select($chquery);
	 if($getPro){
	 $msg = "Product Already Added !";
     return $msg;
	 }
	 else{
	$query= "INSERT INTO tbl_sale(cmrId, productId, productName, quantity, price, image,date) VALUES('$cmrId', '$productId', '$productName', '$quantity', '$price', '$image','$date') ";
    $inserted_row = $this->db->insert($query);	
	}
    }	
 }
    else {$msg="not available"	;
return $msg;
}
	}

public function getAllSaleProduct(){

		$query="SELECT * FROM tbl_sale 
		 ORDER BY date";
	    $result = $this->db->select($query);
        return $result;	
	}

	public function addTocm($id){
	
	$cmntId = mysqli_real_escape_string($this->db->link,$id);
	$sId= session_id();
	
	
	$query= "INSERT INTO tbl_cart(sId, cmntId, cmnt) VALUES('$sId', '$cmntId', '$cmnt')";
    $inserted_row = $this->db->insert($query);
		if($inserted_row){
			header("Location:se.php");
		}else{
			header("Location:404.php");
		}
	}

	 public function Cmnt($cmrId){
	$sId= session_id();
	    $query="SELECT * FROM tbl_cm WHERE sId ='$sId'";
	    $getPro = $this->db->select($query);
    if($getPro){
	while($result= $getPro->fetch_assoc()){
	$cmntId = $result['cmntId'];
	$cmnt = $result['cmnt'];
	$query= "INSERT INTO tbl_cmnt(cmrId, cmntId, cmnt, quantity) VALUES('$cmrId', '$cmntId', '$cmnt')";
    $inserted_row = $this->db->insert($query);	
	}
    }		
	}
	public function getComment($cmrId){
	$query="SELECT * FROM tbl_cmnt WHERE cmrId ='$cmrId' ORDER BY date DESC";
	$result = $this->db->select($query);
    return $result;		
	}


}
?>