<?php include 'inc/header.php';?>

<?php include 'classes/brand.php';?>
<?php 
$brand= new Brand();
?>
                       
           <style>
        div.b {
  line-height: 2.0;
  
}
      body{
        text-align: center;

}</style>
  
  </head>
<body>
  
              <br/>
                <h2><b>Brand List</b> </h2>
                <hr>
               

  <div class="b">
                    <table class="data display datatable" id="example" >
          <thead>
            <tr>
              <th width="5%">Serial No.</th>
              <th width="20%">Brand Name</th>
              <th width="25%">Time</th>
              <th width="20%">Mobile</th>
                             <th width="25%">Address</th>

              </tr>
          </thead>
          <tbody>
          <?php
          $getBrand = $brand->getBrand();
          if($getBrand){
            $i=0;
            while ($result = $getBrand->fetch_assoc()){
              $i++;
            
          ?>
            <tr class="odd gradeX">
               <td><?php echo $i; ?></td>
               <td><?php echo $result['brandName']; ?></td>
               <td><?php echo $fm->formatTime( $result['stime'])
               . " - ".
               $fm->formatTime( $result['ctime']); ?></td>

                            <td>  <?php echo  "0". $result['mobile']; ?></td>
                             <td><?php echo $result['address']; ?></td>

            </tr>
            <?php } } ?>
          </tbody>
        </table>
               </div>
           </body>       
<script type="text/javascript">
  $(document).ready(function () {
      setupLeftMenu();

      $('.datatable').dataTable();
      setSidebarHeight();
  });
</script>
<?php include 'inc/footer.php'; ?>