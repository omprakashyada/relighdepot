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
<!DOCTYPE html>
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
      <script></script>
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
                     <a href="https://pim.sdiebiz.net/relight/staging_selection.php" class="">
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
            <section class="all-dashboard  dash-resp">
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
               <div class="dashboard-wrapper site-result product-page">
                  <div class="block-element">
                     <div class="selct-site  welcome-page">
                        <div class="product-inner-sec total-products-sec">
                           <div class="main-wrapper">
                              <div class="container ">
                                 <div class="login-sec login-resp">
                                    <div class="row justify-content-center login-page-row register-sec">
                                       <div class="col-md-8">
                                          <div class="logo">
                                             <img src="https://cdn11.bigcommerce.com/s-c76t6z3pfh/images/stencil/original/download_1632131339__59027.original.png">
                                          </div>
                                          <div class="login-form-inner-sec">
                                             <h1>Welcome To RelightDepot</h1>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
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
   </body>
</html>