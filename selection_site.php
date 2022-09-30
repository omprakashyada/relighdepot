<?php 
   session_start();
   include_once (__DIR__.'/authentication.php');

   echo $username=$_SESSION['username'];
 /* Starts the session */
   
   // Set session variables
   $_SESSION["favcolor"] = "green";
   echo $_SESSION['username'];
   echo ""
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Site</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <link rel = "stylesheet" type = "text/css" href = "https://pim.sdiebiz.net/relight/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <!--  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
         <script  type="text/javascript"  src="https://code.jquery.com/jquery-3.3.1.js"></script>
         <script  type="text/javascript"  src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
      <style>
         .main_form {
         position: relative;
         }
         button#read {
         position: absolute;
         right: 276px;
         top: 48px;
         }
         td {
         text-align: center;
         }
      </style>
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
                     <div class="selct-site">
                        <div class="site-text">
                           <h3>Select Site</h3>
                        </div>
                        <form  style="text-align: center" id="find_form">
                           <div class="row">
                              <div class="col-md-12">
                                 <h2>Select Your Site </h2>
                              </div>
                           </div>
                           <!--  <select id="redirectSelect">
                              <option value="">Please select</option>
                              <option value="https://pim.sdiebiz.net/relight/staging_selection.php">Staging</option>
                              <option value="https://pim.sdiebiz.net/relight/live_selection.php">Live Site</option>
                              </select> -->
                           <div class="col-md-12">
                              <select id="redirectSelect">
                                 <option value="">Please select</option>
                                 <option value="staging">Staging</option>
                                 <option value="live_site">Live Site</option>
                              </select>
                           </div>
                     </div>
                     </form>
                  </div>
               </div>
         </div>
         </section>
      </div>
      </div>
      <div class="modal fade" id="live_site" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h2 class="modal-title" style="text-align: center;">Live Site</h2>
               </div>
               <div class="modal-body">
                  <h3>Are you sure you want to do changes on live site?</h3>
               </div>
               <div class="modal-footer">
                  <a class="btn btn-default" href="https://pim.sdiebiz.net/relight/live_selection.php" >Proceed</a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               </div>
            </div>
         </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function(){ //Make script DOM ready
         $('#redirectSelect').change(function() { //jQuery Change Function
             var opval = $(this).val(); //Get value from select element
             if(opval=="live_site"){ //Compare it and if true
                 $('#live_site').modal("show"); //Open Modal
             }
             else if(opval="staging"){
                  window.open('https://pim.sdiebiz.net/relight/staging_selection.php','_blank');
             }
         });
         });
      </script>
      <!-- <script>
         function redirect(goto){
         var conf = confirm("Are you sure you want to redirect to this site?");
         if (conf && goto != '') {
             window.open(goto,'_blank');
         }
         }
         
         var selectEl = document.getElementById('redirectSelect');
         
         selectEl.onchange = function(){
         var goto = this.value;
         redirect(goto);
         
         };
         </script> -->
      <script type='text/javascript'>
         $(document).ready(function(){
                 $('#read').on('click', function () {
                     var setvalue=$('#sess_val').val();
                     $('#ex_val').val(setvalue);
                });
         });
      </script>
   </body>
</html>
