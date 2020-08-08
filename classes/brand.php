<?php 
     $filepath = realpath(dirname(__FILE__));
	 include_once ($filepath.'/../library/database.php');
	 include_once ($filepath.'/../helper/format.php');
?>

<?php 

class Brand{
	private $db;
    private $fm;
	
    public function __construct(){
        $this->db=new Database();
        $this->fm=new Format();
    }
	 public function brandInsert($brandName,$type,$address,$mobile,$ctime,$stime){
	$brandName= $this->fm->validation($brandName);
     $address= $this->fm->validation($address);
	$type= $this->fm->validation($type);
	$mobile= $this->fm->validation($mobile);
$ctime= $this->fm->validation($ctime);
$stime= $this->fm->validation($stime);


    $brandName = mysqli_real_escape_string($this->db->link,$brandName);
    $mobile = mysqli_real_escape_string($this->db->link,$mobile);
$ctime = mysqli_real_escape_string($this->db->link,$ctime);
$stime = mysqli_real_escape_string($this->db->link,$stime);

     $address = mysqli_real_escape_string($this->db->link,$address);
      $type = mysqli_real_escape_string($this->db->link,$type);



	if( empty($brandName && $type )){

            $msg="<span class='error'> Brand field must not be empty ! </span>";
            return $msg;
           if($type=='Bussiness' && empty($address))
            {

            		 $msg="<span class='error'>must not be empty ! </span>";
            		 return $msg;

            	}
            
        }else{
			$query = "INSERT INTO tbl_brand(brandName,type,ctime,stime,mobile,address) VALUES('$brandName','$type','$ctime','$stime','$mobile','$address')";
			$brandinsert = $this->db->insert($query);
			if($brandinsert){
				$msg="<span class='success'>Brand Name Inserted Successfully.</span>";
				return $msg;
			}else{
				$msg="<span class='error'> Brand Name Not Inserted !</span>";
				return $msg;
			}
		}
    }
	public function getAllBrand()
	{
		$query="SELECT * FROM tbl_brand ORDER BY brandId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getBrand()
	{
		$query="SELECT * FROM tbl_brand ORDER BY brandId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getBrandById($id)
	{
		$id = mysqli_real_escape_string($this->db->link,$id);
		$query="SELECT * FROM tbl_brand WHERE brandId= '$id' ";
		$result = $this->db->select($query);
		return $result;
	}
	public function brandUpdate($brandName,$type,$address,$ctime,$stime,$mobile,$id)
	{
				$brandName= $this->fm->validation($brandName);
				$type= $this->fm->validation($type);
                 $stime= $this->fm->validation($stime);
                 $ctime= $this->fm->validation($ctime);
                   $mobile= $this->fm->validation($mobile);

                 $address= $this->fm->validation($address);

    $brandName = mysqli_real_escape_string($this->db->link,$brandName);
    $type = mysqli_real_escape_string($this->db->link,$type);
   $stime = mysqli_real_escape_string($this->db->link,$stime);
$ctime = mysqli_real_escape_string($this->db->link,$ctime);
 $mobile = mysqli_real_escape_string($this->db->link,$mobile);

    $address = mysqli_real_escape_string($this->db->link,$address);

	$id = mysqli_real_escape_string($this->db->link,$id);
	if( empty($brandName && $type && $address)){
            $msg="<span class='error'> Brand field must not be Empty ! </span>";
            return $msg;
	}else{
	 $query =   "UPDATE tbl_brand
				SET
				brandName='$brandName',
				type='$type',
				stime='$stime',
				ctime='$ctime',
				mobile='$mobile',
				address='$address'
				WHERE brandId='$id'";
				$updated_row= $this->db->update($query);
				if($updated_row){
					$msg="<span class='success'>Brand Name Updated Successfully.</span>";

				    return $msg;
				    header("Location:brandlist.php");
				}else{
					$msg="<span class='error'> Brand Name Not Updated !</span>";
				    return $msg;
				}
	}

	}
	public function delBrandById($id)
	{
	$id = mysqli_real_escape_string($this->db->link,$id);
		$query= "DELETE from tbl_brand WHERE brandId='$id'";
		$deldata = $this->db->delete($query);
		if($deldata){
					$msg="<span class='success'>Brand Information Deleted Successfully.</span>";
				    return $msg;
				}else{
					$msg="<span class='error'> Brand Information Not Deleted !</span>";
				    return $msg;
				}	
		
	}
	
}


?>