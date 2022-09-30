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
               <div class="dashboard-wrapper product-page record-csv-sec">
                  <div class="block-element">
                     <div class="selct-site stage-replace  upload-seller csv-import">


                       <h2> Akeneo Product CSV import </h2>


                        <div class="multi-steps-form">
                           <ul id="progressbar-step">
                              <a href="https://pim.sdiebiz.net/relight/templates.php" class="crte-links"><li class="active"> <span> Choose/Create Template </span></li></a>
                              <li class="active"> <span> Upload CSV / Select Column </span></li>
                              <li class="active">  <span>  Mapping Akeneo Attribute  </span> </li>
                              <li class="active"><span> Select final data </span></li>
                              <li class="active"><span>Download CSV</span></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="attr-top-sec">
                                    <div class="attr-top-sec-btn back_search"> 
                                       <button onclick="history.back()" class="back-ui back-btn">Back</button>
                                    </div>
                   </div>
                   <div class="download-pdf-entire-sec download-sale-pdf">
                  <?php 

                   $servername = "localhost";
                      $username = "root";
                      $password = "";
                      $database='rdevarona_relight_depot_search';
                      $conn = new mysqli($servername, $username, $password, $database);

                      if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                      }
                      $result="SELECT * FROM `template_attributes` ORDER BY id DESC LIMIT 1";
                      $result_dis=mysqli_query($conn,$result);
                      $row=mysqli_fetch_assoc($result_dis);
                      $col=unserialize($row['Selected_column']);
                      $attribute=unserialize($row['Column_attributes']);
                     
                       
                        // $path = "/home/rdevarona/pim.sdiebiz.net/public/relight/existingcsv/"; 
                        $path = __DIR__."/existingcsv/"; 
                        $latest_ctime = 0;
                        $latest_filename = '';  
                        $d = dir($path);
                        while (false !== ($entry = $d->read())) {
                         $filepath = "{$path}/{$entry}";
                        // could do also other checks than just checking whether the entry is a file
                           if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
                           $latest_ctime = filectime($filepath);
                           $latest_filename = $entry;
                           
                           }
                        }
                        // ($handle = fopen('/home/rdevarona/pim.sdiebiz.net/public/relight/existingcsv/'."$latest_filename", "r")) !== FALSE)
                        if (($handle = fopen(__DIR__.'/existingcsv/'."$latest_filename", "r")) !== FALSE){    

                         $selling=array();  
                         $Existingsorted[]=array();
                         $New_Price[]=array();
								       	 while (($data_new = fgetcsv($handle)) !== FALSE)
                        {   
                          $new_data[]=$data_new;
                        }    
                       
                          $column= $new_data[0];
                           
                          //$remove=array('product_name','description','item_weight','item_weight-unit');
                          //$column=array_diff($column_new, $remove);
                          array_push($column, 'price-USD');
                           $Existingsorted=array($column);
                           $price = array_search('cost-USD', $attribute);
                           $imp_price=array_search('imap-USD',$attribute);

                           
                        foreach ($new_data as $key => $value) {

                          if($key!=0){
                           
                          for($i=0;$i<count($column);$i++){
                               $pos = count($column)+1;
                              if($column[$i]==$attribute[$price]){
                                     $imap_price=$value[$imp_price];
                                     $selling_price=round(($value[$price]/0.7) * 2, 1) / 2;
                                    if($selling_price > $imap_price) {
                                       $res = $selling_price;
                                    }
                                    else if($selling_price < $imap_price){

                                       $res= $imap_price;
                                       
                                    }

                                  
                                   $result=array_merge(array_slice($value, 0, $pos), array($res), array_slice($value, $pos));
                                    $Existingsorted[]=$result; 
                              }
                              
                              
                         }  


                         
                       }



                      }
                    //   echo "<pre>";
                    //   print_r($Existingsorted);
                      
                    //   $New_Col=$Existingsorted[0];
                    //     array_push($New_Col, 'product_name','description','item_weight','item_weight-unit'); 
                    //     $New_Price=array($New_Col);

                    //     foreach ($Existingsorted as $key => $value) {

                    //         if($key !=0){
                             
                    //           $New_Price[]=$value;
                    //         }
 
                    //       }

                       }
                    

                     $Existfile='Existing-SalePrice'.'-'.time().'-'.date("d-m-y").'.csv';
                     // $directory="/home/rdevarona/pim.sdiebiz.net/public/relight/SortedCsvPrice/".$Existfile;
                      $directory= __DIR__."/SortedCsvPrice/".$Existfile;
                     $file_e = fopen($directory, "w");
                     $Ecount=count($Existingsorted)-1;
                     foreach ($Existingsorted as $line) {
                        fputcsv($file_e, $line);
                     }
                         
                       ?>
                      
                       <div class="download-pdf-sec">
                           <div class="modify">
                             <h2 class="maps-title_exist">Total Number of Existing Products:<span><?php echo   $Ecount;?></span></h2> 

                              <div class="pdf-icon"> 
                                 <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                              </div>

                              <!-- <a href="https://pim.sdiebiz.net/relight/SortedCsvPrice/< ?php echo $Existfile; ?>" id="download" class="export-btn"> -->

                              
                              <a href=" http://localhost/relight/SortedCsvPrice/<?php echo $Existfile; ?>" id="download" class="export-btn">

                                 <i class="fa fa-download" aria-hidden="true"></i>

                                     Download CSV With Updated Sale Price
                              </a>

                           </div>
                     </div>
                   </div> 
            </section>
         </div>
         <!-- ========================today changes starts================== -->
      </div>
   </body>
</html>
