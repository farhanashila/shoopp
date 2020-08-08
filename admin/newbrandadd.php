<style>
    form {
  max-width: 900px;
  display: block;
  margin: 0 auto;
}

</style>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php 
$brand = new Brand();
if ($_SERVER['REQUEST_METHOD']== 'POST'){
	$brandName=$_POST['brandName'];
    $address=$_POST['address'];

   $ctime=$_POST['ctime'];
$stime=$_POST['stime'];
$mobile=$_POST['mobile'];

    $type=$_POST['type'];

  $InsertBrand =$brand->brandInsert($brandName,$type,$address,$mobile,$ctime,$stime);
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
                    <form class="p-3">
  <div class="form-group">
    <label for="name">Name         :</label>
    <input type="text" class="form-control" id="name" name="brandName" size="40" placeholder="Enter Brand Name...">
  </div>
  
  <div class="form-group">
    <label for="seeAnotherField">Type of the bussiness:</label>
    <select class="form-control" id="seeAnotherField" name="type" >
          <option value="Personal">Personal</option>
          <option value="Bussiness">Business</option>
    </select>
  </div>
  <div class="form-group" id="otherFieldDiv">
    <label for="otherField">Address of the shop:</label>
    <input type="text" class="form-control" id="otherField" name="address" size="40" placeholder="27/4,Uttara,Dhaka-1230">
  </div>

  <div class="form-group" id="otherFieldDiv">
    <label for="stime">starting time:</label>
    <input type="time" class="form-control" id="stime" name="stime" size="40" placeholder="">
  </div>
  <div class="form-group" id="otherFieldDiv">
    <label for="ctime">clossing time:</label>
    <input type="time" class="form-control" id="ctime" name="ctime" size="40" placeholder="">
  </div>
<div class="form-group" id="otherFieldDiv">
    <label for="mobile">mobile:</label>
    <input type="text" class="form-control" id="mobile" name="mobile" size="40" placeholder="0182938476">
  </div>

 
  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
        <!-- Load TinyMCE -->
        <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">

        $("#seeAnotherField").change(function() {
  if ($(this).val() == "Bussiness") {
    $('#otherFieldDiv').show();
    $('#otherField').attr('required', '');
    $('#otherField').attr('data-error', 'This field is required.');
  } else {
    $('#otherFieldDiv').hide();
    $('#otherField').removeAttr('required');
    $('#otherField').removeAttr('data-error');
  }
});
$("#seeAnotherField").trigger("change");

$("#seeAnotherFieldGroup").change(function() {
  if ($(this).val() == "Bussiness") {
    $('#otherFieldGroupDiv').show();
    $('#otherField1').attr('required', '');
    $('#otherField1').attr('data-error', 'This field is required.');
    $('#otherField2').attr('required', '');
    $('#otherField2').attr('data-error', 'This field is required.');
  } else {
    $('#otherFieldGroupDiv').hide();
    $('#otherField1').removeAttr('required');
    $('#otherField1').removeAttr('data-error');
    $('#otherField2').removeAttr('required');
    $('#otherField2').removeAttr('data-error');
  }
});
$("#seeAnotherFieldGroup").trigger("change");
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>