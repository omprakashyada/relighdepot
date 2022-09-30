<?php 
   session_start();
   include_once (__DIR__.'/authentication.php');

   $username=$_SESSION['username'];
   $password=$_SESSION['password'];
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
                           <a href="#" class="active menu-c" data-toggle="collapse" data-target="#demo1">
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
                           <a href="https://pim.sdiebiz.net/relight/templates.php" class="menu-c">
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
               <div class="dashboard-wrapper">
                  <div class="block-element">
                     <div class="selct-site stage-replace  stage-c">
                        <div class="site-text">
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="back-btn">
                                    <a href="http://localhost/relight/staging_selection.php" class="search_uilast">Back To Search</a>
                                    <!-- <a href="https://pim.sdiebiz.net/relight/staging_selection.php" class="search_uilast">Back To Search</a> -->
                                 </div>
                              </div>
                              <div class="col-md-8">
                                 <div class="staging-title">
                                    <h3>Staging Site</h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <form method="POST" action=" " style="text-align: center" id="find_form">
                           <div class="row">
                              <div class="col-sm-3">
                                 <div class="form-inner exist-value">
                                    <h3>Existing Value: <?php echo $_GET['exist']; ?></h3>
                                 </div>
                              </div>
                              <!--  <label>New Value :</label> -->
                              <div class="col-md-9 d-flex">
                                 <input type="text" name="new_val" id="new_val" placeholder="Enter New Value" />
                                 <input type="submit" name="Replace" value="Replace" id="replace"/>
                              </div>
                           </div>
                        </form>
                        <!-- <div class="form-inner exist-value">
                           <h3>Existing Value: <?php echo $_GET['exist']; ?></h3>
                           </div> -->
                     </div>
                     <div class="show_table_data product-page st-replace-table">
                        <table id='example' class='show-user-table display table-responsive' style='width:100%'>
                           <thead>
                              <tr>
                                 <th>Product ID</th>
                                 <th>Product Sku</th>
                                 <th>Option ID</th>
                                 <th>Display Name</th>
                              </tr>
                           </thead>
                           <tbody class="tbody">
                              <?php 
                                 $skus=$_GET['show2'];
                                 $sku_code=json_decode($skus);
                                 @$option_id=$_GET['show'];
                                 @$product_id=$_GET['show1'];
                                 $options=json_decode($option_id);
                                 $products=json_decode($product_id);
                                 $val=$_GET['exist'];
                                  $result[]=array(
                                       $products,
                                       $sku_code,
                                       $options,
                                       $val,
                                      );
                                  
                                    foreach($result as $val) { 
                                       for($i=0;$i<=3;$i++) {  
                                       $j=0;  
                                 ?>
                              <tr>
                                 <td><?php echo $val[$i][$j];?></td>
                                 <td><?php echo $val[$i][$j];?></td>
                                 <td><?php echo $val[$i][$j];?></td>
                                 <td><?php echo $val[3];?></td>
                              </tr>
                              <?php $j++;
                                 }}?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script  type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> 
      <script  type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script type='text/javascript'>
         $(document).ready(function(){
                 $('#read').on('click', function () {
                     var setvalue=$('#sess_val').val();
                     $('#ex_val').val(setvalue);
               });
         });
      </script>
      <script>
         $(document).ready(function() {
         $('#example').DataTable();
         } );
         $(document).ready(function(){
         $('.menu-itemsopen').click(function(){
            $('.menu-itemsopen').toggleClass('main_menu');
         })
             
         })
      </script>
      <?php 
         //echo "<pre>";
         //print_r($_GET);
         
         if(isset($_REQUEST['Replace'])){
            @$option_id=$_GET['show'];
            @$product_id=$_GET['show1'];
            $options=json_decode($option_id);
            $products=json_decode($product_id);
            $option_replace=$_POST['new_val'] ;
            $length_prd = count($products);
            $length_option=count($options);?>

      <div class="product-inner-sec product-page inner-product-table  inner-c inner-delete-btn">
         <div class="container">
            <div class="form-inner bottom-inner-sec block-table">
               <table id='example' class='show-user-table display table-responsive' style='width:100%'>
                  <thead>
                     <tr>
                        <th>Product ID</th>
                        <th>Option ID</th>
                        <th>Name</th>
                        <th>Display Name</th>
                     </tr>
                  </thead>
                  <tbody class="tbody">
                     <?php
                        for ($i = 0; $i < $length_prd && $length_option ; $i++) {
                                   $curl = curl_init();
                                          curl_setopt_array($curl, array(
                                          CURLOPT_URL => 'https://api.bigcommerce.com/stores/c76t6z3pfh/v3/catalog/products/'.$products[$i].'/options/'.$options[$i],
                                          CURLOPT_RETURNTRANSFER => true,
                                          CURLOPT_ENCODING => '',
                                          CURLOPT_MAXREDIRS => 10,
                                          CURLOPT_TIMEOUT => 0,
                                          CURLOPT_FOLLOWLOCATION => true,
                                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                          CURLOPT_CUSTOMREQUEST => 'PUT',
                                          CURLOPT_POSTFIELDS =>'{
                        
                                            "display_name": "'.$option_replace.'"
                                           }',
                                          CURLOPT_HTTPHEADER => array(
                                            'X-Auth-Token: c58s1pacoyqqvry7a1ja4c8o7rxd6hs'
                                            // 'Content-Type: application/json'
                                          ),
                                        ));
                        
                                        $response = curl_exec($curl);
                                        curl_close($curl);
                                        $data_var=json_decode($response);
                                         $result_output=$data_var->data;
                                          // echo "<pre>";
                                          // print_r($result_output); 
                                         ?>
                     <tr>
                        <td><?php echo $result_output->product_id;?></td>
                        <td><?php echo $result_output->id;?></td>
                        <td><?php echo $result_output->name;?></td>
                        <td><?php echo $result_output->display_name;?></td>
                     </tr>
                     <?php
                        $output='';
                        $sql = "UPDATE staging SET display_name='".$option_replace."' WHERE product_id='".$products[$i]."' AND option_id='".$options[$i]."'";
                           if ($conn->query($sql) === TRUE) {
                              $output.="<div class='message  record-m mmsg-sucess-c'> <span class='record-sucess'> Record updated successfully</span></div>";
                           } else {
                              $output.= "<div class='message'>Error updating record: " .$conn->error."</div>";
                           }
                        }
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <?php
      }
      echo @$output;
      $conn->close();
      ?>
   </body>
</html>
