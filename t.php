
 <?php include 'inc/sellerhead.php';?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <style>
      body{
  background-image: url("back.jpeg");
  background-size: cover;
  background-repeat: no-repeat;
}</style>
  </head>
  <body>
     <div class="mx-auto bg-dark" style="width:850px">
              <hr>
              <div >
                <h4 class="text-center text-primary">Welcome! Product Details </h4>
              </div>
              <hr>

                <div class="container">
                  <div class="text-white">
            <form class="" action="payment.php" method="post">
                          
         

                            <div class="form-group row">
                <label for="pro_name" class="col-sm-3 col-form-label">1.Product Name </label>
                <div class="col-sm-4">
                  <input type="text" class="form-control"  name="pro_name" required="" >
                </div>

              </div>
              <br>
              
              <div class="form-group row">
                <label for="ammount" class="col-sm-3 col-form-label">2.Product Price </label>
                <div class="col-sm-4">
                  <input type="num" class="form-control"  name="ammount" required="" >
                </div>
              </div>
              <br>
              <div class="form-group row">
                <label for="ammount" class="col-sm-3 col-form-label">3.Product details </label>
                <div class="col-sm-4">
                  <input type="num" class="form-control"  name="ammount" required="" >
                </div>
              </div>
              <br>
                 <div class="form-group row" >
                <label for="pro_id" class="col-sm-3 col-form-label">4.Product Type </label>
                 <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1">Featureds</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">General</label>
</div>






              <br>
            
               <br>
                            </div>
                            <div class="form-group row">
                <label for="ammount" class="col-sm-3 col-form-label">3.Product Image </label>
                <div class="col-sm-4">
                  <input type="file" class="form-control"  name="image" required="" >
                </div>
              </div>
                            </div>
              <div class="row justify-content-center">
                <button type="submit" name="button" class="btn btn-primary ">Submit</button>
              </div>
               <br> <br> <br> 
            </form>
          </div>
        </div>
          <br>
        
        <div class="col-sm-2"></div>
      
    
   
  </body>
</html>
<?php include 'inc/footer.php';?>
