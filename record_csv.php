<?php    
session_start(); 
include_once (__DIR__.'/authentication.php');
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database='rdevarona_relight_depot_search';
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
                                
   $idquery="SELECT * FROM `template_details`  ORDER BY Template_id DESC";
   $res=mysqli_query($conn,$idquery);
   $row=mysqli_fetch_assoc($res);

      $id=$row['Template_id'];
      $tname=$row['Template_name'];
      "<br>";
      $template_id=$id;
     "<br>";
       $select_col=json_decode($_GET['data']);
       $column_arr=serialize($select_col);
       $attribute_col=json_decode($_GET['attr']);
       $attr_col=serialize($attribute_col);
       $prefix=$_GET['prefix'];
       $query1="select * from `template_attributes` where `Template_id`='$template_id'";
       $res1=mysqli_query($conn,$query1);
        $exist=mysqli_num_rows($res1);
 
       if(!($exist>=1)){

      //  if(!($template_col==$row)){
      $query="INSERT INTO `template_attributes`(`Template_id`,`Template_name`, `Selected_Column`, `Column_attributes`,`Prefix`) VALUES ('$template_id','$tname','$column_arr','$attr_col','$prefix')";
      $res1=mysqli_query($conn,$query);
      //  }
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
          <div id="load"></div>
            <div class="sec-sidebar" id="contents">
               <section class="sidebar-left" >
                  <div class="sidebar-custom  collapse" id="demo">
                     <div class="sidebar-logo main-screen">
                        <a href="" class="logo-c"> 
                        <img src="https://cdn11.bigcommerce.com/s-c76t6z3pfh/images/stencil/original/download_1632131339__59027.original.png"> 
                        </a>
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
                  
                  <div class="dashboard-wrapper product-page record-csv-sec csv-import">
                   
                    <h2> Akeneo Product CSV import </h2>

                     <div class="block-element">
                        <div class="selct-site stage-replace  upload-seller display-site">
                           <div class="multi-steps-form">
                              <ul id="progressbar-step">
                                <a href="https://pim.sdiebiz.net/relight/templates.php" class="crte-links"><li class="active"> <span> Choose/Create Template </span></li></a>
                              <li class="active"> <span> Upload CSV / Select Column </span></li>
                              <li class="active">  <span>  Mapping Akeneo Attribute  </span> </li>
                              <li class="active"><span> Select final data </span></li>
                              <li class=""><span>Download CSV</span></li>

                              </ul>
                           </div>
                          
                               <div class="attr-top-sec">
                                    <div class="attr-top-sec-btn back_search back-btn-sec"> 
                                       <button onclick="history.back()" class="back-ui back-btn">Back</button>
                                    </div>
                                 </div>
                           <h2 class="maps-title">Mapping Attributes</h2>
                           <div class="table-responsive">
                              <table id='example' class='show-user-table display  c-scrollbar  mapping-table data_show' style='width:100%'>
                                 <?php
                                    $data=$_GET['data'];
                                    $data_new= json_decode($data); 
                                    $attr=json_decode($_GET['attr']);
                                    $prefix=$_GET['prefix'];
                                     $count_data=count($data_new);
                                     $count=$_GET['count'];
                                    
                                    $path = __DIR__."/csvupload"; 
                                    $latest_ctime = 0;
                                    $latest_filename = '';    
                                    $d = dir($path);
                                    ?>
                                 <thead>
                                    <tr>
                                       <?php 
                                          $result[]=array($data_new);
                                          for($i=0;$i<$count_data; $i++){
                                             ?>
                                       <th><?php  echo $data_new[$i]; ?></th>
                                       <?php 
                                          } ?>
                                       <th class="action-row"> <input type="checkbox" id="chkAll"/> Action </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       while (false !== ($entry = $d->read())) {
                                       $filepath = "{$path}/{$entry}";
                                       // could do also other checks than just checking whether the entry is a file
                                       if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
                                       $latest_ctime = filectime($filepath);
                                       $latest_filename = $entry;
                                       }
                                       }
                                       if (($handle = fopen(__DIR__.'/csvupload/'."$latest_filename", "r")) !== FALSE){      
                                       $headers = fgetcsv($handle, 1000, ",");
                                       global $headers;
                                       $i=0;
                                       $records = array();  
                                       $url_result=array();
                                       
                                       while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {      
                                           $count = count($data);
                                           global $count;
                                           for($x=0;$x<$count;$x++){
                                               $records[$headers[$x]][$i] = $data[$x];   
                                               for($j=0;$j<$count_data;$j++){
                                       
                                                  if($headers[$x] == $data_new[$j]){
                                                    $url_result[$headers[$x]][$i] = $data[$x];
                                                  }
                                               }
                                                 
                                           }
                                         
                                           $i++;
                                         }
                                       }
                                       
                                        $arraykey = array_keys($records);
                                          $count_new=count($url_result);
                                            $key=array_keys($url_result);
                                             for($i=0;$i<count($key);$i++){
                                                $total=count($url_result[$key[0]]);
                                            }
                                         
                                            for($i=0;$i<$total;$i++){
                                             ?>
                                    <tr>
                                       <td class="name-d<?php echo $j; ?>"><?php if($prefix){echo $prefix.$url_result[$key[0]][$i];}else{echo $url_result[$key[0]][$i];}?></td>
                                       <?php  for($j=1;$j<count($key);$j++){ ?>
                                       <td class="name-d<?php echo $j; ?>"><?php echo $url_result[$key[$j]][$i];?></td>
                                       <?php }?>
                                       <td><input type="checkbox" name="selection" data-id="<?php echo $i;?>" class="prod_option_<?php echo $i;?> selection cat" value="<?php echo $url_result[$key[0]][$i]; ?>"/>
                                          <input type="checkbox" name="pid" data-id="<?php echo $i;?>" class="prod_option_<?php echo $i;?> prd_selection  cat" value="<?php echo $prefix.$url_result[$key[0]][$i]; ?>" style="display:none;"/>
                                       </td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <script type="">
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
                          console.log(updatedProdValues)
                          $('#selected').val(JSON.stringify(updatedFilterValues))
                          $('#selected1').val(JSON.stringify(updatedProdValues))
                        }
                        
                        jQuery('.cat').change(get_filter);
                        
                        
                     </script>

                          <?php  for($i=0;$i<count($data_new);$i++){ ?>
                        <input type="checkbox" name="keydata" checked data-id="<?php echo $i;?>" class="key data_<?php echo $i;?>" value="<?php echo $data_new[$i];?>" style="display:none;" />
                        <?php }?>
                       
                         <?php  for($i=0;$i<count($attr);$i++){ ?>
                        <input type="checkbox" name="keydatacol" checked data-id="<?php echo $i;?>" class="keydata data_<?php echo $i;?>" value="<?php echo $attr[$i];?>" style="display:none;" />
                        <?php }?>
                      
                        <div class="records-btn records-all-btns">
                           <div class="records-inner-btns">
                           <form method="POST" action="">
                              <input type="hidden" name="show_data" id="selected" value="[]"/>
                              <input type="hidden" name="show1_data" id="selected1" value="[]"/>
                              <input type="hidden" name="key_data" id="sel" value="<?php echo $key[0]; ?>"/>
                              <input type="hidden" name= "data" value="[]" id="data"/>
                              <input type="hidden" name= "data_col" value="[]" id="data_col"/>
                              <input type="hidden" name= "prefix" value="<?php echo $prefix; ?>" />
                              <input class="export-btn" type="submit" value="Export" id="next" name="export">
                           </form>
                          </div>
                     </div>
                     </div>
                      <script type="">
                        jQuery(document).ready(function () { 
                        var oTable = jQuery('#example').dataTable({
                        stateSave: true
                        });
                        var allPages = oTable.fnGetNodes();
                         var val = [];
                        jQuery('#chkAll').click(function () {
                        
                        if (jQuery(this).hasClass('selection')) {
                        jQuery('input[type="checkbox"]', allPages).prop('checked', false);
                         document.getElementById('selected').value = "";
                          location.reload(true);

                        } else {
                        jQuery('input[type="checkbox"]', allPages).prop('checked', true);
                           $('.selection:checkbox:checked', allPages).each(function(i){
                           val[i] = $(this).val();
                           });
                           $('#selected').val(JSON.stringify(val));
                           console.log(val);
                        }
                        jQuery(this).toggleClass('selection');
                        
                        })
                        });


                        $(document).ready(function(){
                           var val = [];
                          $('.key:checkbox:checked').each(function(i){
                             val[i] = $(this).val();
                          });
                           console.log(val);
                           $('#data').val(JSON.stringify(val));
                        })

                        $(document).ready(function(){
                           var val = [];
                          $('.keydata:checkbox:checked').each(function(i){
                             val[i] = $(this).val();
                          });
                           console.log(val);
                           $('#data_col').val(JSON.stringify(val));
                        })
                        
                     </script>
                    <script>
                    document.onreadystatechange = function () {
                    var state = document.readyState
                    if (state == 'interactive') {
                    document.getElementById('contents').style.visibility="hidden";
                    } else if (state == 'complete') {
                    setTimeout(function(){
                    document.getElementById('interactive');
                    document.getElementById('load').style.visibility="hidden";
                    document.getElementById('contents').style.visibility="visible";
                    },1000);
                    }
                    } 
                    </script> 
                      
                  </div>

               </section>
            </div>
            <!-- ========================today changes starts================== -->
         </div>
  
     
   </body>
</html>
 
<?php 

 if(isset($_REQUEST['export'])){
      $result=array();
      $data=json_decode($_POST['show_data']);
      $data_attr=json_decode($_POST['show1_data']);
      $key=$_POST['key_data'];
      $column=json_decode($_POST['data']);
      $attribute=json_decode($_POST['data_col']);
      $prefix=$_POST['prefix'];
      array_push($result, $data);
      $new_array=array();
      $path = __DIR__."/csvupload"; 
      $latest_ctime = 0;
      $latest_filename = '';  
      $d = dir($path);
      while (false !== ($entry = $d->read())) {
         $filepath = "{$path}/{$entry}";
         //could do also other checks than just checking whether the entry is a file
         if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
         $latest_ctime = filectime($filepath);
         $latest_filename = $entry;
         //  echo $latest_filename;
         }
      }
      if (($handle = fopen(__DIR__.'/csvupload/'."$latest_filename", "r")) !== FALSE){      
         $headers = fgetcsv($handle, 1000, ",");
         global $headers;
         $i=0;
         $records = array(); 
         $records_updated = array(); 
         $url_result=array();
         $sorteddata[]=array();
         while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {    
            $count = count($data);
            global $count;
            for($x=0;$x<$count;$x++){
               $records[$headers[$x]][$i] = $data[$x];
            }
            $i++;    
            $csv[]=$data;   
         }
         foreach ($column as  $value_rec) {
            $records_updated[$value_rec] = $records[$value_rec];
         }
         $key=array_keys($csv);
         $data_arr_sorted = array();
         foreach ($records_updated as $records_update_data) {
            for($x=0;$x<count($records_update_data);$x++){
               $data_arr_sorted[$x][] = $records_update_data[$x];
            } 
         }
         $sorteddata=array($attribute);             
         foreach ($data_arr_sorted as $key => $value) {
            for($j=0;$j<count($value);$j++) {
               for($i=0;$i<count($result[0]);$i++){
                  $check=$result[0][$i];
                  if($check == $value[$j]){
                     array_push($new_array, $value);
                  } 
               } 
            }
         }

         foreach ($new_array as $key => $valuesku) {
               if (strpos( $value[0], $prefix) === 0) {
                  $sorteddata[]=$valuesku;
               } else {
                  $pos = 0;
                  $prefix_sku=$prefix.$valuesku[0];
                  array_shift($valuesku);  
                  $result = array_merge(array_slice($valuesku, 0, $pos), array($prefix_sku), array_slice($valuesku, $pos));
                  $sorteddata[]=$result;
               } 
         }    
      }
         $file='export'.date("d-m-y").'.csv';
         $dir=__DIR__."/downloads/".$file;
         $f = fopen($dir, "w");
         foreach ($sorteddata as $line) {
            fputcsv($f, $line);
         }

      echo "<script>window.open('http://localhost/relight/export.php','_self');</script>";
   }

?>



