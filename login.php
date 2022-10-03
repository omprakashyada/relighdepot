<html>
   <head>
      <title>Login</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel = "stylesheet" type = "text/css" href = "https://pim.sdiebiz.net/relight/style.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </head>
   <body>
      <div class="main-wrapper">
         <div class="container ">
            <div class="login-sec login-resp">
               <div class="row justify-content-center login-page-row register-sec">
                  <div class="col-md-8">
                     <div class="logo">
                        <img src="https://cdn11.bigcommerce.com/s-c76t6z3pfh/images/stencil/original/download_1632131339__59027.original.png">
                     </div>
                     <div class="login-form-inner-sec">
                        <h1>Login</h1>
                        <form method="POST" action="">
                           <div class="row mb-3">
                              <div class="col-md-12">
                                 <input type="text" name="username"  placeholder="User Name">
                              </div>
                           </div>
                           <div class="row mb-3">
                              <div class="col-md-12">
                                 <input type="password" class="login_frm" name="password"  placeholder="Password">
                              </div>
                           </div>
                           <div class="mb-3">
                              <input class="submit-btn" type="submit" id ="btn" value="Login" name="Submit" />  
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>


<?php 
   if(isset($_REQUEST['Submit'])){
   $username=$_POST['username'];
   $password=$_POST['password'];
   $check_user="relight";
   $check_pass="Rd.com123!";
     if(($username==$check_user) && ($password==$check_pass)){
          session_start();
          $_SESSION['username']= $username;
          $_SESSION['password']=$password;
          header("Location:welcome.php");
      //   echo "<script>window.open('https://pim.sdiebiz.net/relight/welcome.php','_self');</script>";

     }
     else{ 
         echo "<h3 class='message'>Invalid Credentials</h3>";
     }
}


?>