<?php    session_start(); 
include_once (__DIR__.'/authentication.php');
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
    
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


   </head>
   <body >
      <div class="main-wrapper">
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

                  <div class="selct-site stage-replace  upload-seller">
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

                           <input type='submit' name='submit' value='Submit' class="btn-primary m-2"> 
                                         
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
                        //  echo $handle;
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
                        ?>  
                 
                       <div class="column-table-sec">
                        <div class="column-table">
                                <table>
                              <tr><td colspan="2">  <h3>Choose Columns</h3></td><tr>
                               <?php for($k=0;$k<$count;$k++) {?>
                                <tr>
                                <td class="checkbox-row">

                                 <label class="container-checkbox">
                                 <input type="checkbox" name="selection" data-id="<?php echo  $arraykey[$k]; ?>" class="prod_option_<?php echo  $arraykey[$k];?> selection cat step2" value="<?php  echo  $arraykey[$k];?>"/> 
                                  <input type="checkbox" name="pid" data-id="<?php echo  $arraykey[$k]; ?>" class="prod_option_<?php echo  $arraykey[$k]; ?> selection cat" value="<?php echo  $arraykey[$k]; ?>"  style="display:none;"/>
                                      <span class="checkmark"></span>
                                 </label>

                                 </td>
                                  <td class="label-name"><?php echo $arraykey[$k];?></td>
                                </tr>
                                <?php } ?>
                            </table> 

                                
                            </div>

                           
                            </div>                  
                                  <?php   
                               
                                 
                                  echo "<br>";                         
                              $i++;
                              $target_dir = "/home/rdevarona/pim.sdiebiz.net/public/relight/csvupload/";
                           $target_file = $target_dir . basename($_FILES["filename"]["tmp_name"]);
                         
                           // echo $target_file;
                           global $target_file;
                           $_SESSION["myfile"] = "$target_file"; 
                           if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
                              // echo "The file ". basename( $_FILES["filename"]["name"]). " has been uploaded.";
                           } else {
                              echo "Sorry, there was an error uploading your file.";
                           }
                        ?>
                        <?php      
                     fclose($handle);
                        }
                                ?>       
                    <!-- form starts -->
                                 
                    
                  
                     </div>
                      <div class="records-btn">
                     <form method="POST" action="">
                <input type="hidden" name="show" id="selected" value="[]"/>
                <input type="hidden" name="show1" id="selected1" value="[]"/>
              <input class="export-btn" type="submit" value="Proceed" id="next" name="enter" style="display: none;">
               </form>   
             </div>


                <?php    
    if(isset($_REQUEST['enter'])) {            
      $data=$_POST['show'];
      $new=json_decode($data);
      
      // print_r($new);
      $count=sizeof($new);

      $path = "/home/rdevarona/pim.sdiebiz.net/public/relight/csvupload/"; 

      $latest_ctime = 0;
      $latest_filename = '';    
      
      $d = dir($path);
      while (false !== ($entry = $d->read())) {
        $filepath = "{$path}/{$entry}";
        // could do also other checks than just checking whether the entry is a file
        if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
          $latest_ctime = filectime($filepath);
          $latest_filename = $entry;
         //  echo $latest_filename;
        }
      }
      // echo $latest_filename;
                
                
              
            //   if (($open = fopen('http://localhost/relight/csv_file_upload/updated_products1.csv', "r")) !== FALSE){
            if (($open = fopen('/home/rdevarona/pim.sdiebiz.net/public/relight/csvupload/'."$latest_filename", "r")) !== FALSE){
              while (($data = fgetcsv($open)) !== FALSE)
              { 
               echo $_POST['show'];  
              $csv_array[] = $data;

              }

              fclose($open); ?>
               <h2 class="maps-title">Mapping Attributes</h2>

              <table id='example' class='show-user-table display  mapping-table' style='width:100%'>
                     <thead>
                       <tr>
                           <?php for($i=0;$i<(count($new)); $i++){
                              ?>
                              <th>
                              <span>
                          <select value="">
                          <option value="Parent Sku">Parent Sku</option>
                          <option value="Product Id">Product Id</option>
                          <option value="Child Id">Child Id</option>
                          <option value="Product Bar">Product Bar</option>
                          <option value="UAN">UAN</option>
                          </select></span></th>
                              <?php 
                           } ?>
                           <th>
                          Select All <input type="checkbox" id="chkAll" /> 
                          </th>
                          
                      </tr>
     
                     </thead>
              <tbody>
           <?php foreach ($csv_array as $key => $value) {

              if($key!=0){ 
              ?>
                   <tr> 
                     <?php for($i=0;$i<(count($new));$i++)  {?>
                     <td><?php echo $value[$i]; ?></td>
                     <?php } ?>
              
                    
                     <td> <input type="checkbox" name="selection" data-id="<?php echo  $arraykey[$k]; ?>" class="prod_option_<?php echo  $arraykey[$k];?> selection cat rowcheck" value="<?php  echo  $arraykey[$k];?>"/> </td>
                   </tr>
                   <?php
              }
            }?>
            </tbody>
            </table>
            <?php

              
               
              }

     }
  
    ?>  
                    
                  </div>

                              <div class="records-btn">
                                <a href="https://pim.sdiebiz.net/relight/downloadcsv.php" class="btn-success" style="display: none;">Proceed</a>
                                  <!--  <input type='submit' name='selected' value="Create CSV" class="btn-success"> -->
                               </div> 







                  <!-- ========================today changes starts================== -->
            </div>
         </div>
      </div>
      </section>

      </div>
      </div>
      </div>
</div>

   <style type="text/css">

a.btn-success.showExport {
  display: block !important;
    display: table;
    margin: 0 auto;
    background: #5f7410;
    border: unset;
    font-family: 'Open Sans', sans-serif;
    font-weight: 600;
    /* background: #040404; */
    border: unset;
    padding: 9px 14px;
    border-radius: 5px;
    font-size: 20px;
    cursor: pointer;
    width: 175px;
    text-align: center;
    text-transform: capitalize;
    color: #fff;
}
/* input#next{
  display: block !important;
} */
.showExport {
    display: block !important;
}
   </style>  
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
         


         function get_filter()
                                {
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
</html> -->
