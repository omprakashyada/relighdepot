<?php
$singleData=[];
$finaldata=[];
$singleFiles=fopen(__DIR__."/files/two-varient-data.csv", "r");
$row=0;
while (($productData = fgetcsv($singleFiles)) !== FALSE){
    if($row==0) {
        $row++;
    }else {
        $singleData[]=$productData;
    }
}
fclose($singleFiles);
$result=[];

for($k=0;$k< count($singleData);$k++) {
    $result= array_map(function($v){
        return [str_replace("[S]","",@$v[3]) =>$v[4],str_replace("[S]","",@$v[5]) => $v[6],'parent_sku' => $v[0],'child_sku'=> $v[1],'product_id' =>$v[2]];

    },$singleData);
}
echo "<pre>";
 print_r($result);
 @$filtedCsvData[]=array('product_id','parent_sku','child_sku','Factory Installed Lamps','Wiring Options','Lamp Type Options','End Cap Finish Options','Select Reflector','Voltage Options','Wattage & Lumen Options','Color Temperature (CCT)','Wattage Options','Output Voltage','Fixture Wattage','Finish Options','Height Options','Fixture Option','Reflector Finish','Metal Trim Ring Finish');
$factoryAndWiring=[];
foreach ($result as $csvData) {
 
}

?>