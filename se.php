
 <?php include 'inc/header.php';?>
 <?php 
if(isset($_GET['cmid'])){
  $id= preg_replace('/[^-a-zA-z0-9_]/', '', $_GET['cmid']);
}
if ($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['submit'])){
  

  $addCart =$ct->addTocm($id);

} 
?>


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

}
form{
   padding-left: 150px;
}</style>''
  </head>
  <body>
     <div class="mx-auto bg-dark" style="width:850px">
              <hr>
              <div >
                <h4 class="text-center text-primary">Welcome! just one more step to sell </h4>
              </div>
              <hr>

                <div class="container">
                  <div class="text-white">
            <form class="" action="s.php" method="post">


  <textarea name="message" rows="10" cols="30">The cat was playing in the garden.</textarea>
  <br><br>
  <input type="submit" name="submit">
</form>
<?php 
        if(isset($addCart)){
          echo $addCart;
        }
        ?>

        
        <div class="col-sm-2"></div>
      
    
   
  </body>
</html>
<?php include 'inc/footer.php';?>
