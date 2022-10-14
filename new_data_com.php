
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
$allData=[];
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

$newArrayData=[];
$row=0;
$productSku='';
$productSku=[];
$additional=[];
$fileOpen=fopen(__DIR__."/newcsvfile/".$latestFilename,"r"); //product file.
while (($data = fgetcsv($fileOpen)) !== FALSE) {
    if($row== 0) {
        $row++; 
    } else {
        if($data[23] ==''){
        } else {
            $arr=array(
                'product_custom_feild' => explode(";",$data[23]),
            );
            $additional = array('"product_sku='.$data[1].'"');
            $arr['product_custom_feild'] = array_merge($arr['product_custom_feild'], $additional);
            array_push($newArrayData,$arr); 
        }
    }
   
}

$newArrayDataValue=[];
foreach($newArrayData as $customValue) {
    $newArrayDataValue=[];
    foreach($customValue as $value) {
    array_push($newArrayDataValue,$value);
    }
    $dataArray=[];
   for ($i=0; $i < count($newArrayDataValue) ; $i++) { 
        for($j=0;$j <count($newArrayDataValue[$i]); $j++) {
            $dataArray[]=(explode('=',$newArrayDataValue[$i][$j]));
        }
   }
   $result=[];
   for($k=0;$k< count($dataArray);$k++) {
        $result = array_map(function($v){
            return [@$v[0] => @$v[1]];
        }, $dataArray);
   }
    $newArray = array();
    foreach($result as $key => $value) {
        foreach($value as $key2 => $value2) {
            $newArray[$key2] =str_replace('"', "",$value2);
        }
    }
   array_push($allData,$newArray);
}


$filtedCsvData[]=array('Product_sku' ,'Light_Source','Fixture_Size','Listings and Ratings','Ballast and Voltage','Color Rendering Index (CRI)','Driver Type','Lumen Output','L70 Expected Life (hours)','L90 Expected Life (hours)','Color Temperature','Total Input Watt','Total Input Watts','Pack Size','Luminaire Efficacy Rating (LER)','Color Temperature (CCT)','Max Ambient Temp','Lamp Count','Lens','Socket','Application','Insulation Rating','__alsobought','Rated Life','Max Ambient');

// $fileName='new-simple-Product-'.date("d-m-y").'-'.time().'.csv';
// $downloadDir= __DIR__."/newproduct/".$fileName;
// $fileOpen = fopen($downloadDir, "w");

// foreach($allData as $csvData) {
//     @$product_sku=$csvData['"product_sku'];
//     @$light_source=$csvData['"Light Source'];
//     @$fixture_size=$csvData['"Fixture Size'];
//     @$lightRating=$csvData['"Listings and Ratings'];
//     @$lightBallest=$csvData['"Ballast and Voltage'];
//     @$colorRender=$csvData['"Color Rendering Index (CRI)'] ;
//     @$driver_type=$csvData['"Driver Type'];
//     @$lumenOutput=$csvData['"Lumen Output'];
//     @$expectedLife=$csvData['"L70 Expected Life (hours)'];
//     @$l_expectedlif=$csvData['"L90 Expected Life (hours)'];
//     @$colorTemp=$csvData['"Color Temperature'];
//     @$inputWatt=$csvData['"Total Input Watt'];
//     @$totalWatts=$csvData['"Total Input Watts'];
//     @$packSize=$csvData['"Pack Size'];
//     @$efficiancy=$csvData['"Luminaire Efficacy Rating (LER)'];
//     @$colorTempCct=$csvData['"Color Temperature (CCT)'];
//     @$maxEmbientTemp=$csvData['"Max Ambient Temp'];
//     @$lampCount=$csvData['"Lamp Count'];
//     @$lense=$csvData['Lens'];
//     @$socket=$csvData['Socket'];
//     @$application = $csvData['Application'];
//     @$insulationRating = $csvData['"Insulation Rating'];
//     @$alsobought = $csvData['__alsobought'];
//     @$ratedLife = $csvData['"Rated Life'];
//     @$maxAmbient = $csvData['"Max Ambient'];
//     @$filtedCsvData[]=array(@$product_sku,@$light_source,@$fixture_size,@$lightRating, @$lightBallest,@$colorRender,@$driver_type,@$lumenOutput,@$expectedLife,@$l_expectedlif,@$colorTemp,@$inputWatt,@$totalWatts,@$packSize,@$efficiancy,@$colorTempCct,@$maxEmbientTemp,@$lampCount,@$lense,@$socket,@$application,@$insulationRating,@$alsobought,@$ratedLife,@$maxAmbient);
// }
// foreach($filtedCsvData as $newData){
//     fputcsv($fileOpen,$newData);
// }

?>
