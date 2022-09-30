<?php   
 session_start(); 
 include (__DIR__.'/authentication.php');
 $userName= $_SESSION['username'];
 $password= $_SESSION['password'];
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
  
// ==================================================
       
$url=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'];
if ($_SERVER["REQUEST_METHOD"] == "GET") {
      if(isset($_GET['addnew_temp'])){
      $template_name= $_GET['temp_name'];
      //  $supplier_name=$_GET['supplier'];
      if (empty($_GET["temp_name"])) {
         $nameErr = "<br>Template Name is required";
      } else {
            $query1="select * from `template_csv_data1` where `Template_name`='$template_name'";
            $res1=mysqli_query($conn,$query1);
            echo $exist=mysqli_num_rows($res1);
            if(!($exist>=1)) {
               // $query="insert into template_csv_data1(`Template_name`,`Supplier`) values('$template_name','$supplier_name')";
               $query="insert into template_csv_data1(`Template_name`) values('$template_name')";
               $output=mysqli_query($conn,$query);
               if($output) {
                  $message= "<br>New template has been added";
                  //header("location:import_csv.php");
                   echo "<script>window.open('http://localhost/relight/import_csv.php','_self');</script>";
                
                  
               }
            } else {
               $nameErr="<br>Template Name $template_name already exist";
            }
         }
      }
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
                           <!-- <a href="https://pim.sdiebiz.net/relight/staging_selection.php"> -->
                           <a href="<?= $url; ?>/relight/staging_selection.php">
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
                           <!-- <a href="https://pim.sdiebiz.net/relight/staging_delete.php"> -->
                           <a href="<?= $url; ?>/relight/staging_delete.php">
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

               <li class="active"> <span> Choose/Create Template </span></li>
               <li> <span><a href="https://pim.sdiebiz.net/relight/import_csv.php">  Upload CSV / Select Column </a> </span></li>
               <li>  <span>  Mapping Akeneo Attribute  </span> </li>
               <li><span> Select final data </span></li>
               <li><span>Download CSV </span></li>
            </ul>
         </div>
         
         <div class="csv-files-record">
            <h3>Choose Template</h3>
            <div class="top_block choose-template">
               <div class="form_1_temp">
                  <form action="selected_record.php" method="GET">
                     <label for="Templates">Choose Your Template:</label>
                      <select name="tem_id" id="temp_id">
                        <option value="Select Template">Select Template</option>
                      <?php 
                      $select="select * from template_csv_data1";
                      $res=mysqli_query($conn,$select);
                      while ($category = mysqli_fetch_assoc($res)){
                      $count=count($category); ?>
                      <option value="<?php echo $category['Id'];?>"><?php echo $category['Template_name']; }?></option>
                      </select>
                    
                     <div class="proceed-btn">
                        <input type="submit" value="Proceed" class="export-btn">
                     </div>
                  </form>
               </div>
               <div class="partition-sec"> <span>OR</span> </div>
               <div class="form_2_temp">
                  <form action="" method="get">
                     <label for="Templates">Add New Template :</label>
                     <input type="text" class="add-input" name="temp_name" placeholder="Enter Your Template Name" />
                     <span class="text-danger"><?php if(isset($nameErr)) {echo $nameErr;}?></span><br>
                     <span class="text-success"><?php if(isset($message)) {echo $message;}?></span><br>
                    <!--  <input type="text" class="add-input" name="supplier" placeholder="Enter Supplier Name" />
                     <span class="text-danger"><?php if(isset($nameErr)) {echo $nameErr;}?></span><br>
                     <span class="text-success"><?php if(isset($message)) {echo $message;}?></span><br> -->
                     <div class="proceed-btn">
                        <input type="submit" value="Proceed" class="export-btn" name="addnew_temp">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
    </div>
   </div>
</section>
</div> 
</div>

<script type="text/javascript">
    $(document).ready(function() { //Make script DOM ready
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
</script>-->

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


