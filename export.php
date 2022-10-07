<?php    
session_start();
include_once (__DIR__.'/authentication.php');
$url=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'];

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
                             <a href="https://pim.sdiebiz.net/relight/templates.php" class="crte-links"> <li class="active"> <span> Choose/Create Template </span></li></a>
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
                        <!-- <a href="https://pim.sdiebiz.net/relight/import_csv.php" class="back-ui"> Back To Search </a> -->
                        <button onclick="history.back()" class="back-ui back-btn">Back</button>
                     </div>
                     <div class="att-text">
                        <!--  <h3> Attribute Mapping </h3> -->
                     </div>
                  </div>
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
                      $prefix=$row['Prefix'];
                     // $path = "/home/rdevarona/pim.sdiebiz.net/public/relight/downloads"; 
                     $path = __DIR__."/downloads"; 
                     $latest_ctime = 0;
                     $latest_filename = '';  
                     $d = dir($path);
                        while (false !== ($entry = $d->read())) {
                              $filepath = "{$path}/{$entry}";
                           if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
                              $latest_ctime = filectime($filepath);
                              $latest_filename = $entry;
                           }
                        }
                        // $handle = fopen('/home/rdevarona/pim.sdiebiz.net/public/relight/downloads/'."$latest_filename", "r")
                           $csv_array=[];
                        if (($handle = fopen( __DIR__.'/downloads/'."$latest_filename", "r")) !== FALSE){      
								       	while (($data = fgetcsv($handle)) !== FALSE)
      									{   
      									$csv_array[] = $data;
      									}	
                        } 
                        $total_count=count($csv_array)-1;

                        ?>
                        
                         <div class="total_count_prd">
                             <h2>Total Number of Products :<span class="total_count"><?php echo $total_count;?></span></h2>
                         </div>

                        <?php
                        // $path1 = "/home/rdevarona/pim.sdiebiz.net/public/relight/export-csv"; 
                           $path1 = __DIR__."/export-csv"; 
                           $latest_ctime1 = 0;
                           $latest_filename1 = '';  
                           $d1 = dir($path1);
                        while (false !== ($entry1 = $d1->read())) {
                               $filepath1 = "{$path1}/{$entry1}";
                           if (is_file($filepath1) && filectime($filepath1) > $latest_ctime1) {
                              $latest_ctime1 = filectime($filepath1);
                              $latest_filename1 = $entry1;
                           }
                        }
                        // ($handle1 = fopen('/home/rdevarona/pim.sdiebiz.net/public/relight/export-csv/'."$latest_filename1", "r")
                        if (($handle1 = fopen( __DIR__.'/export-csv/'."$latest_filename1", "r")) !== FALSE){      
                                 $sku=array(); 
                                 $sku_n=array();
                                 $sku_m=array();
                                 $notmatched=array();
                                 $matching=array();
                                 $existing=array();
                                 $matchakeneo=array();
                                 $newexisting=array();
                                 $new_exist_arr[]=array();
                                 $s_check=array();
                                 $Existings[]=array();
                                 $New_Existings[]=array();
                                 while (($data1 = fgetcsv($handle1)) !== FALSE)
                                 {   
                                    $csv_array1[] = $data1;
                                 }	
                                 $header_col=$csv_array1[0];
                                 $new_exist_arr=array($header_col);
                              }

                           foreach ($csv_array as $key => $value) {
                           	array_push($sku_n, $value[0]);   
                           }	
                           $brand= array_search('brand_name', $csv_array1[0]);
                         	foreach ($csv_array1 as $key => $value) {
                              $prefix=str_replace('-', '', $prefix);
                              array_push($sku, $value[0]);
                              if($value[$brand] == $prefix){    
                                 array_push($sku_m, $value[0]);
                              }
                         	}
                           $match=array_intersect($sku, $sku_n);
                           foreach ($match as $key => $value) {
                              $matching[]=$value;
                           }
                           foreach ($csv_array as $key => $value) {
                              for($i=0;$i<count($matching);$i++){
                                 if($matching[$i]==$value[0]){
                                    array_push($existing, $value);
                                 }
                              }
                  
                           }
                           foreach ($existing as $key => $value) {
                              array_push($s_check, $value[0]);
                           }  
                              $nonmatchingexist=array_diff($sku_m , $s_check);
                           foreach ($nonmatchingexist as $key => $value) {
                              $matchakeneo[]=$value;
                           }
                              $column= $existing[0];
                              // $column= $existing;
                              array_push($column,'mpn');
                              $Existings = array($column);
                              $existresult=[];
                           foreach ($existing as $key => $value) {
                              if($key != 0){
                                 if(!in_array($value, $existresult)){
                                    array_push($existresult, $value);
                                 }
                              }
                           }
                           foreach ($existresult as $key => $value) {
                              $pos = count($value)+1;
                           if(!empty($prefix)){
                              $MPN=substr($value[0],3);
                              $result = array_merge(array_slice($value, 0, $pos), array($MPN), array_slice($value, $pos));
                           }
                           else{
                              $result=$value;
                           }
                              $Existings[]=$result;
                           }
                              
                   /****************************Existing Array********************************/        
                     $efile='Product-Existing-'.date("d-m-y").'-'.time().'.csv';
                     //$dir1="/home/rdevarona/pim.sdiebiz.net/public/relight/existingcsv/".$efile;
                     $dir1= __DIR__."/existingcsv/".$efile;
                     $f = fopen($dir1, "w");
                     $exist_count=count($Existings)-1;
                     foreach ($Existings as $line) {
                       fputcsv($f,$line);
                       
                     }
                     
                     foreach ($csv_array1 as $key => $value) {
                        for($i=0;$i<count($matchakeneo);$i++){
                           if($matchakeneo[$i]==$value[0]){
                              $new_exist_arr[]=$value;
                           }
                        }
                     }
                       
                     $AkeneoExist[]=array('sku','brand_name');
                     $dis_con=[];
                      foreach ($new_exist_arr as $key => $value) {
                        if($key != 0){
                           if(!in_array($value, $dis_con)){
                              array_push($dis_con, $value);
                           }
                        }
                      }

                     foreach ($dis_con as $key => $value) {
                        $AkeneoExist[]=array($value[0],$value[18]);
                     }
                      /****************************Discontinued Array********************************/    
                     $nafile='Discontinued-'.date("d-m-y").'-'.time().'.csv';
                     // $dir2="/home/rdevarona/pim.sdiebiz.net/public/relight/akeneo_csv/".$nafile;
                     $dir2=__DIR__."/akeneo_csv/".$nafile;
                     $f = fopen($dir2, "w");
                     $ak_count=count($AkeneoExist)-1;
                     foreach ($AkeneoExist as $line) {
                        fputcsv($f, $line);
                     }
                     // $handle_e = fopen('/home/rdevarona/pim.sdiebiz.net/public/relight/existingcsv/'."$efile", "r")
                     if (($handle_e = fopen(__DIR__.'/existingcsv/'."$efile", "r")) !== FALSE) {   
                        $skunew=array(); 
                        $new=array();
                        $nonmatching=array();  
                        
                        while (($data_e = fgetcsv($handle_e)) !== FALSE)
                        {   
                        $csv[] = $data_e;
                        }
                     }
                     foreach ($csv as $key => $value) {
                        array_push($skunew, $value[0]);
                     }
                     $nonmatch=array_diff($sku_n, $skunew);
                     foreach ($nonmatch as $key => $value) {
                           $nonmatching[]=$value;
                     }
                     $keys[] = $csv_array[0];
                     //$keys[] = $csv_array;
                     foreach ($csv_array as  $value_nonmatch) {
                        for($i=0;$i<count($nonmatching);$i++) {
                           if($nonmatching[$i]==$value_nonmatch[0]){
                              array_push($new, $value_nonmatch);
                           }
                        }

                     }
						$array_new=array_merge($keys,$new);
                  $column_n= $array_new[0];
                  array_push($column_n, 'product_name','description','item_weight','item_weight-unit','mpn');
                  $New_Existings = array($column_n);
                  $result=[];    
                  foreach ($array_new as $key => $value) {
                        if($key != 0){
                           if(!in_array($value, $result)){
                           array_push($result, $value);
                           }
                        }
                  }
                           
                  foreach ($result as $key => $valueNew) {
                     $pos = count($valueNew)+1;
                     if(!empty($prefix)){
                     $MPN=substr($valueNew[0],3);
                     $result = array_merge(array_slice($valueNew, 0, $pos), array($MPN), array_slice($valueNew, $pos));
                     }
                     else{
                     $result=$valueNew;
                     }
                     $New_Existings[]=$result;
                  }

                  /****************************New Array********************************/    
                  $nfile='Product-New-'.date("d-m-y").'-'.time().'.csv';
                  // $dir1="/home/rdevarona/pim.sdiebiz.net/public/relight/newcsv/".$nfile;
                  $dir1= __DIR__."/newcsv/".$nfile;
                  $f = fopen($dir1, "w");
                  $n_count=count($New_Existings)-1;
                  foreach ($New_Existings as $line) {
                     fputcsv($f,$line);
                  }
               
                  ?>
                    

                     <div class="download-pdf-entire-sec">
                        <div class="download-pdf-sec">
                           <div class="modify">
                             <h2 class="maps-title_exist">Total Number of New Products:<span><?php echo  $n_count;?></span></h2> 

                              <div class="pdf-icon"> 
                                 <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                              </div>
                              <!-- 
                              <a href="https://pim.sdiebiz.net/relight/newcsv/< ?php echo $nfile; ?>" id="download" class="export-btn"> -->
                              <a href="http://localhost/relight/newcsv/<?php echo $nfile; ?>" id="download" class="export-btn">
                                 <i class="fa fa-download" aria-hidden="true"></i>
                                  New Products CSV
                              </a>
                              
                              <!-- <a href="https://pim.sdiebiz.net/relight/updated_new.php"  class="export-btn updated_new" target="_blank"> -->
                              <a href="http://localhost/relight/updated_new.php"  class="export-btn updated_new" target="_blank">
                              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Update Sale Price
                              </a>
                           </div>
                     </div>
                     <div class="download-pdf-sec">
                           <div class="modify">
                             <h2 class="maps-title_exist">Total Number of Existing Products :<span><?php echo  $exist_count;?></span></h2> 
                              <div class="pdf-icon"> 
                                 <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                              </div>


                              <!--              
                               <a href="https://pim.sdiebiz.net/relight/existingcsv/< ?php echo $efile; ?>" id="download" class="export-btn">
                            -->

                              <a href="http://localhost/relight/existingcsv/<?php echo $efile; ?>" id="download" class="export-btn">
                                 <i class="fa fa-download" aria-hidden="true"></i>
                             Existing Products CSV
                              </a>
                               <a href="http://localhost/relight/updated_exist.php"  class="export-btn updated_exist" target="_blank">

                               <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Update Sale Price
                              </a>
                              
                           </div>
                     </div>
                        <div class="download-pdf-sec">
                           <div class="modify">
                                 <h2 class="maps-title_exist">
                                    Total Number of Discontinued Products:
                                    <span>
                                       <?php echo  $ak_count;?>
                                    </span>
                                 </h2> 

                                 <div class="pdf-icon"> 
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                 </div>
                                 <a href="http://localhost/relight/akeneo_csv/<?php echo $nafile; ?>" id="download" class="export-btn">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    Discontinued Product CSV
                                 </a>
                              </div>
                        </div>
                        <?php
                            $filtedCsvData=[];
                           $simpleData=[];
                           $productFileData=[];
                           $ProductCsvData=[];
                          $simpleProductFile =fopen(__DIR__."/newcsvfile/simple_product.csv","r");
                          $productFile = fopen(__DIR__."/csvupload/Product.csv","r");
                          $x=0;
                          while (($simpleProductData = fgetcsv($simpleProductFile)) !== FALSE) {
                           if($x != 0){
                                 $skuData= $simpleProductData[2];
                                 $productId =$simpleProductData[1];
                                 if ($productId == 0) {
                                 } else {
                                    $simpleData[] = array($skuData);
                                 }
                              }
                              $x++;
                          }
                          fclose($simpleProductFile);
                          while (($productData = fgetcsv($productFile,10000,',')) !== FALSE) {
                              $productFileData[] = $productData;
                              }
                              $skucount= count($simpleData);
                              for ($i=0;$i< $skucount;$i++) {
                               $j = 0;
                               foreach ($productFileData as $product) {
                                if ($simpleData[$i][0]==$product[4]) {
                                    $ProductCsvData[]=$product;
                                 }
                                 $j++;
                               }
                               
                              }
                             
                              fclose($productFile);
                              @$filtedCsvData[]=array('Product Name','Product Code/SKU','Bin Picking Number', 'Brand Name','Product Description','Price','Cost Price','Retail Price','Sale Price','Fixed Shipping Cost','Free Shipping','Product Warranty','Product Weight','Category','Product Image URL - 1',
                               'Product Image ID - 1','Product Image File - 1','Product Image Description - 1','Product Image Is Thumbnail - 1','Product Image Sort - 1','Page Title','Meta Keywords','Meta Description','Product Custom Fields');

                              $fileName='Product-'.date("d-m-y").'-'.time().'.csv';
                              $downloadDir= __DIR__."/newcsvfile/".$fileName;
                              $fileOpen = fopen($downloadDir, "w");
                              $datacount=count($ProductCsvData)-1;
                              foreach ($ProductCsvData as $csvData) {
                                 $productName=$csvData[2];
                                 $productSkuCode=$csvData[4];
                                 $binPicking=$csvData[5];
                                 $brandName=$csvData[6];
                                 $productDescription=$csvData[9];
                                 $price=$csvData[10];
                                 $costPrice=$csvData[11];
                                 $retailPrice=$csvData[12];
                                 $salePrice=$csvData[13];
                                 $FixedShippingCost = $csvData[14];
                                 $freeShipping=$csvData[15];
                                 $productWarrenty=$csvData[16];
                                 $productWeight=$csvData[17];
                                 $category=$csvData[29];
                                 $productImageURL=$csvData[30];
                                 $productImageId=$csvData[31];
                                 $productImageFile=$csvData[32];
                                 $productImageDesc=$csvData[33];
                                 $productImageThumb=$csvData[34];
                                 $productImageSort=$csvData[35];
                                 $pageTitle=$csvData[109];
                                 $metaKeywords=$csvData[110];
                                 $metaDescription=$csvData[111];
                                 $productCustomFeild=$csvData[132];
                                 @$filtedCsvData[]=array($productName,$productSkuCode,$binPicking,$brandName,$productDescription,$price,$costPrice,$$retailPrice,$salePrice, $FixedShippingCost,$freeShipping,$productWarrenty, $productWeight,$category,$productImageURL,$productImageId,$productImageFile,$productImageDesc ,$productImageThumb,
                                 $productImageSort, $pageTitle , $metaKeywords ,$metaDescription,   $productCustomFeild);
                                 
                              }
                              foreach($filtedCsvData as $newData){
                                 fputcsv($fileOpen,$newData);
                              }
                         ?>
                        <div class="download-pdf-sec">
                           <div class="modify">
                                 <h2 class="maps-title_exist">
                                    Total Number Simple Products:
                                    <span>
                                       <?php echo $datacount; ?>
                                    </span>
                                 </h2> 
                                 <div class="pdf-icon"> 
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                 </div>
                                 <a href="http://localhost/relight/newcsv/<?php echo $nfile; ?>" id="download" class="export-btn">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                   Simple Product CSV
                                 </a>
                              </div>
                        </div>
                 </div>
               </div>
            </section>
         </div>
         <!-- ========================today changes starts================== -->
      </div>
     
   </body>
</html>
