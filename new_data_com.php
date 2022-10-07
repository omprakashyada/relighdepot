<!-- <html>
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
   <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-10" style="col-sm-10" style="margin:10px auto">
            <div class="download-pdf-sec">
                <div class="modify">
                    <h2 class="maps-title_exist">
                    Total Number Simple Products:
                        <span>
                            < ?php echo 1; ?>
                        </span>
                    </h2> 
                    <div class="pdf-icon"> 
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                    </div>
                    <a href="http://localhost/relight/ne/< ?php echo 1; ?>" id="download" class="export-btn">
                    <i class="fa fa-download" aria-hidden="true"></i>
                    Simple Product CSV
                    </a>
                </div>
            </div>
        </div>
        </div>
    </div>
  
   </body>
</html> -->



<?php
session_start(); 
include_once (__DIR__.'/authentication.php');
$servername = "localhost";
$username = "root";
$password = "";
$database='rdevarona_relight_depot_search';
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$newArray=[];
$newData=[];
$path = __DIR__."/newcsvfile"; 
$latestTime = 0;
$latestFilename= '';  
$directory = dir($path);
while (false !== ($entry = $directory->read())) {
    $filePath = "{$path}/{$entry}";
    if (is_file($filePath) && filectime($filePath) > $latestTime) {
        $latestTime = filectime($filePath);
        $latestFilename = $entry;
    }
}
$row=0;
$fileOpen=fopen(__DIR__."/newcsvfile/".$latestFilename,"r");
while (($data = fgetcsv($fileOpen)) !== FALSE) {
    if($row ==0 ){
        $row++; 
    } else {
        if($data[23] == ''){
        } else {
                $newData[]=array(
                    'product_sku' =>$data[1],
                    'product_custom_feild' =>$data[23],
                );
        }
    }
   
}

$customFeildData=[];
$customArray=[];
foreach($newData as $newExplodedData){
    $customFeildData[]=array(
        'sku_data' => $newExplodedData['product_sku'],
        'product' => explode(";",$newExplodedData['product_custom_feild'])
    );
}
$newData=[];
foreach($customFeildData as $custom) {
    $ArrayData[]= array(
        'sku' => $custom['sku_data'],
        'product' => $custom['product'],
    );

    echo "<pre>";
    print_r($ArrayData);

    // foreach($custom as $value) {
    //     foreach($value as $newValue) {
    //         array_push($newData,explode("=",$newValue));
    //     }
    // }
    break;
}
?>