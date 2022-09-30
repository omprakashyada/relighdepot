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
                           <a href="#" class="menu-c active" data-toggle="collapse" data-target="#demo2">
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
                                 <a href="https://pim.sdiebiz.net/relight/staging_delete.php" class="active">
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
               <div class="dashboard-wrapper staging-dele-sec">
                  <div class="block-element">
                     <div class="selct-site stage-slect">
                        <div class="site-text data-del">
                           <h3>Search Your Staging Product For Delete</h3>
                        </div>
                        <form method="POST" action=" " style="text-align: center" id="find_form" class="form_delete">
                           <div class="row">
                              <div class="col-sm-3">
                                 <!--  <h2>Enter Your Product SKU:</h2> -->
                              </div>
                              <div class="col-md-9 d-flex">
                                 <input type="text" name="sku_val" id="new_val" placeholder="Enter Product SKU" />
                                 <input type="submit" name="Sku"  class="submit-btn-c" value="Search" id="search" />
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
      <script  type="text/javascript"  src="https://code.jquery.com/jquery-3.3.1.js"></script> 
      <script  type="text/javascript"  src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script>
         jQuery(document).ready(function() {
           jQuery('#example').DataTable( {
               "order": [[ 0, "desc" ]],
           } );
         } );
         
      </script>
      <?php 
         if(isset($_REQUEST['Sku'])){
             $sku=$_POST['sku_val'];
                   $query = "SELECT DISTINCT product_id,product_sku,product_name FROM  staging WHERE product_sku LIKE '%$sku%'";
                 //$query="SELECT * FROM staging WHERE product_sku='".$sku."'";
                  $results = $conn->query($query);
                  $num = $results->num_rows;
         
               ?>
      <div class="product-inner-sec product-page inner-product-table  inner-c inner-delete-btn">
         <div class="">
            <div class="block-table">
               <table id='example' class='show-user-table display table-responsive' style='width:100%'>
                  <thead>
                     <tr>
                        <th>Product ID</th>
                        <th>Product SKU</th>
                        <th>Product Name</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody class="tbody">
                     <?php if($num > 0){  for($i=0;$i<$num;$i++){   
                        $row = $results->fetch_assoc();?>
                     <tr>
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo $row['product_sku'];?> </td>
                        <td class="product-name"><?php echo $row['product_name'];?></td>
                        <!-- <td><button class="btn-danger table-del-btn"><a class="del-btn text-white" href="https://pim.sdiebiz.net/relight/staging_delete.php?product_id=< ?php echo $row['product_id']; ?>&str=< ?php echo $sku;?>" onclick='javascript:confirmationDelete($(this));return false;' target='_blank'>Delete
                           </a></button>
                        </td> -->

                        <td>
                           <button class="btn-danger table-del-btn"><a class="del-btn text-white" href="http://localhost/relight/staging_delete.php?product_id=<?php echo $row['product_id']; ?>&str=<?php echo $sku;?>" onclick='javascript:confirmationDelete($(this));return false;' target='_blank'>Delete
                           </a></button>
                        </td>
                     </tr>
                     <?php       
                        }}
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <?php
         }
         
         if(isset($_GET['str'])){
          $product_id=$_GET['product_id'];
          $str=$_GET['str'];
                   $query = "SELECT DISTINCT product_id,product_sku,product_name FROM staging WHERE product_sku LIKE '%$str%'";
                 //$query="SELECT * FROM staging WHERE product_sku='".$sku."'";
                  $results = $conn->query($query);
                  $num = $results->num_rows;
         ?>
      <div class="product-inner-sec product-page inner-product-table  inner-c">
         <div class="container">
            <div class="block-table">
               <table id='example' class='show-user-table display table-responsive' style='width:100%'>
                  <thead>
                     <tr>
                        <th>Product ID</th>
                        <th>Product SKU</th>
                        <th>Product Name</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody class="tbody">
                     <?php if($num > 0){  for($i=0;$i<$num;$i++){   
                        $row = $results->fetch_assoc();?>
                     <tr>
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo $row['product_sku'];?> </td>
                        <td class="product-name"><?php echo $row['product_name'];?></td>
                        <!-- <td><button class="btn-danger"><a class="del-btn text-white" href="https://pim.sdiebiz.net/relight/staging_delete.php?product_id=< ?php echo $row['product_id']; ?>&str=< ?php echo $str;?>" onclick='javascript:confirmationDelete($(this));return false;' target='_blank'>Delete
                           </a></button>
                        </td> -->
                        <td><button class="btn-danger"><a class="del-btn text-white" href="http://localhost/relight/staging_delete.php?product_id=<?php echo $row['product_id']; ?>&str=<?php echo $str;?>" onclick='javascript:confirmationDelete($(this));return false;' target='_blank'>Delete
                           </a></button>
                        </td>

                     </tr>
                     <?php       
                        }}
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <?php
         }
         
         ?>
      <script>
         function confirmationDelete(anchor)
         {
          var conf = confirm('Are you sure want to delete this record?');
            if(conf)
            {
               window.location=anchor.attr("href");
            }
         
         }
      </script>
      <?php 
         $servername = "localhost";
         $username = "root";
         $password = "";
         $database='rdevarona_relight_depot_search';
         $conn = new mysqli($servername, $username, $password, $database);
         if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
         }
         @$product_id =$_GET['product_id']; 
         @$str=$_GET['str'];
         $del = "DELETE FROM staging WHERE product_id='".$product_id."'";// delete query
         if($del)
         {
            $results = $conn->query($del);
               if($results)  { 
                  
                     // header('location:https://pim.sdiebiz.net/staging_delete.php?product_id='.$product_id.'&str='.$str); 
            
               }  else {
                  echo "Error deleting record"; // display error message if not delete
               }
            }
         
         ?>
      <script type="">
         window.onload = function() {
         if(!window.location.hash) {
           window.location = window.location +'#loaded';
           window.location.reload();
         }
         }
      </script>
   </body>
</html>
