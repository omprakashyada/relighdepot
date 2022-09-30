<?php    session_start();
include_once (__DIR__.'/authentication.php');

$servername = "localhost";
$username = "root";
$password = "";
$database='rdevarona_relight_depot_search';
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}



 ?>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="robots" content="index,follow">
      <meta http-equiv="Content-Type"  content="text/html; charset=utf-8">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <link rel = "stylesheet" type = "text/css" href = "https://pim.sdiebiz.net/relight/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
         integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
      <script  type="text/javascript"  src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script  type="text/javascript"  src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
   </head>
   <body >
      <div class="main-wrapper">
      
            <div class="sec-sidebar">
               <section class="sidebar-left">
                  <div class="sidebar-custom  collapse" id="demo">
                     <div class="sidebar-logo main-screen">
                        <a href="" class="logo-c"> 
                        <img src="https://cdn11.bigcommerce.com/s-c76t6z3pfh/images/stencil/original/download_1632131339__59027.original.png"> 
                        </a>
                        <!--   <button class="menu-hamburger"><i class="fa fa-bars"></i></button> -->
                     </div>
                     <div class="sidebar-menu">
                        <ul>
                           <li class="menu-item menu-itemsopen">
                              <a href="#" class="menu-c" data-toggle="collapse" data-target="#demo1">
                              <span class="menu-name"> <i class="fa fa-cubes" aria-hidden="true"></i> Update Display Name </span>
                              <span class="chevron-right"><i class="fa fa-chevron-right"></i></span>
                              </a>
                              <ul class="menu-item-1 collapse" id="demo1">
                                 <li>
                                    <a href="https://pim.sdiebiz.net/relight/live_selection.php">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Live Site
                                    </a>
                                 </li>
                                 <li>
                                    <a href="https://pim.sdiebiz.net/relight/staging_selection.php">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>  Staging Site
                                    </a>
                                 </li>
                              </ul>
                           </li>
                           <li class="menu-item menu-itemsopen">
                              <a href="#" class="menu-c" data-toggle="collapse" data-target="#demo2">
                              <span class="menu-name">  <i class="fa fa-cog" aria-hidden="true"></i> Delete Products</span>
                              <span class="chevron-right right-2"><i class="fa fa-chevron-right"></i></span>
                              </a>
                              <ul class="menu-item-1 collapse" id="demo2">
                                 <li>
                                    <a href="https://pim.sdiebiz.net/relight/live_delete.php">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Live Site
                                    </a>
                                 </li>
                                 <li>
                                    <a href="https://pim.sdiebiz.net/relight/staging_delete.php">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>  Staging Site
                                    </a>
                                 </li>
                              </ul>
                           </li>
                           <li class="menu-item menu-itemsopen">
                              <a href="https://pim.sdiebiz.net/relight/templates.php" class="menu-c active">
                              <span class="menu-name">   <i class="fa fa-file-archive-o" aria-hidden="true"></i> Products CSV Import </span>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </section>
               <section class="all-dashboard">
                  <div class="dashboard-menu">
                     <div class="mobile-resp-header">
                        <div class="sidebar-logo mobil-screen">
                           <button class="menu-hamburger" data-toggle="collapse" data-target="#demo"><i class="fa fa-bars"></i>
                           </button>
                           <a href="" class="logo-c"> 
                           <img src="https://cdn11.bigcommerce.com/s-c76t6z3pfh/images/stencil/original/download_1632131339__59027.original.png"> 
                           </a>
                        </div>
                     </div>
                     <div class="log_out"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>
                        Log Out</a>
                     </div>
                  </div>
                  <!-- ========================Dashboard Content========================= -->
                  <div class="dashboard-wrapper">
                     <div class="block-element">
                        <div class="selct-site stage-replace  upload-seller csv-import">


                           <h2> Akeneo Product CSV import </h2>

                           <div class="multi-steps-form">
                             <ul id="progressbar-step">
                            <a href="https://pim.sdiebiz.net/relight/templates.php" class="crte-links"> <li class="active"> <span> Choose/Create Template </span></li></a>
                              <li class="active"> <span> Upload CSV / Selected Column </span></li>
                              <li class="">  <span>  Mapping Akeneo Attribute  </span> </li>
                              <li class=""><span> Select final data </span></li>
                              <li class=""><span>Download CSV</span></li>

                             </ul>
                              
                           </div>

                           <div class="attr-top-sec">
                                    <div class="attr-top-sec-btn back_search back-btn-sec"> 
                                       <!-- <a href="https://pim.sdiebiz.net/relight/import_csv.php" class="back-ui"> Back To Search </a> -->
                                       <button onclick="history.back()" class="back-ui back-btn">Back</button>
                                    </div>
                                    <div class="att-text">
                                      <!--  <h3> Attribute Mapping </h3> -->
                                    </div>
                                 </div>
                           <div class="csv-files-record">
                              <h3>Upload Seller Price Sheet in CSV Format</h3>
                              <div class="display-files-record">
                                 <div class="display-files-record">
                                    <form enctype='multipart/form-data' action='' method='post'  >
                                       <div class="inputfile-box">
                                          <input size='50' type='file' name='filename' accept='.csv' id="file" class="inputfile" onchange='uploadFile(this)'>
                                          <label for="file">
                                          <span id="file-name" class="file-box"></span>
                                          <span class="file-button">
                                          <i class="fa fa-upload" aria-hidden="true"></i>
                                          Select File
                                          </span>
                                          </label>
                                       </div>
                                       <div class="records-btn">
                                          <input type='submit' name='submit' value='Upload' class="btn-primary m-2"> 
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- csv upload -->
                        <!-- csv upload ends -->
                        <?php
                           if (isset($_POST['submit'])) {
                            $handle = fopen($_FILES['filename']['tmp_name'], "r");
                            $headers = fgetcsv($handle, 1000, ",");
                            global $headers;
                            $i=0;
                            $records = array();  
                            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {  
                                 $count = count($data);
                                 global $count;
                                 for($x=0;$x<$count;$x++){
                                     $records[$headers[$x]][$i] = $data[$x];
                                 }
                               }
                               
                              $arraykey = array_keys($records); 
                              $count=count($arraykey);
                              $id=$_GET['tem_id'];
                              $result="SELECT * from template_details WHERE Template_id=$id";
                              $result=mysqli_query($conn,$result);
                              $row=mysqli_fetch_assoc($result);
                              $column=$row['Csv_columns'];
                              $data=json_decode($column);
                              $column_count=$row['Column_count'];
                              //$check=count($column);
                            
                              
                         // for($k=0;$k<$count;$k++) {

                         //                $arraykey[$k];
                                 
                         //           } 
                                
                           echo "<br>";                         
                           $i++;
                           $target_dir = __DIR__."/csvupload/";
                           // $target_dir = "http://localhost/relight/csvupload/";
                           $target_file = $target_dir . basename($_FILES["filename"]["name"]);
                           // echo $target_file;
                           global $target_file;
                           $_SESSION["myfile"] = "$target_file"; 
                           if($count==$column_count){
                                 if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {?>

                                    ?>
                                    <script>
                                    var temp_id="<?php echo $_GET['tem_id'] ?>"; 
                                    window.open('http://localhost/relight/displaycsv_attr.php?tempid='+temp_id,'_self');
                                    </script>";

                                    <?php

                                    
                                 } else {
                                    //echo "Sorry, there was an error uploading your file.";
                                 }
                                    
                              } else {
                                 echo "<div class='error_msg-c'><h2>Columns Does Not Match</h2></div>";
                              }
                           
                           ?>
                        <?php      
                           fclose($handle);
                              }
                                      ?>       
                        <!-- form starts -->
                     </div>
                     
                  </div>
                  <!-- ========================today changes starts================== -->

               </section>
            </div>
         </div>
    
 


<script>
$(document).ready(function(){
   $("#chkAll,.rowcheck").click(function(){
   $(".btn-success").addClass("showExport");
   });
});
</script>
<script>
$(document).ready(function(){
$(".checkmark").click(function(){
  $("input#next").addClass("showExport");
});
// 
$(".step2").click(function(){
  $("#next").addClass("showExport");
});
// 
});
</script>
<script type="">
jQuery(document).ready(function () { 
var oTable = jQuery('#example').dataTable({
stateSave: true
});
var allPages = oTable.fnGetNodes();
jQuery('#chkAll').click(function () {

if (jQuery(this).hasClass('selection')) {
jQuery('input[type="checkbox"]', allPages).prop('checked', false);

} else {
jQuery('input[type="checkbox"]', allPages).prop('checked', true);
}
jQuery(this).toggleClass('selection');


})
});

</script>
      <script>
         function uploadFile(target) {
             document.getElementById("file-name").innerHTML = target.files[0].name;
         }
         


         function get_filter() {
            const prodId = event.target.dataset.id;
            const className = `prod_option_${prodId}`;
            const currentCheckBoxState = event.target.checked
            const allElements = $(`.${className}`);
            allElements.prop('checked', currentCheckBoxState)
            const currentFilterValues = JSON.parse($('#selected').val());
            const currentProdValues = JSON.parse($('#selected1').val());
            
            const updatedFilterValues = currentCheckBoxState
                  ? [...currentFilterValues, allElements[0].value]
                  : currentFilterValues.filter(
                     id => id != allElements[0].value
                  )
            const updatedProdValues = currentCheckBoxState
                  ? [...currentProdValues, allElements[1].value]
                  : currentProdValues.filter(
                     id => id != allElements[1].value
                  )
            console.log(updatedFilterValues)
            $('#selected').val(JSON.stringify(updatedFilterValues))
            // $('#selected1').val(JSON.stringify(updatedProdValues))
         }
                         
          jQuery('.cat').change(get_filter);

             
         
      </script>
     

</body>
</html>
