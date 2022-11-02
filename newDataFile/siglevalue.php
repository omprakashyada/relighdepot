<?php
$singleData=[];
$finaldata=[];
$singleFiles=fopen(__DIR__."/files/sigle_file.csv", "r");
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
        return [str_replace("[S]","",@$v[3]) =>$v[4],'parent_sku' => $v[0],'child_sku'=> $v[1],'product_id' =>$v[2]];
    },$singleData);
}
echo "<pre>";
print_r($result);
 @$filtedCsvData[]=array('product_id','parent_sku','child_sku','Color Temperature (CCT)','Finish Options','Light Source Options','Select Light Source','End Cap Finish Options','Letter Color Options','Wattage Options','Main Cable Length','Select Size','Metal Trim Ring Finish','Wattage & Lumen Options','Finial & Globe Options','Lamp / Ballast Options','Lamp & Ballast Options','Fixture Options','Control Options','Round Trim Ring Options','Square Trim Ring Options','Voltage','Wattage / Lumen Options','[RB]Color Temperature (CCT)','Reflector','Color','Color Temperature','Select Size (W x L)','Voltage Options','Length/Wattage Options','Mounting Options','Color Te\mperature (CCT)','Housing Color Options','Size & Wattage Options','Rod Set Options','Spool Length','Lamp Options','Lens Options','Size & Lamps Options','Watts & Bollard Options', 'Wattage & VA Rating','Wattage & Battery Type','Wattage & Lens Options','Soft Connector Options','Cable Options','Battery Options','Sensor Options','Distribution Options','Voltage Rating Options','Beam Angle Options','Lumens','Testing', 'Dimming Options', 'CCT Options','Finish Option','Output Wattage Options','Number of Channels & Wattage Options','Length / Wattage Options','Length & Wattage Options');

 $fileName='single-varient-data-'.date("d-m-y").'-'.time().'.csv';
 $downloadDir=__DIR__."/export_files/".$fileName;
 $fileOpen = fopen($downloadDir, "w");
 foreach ($result as $csvData) {
     @$product_id=$csvData['product_id'];
     @$parent_sku=$csvData['parent_sku'];
     @$child_sku=$csvData['child_sku'];
     @$colorTemparatorecct=$csvData['Color Temperature (CCT)'];
     @$finishOption=$csvData['Finish Options'];
     @$lightSource=$csvData['Light Source Options'];
     @$selectLight=$csvData['Select Light Source'];
     @$endCap=$csvData['End Cap Finish Options'];
     @$letterColor=$csvData['Letter Color Options'];
     @$wattegeOp=$csvData['Wattage Options'];
     @$mainCableLenght=$csvData['Main Cable Length'];
     @$selectSize=$csvData['Select Size'];
     @$metaltrim=$csvData['Metal Trim Ring Finish'];
     @$wattegeAndLumen=$csvData['Wattage & Lumen Options'];
     @$finalGlobe=$csvData['Finial & Globe Options'];
     @$lampBallest=$csvData['Lamp / Ballast Options'];
     @$lampAndBallesttwo=$csvData['Lamp & Ballast Options'];
     @$fixtureOption=$csvData['Fixture Options'];
     @$controleOp=$csvData['Control Options'];
     @$roundTrim=$csvData['Round Trim Ring Options'];
     @$squreTrim=$csvData['Square Trim Ring Options'];
     @$voltage=$csvData['Voltage'];
     @$wattegeAndLumenTwo=$csvData['Wattage / Lumen Options'];
     @$rbColor=$csvData['[RB]Color Temperature (CCT)'];
     @$reflactor=$csvData['Reflector'];
     @$color=$csvData['Color'];
     @$colorTemp=$csvData['Color Temperature'];
     @$SelectSizewl=$csvData['Select Size (W x L)'];
     @$voltageOption=$csvData['Voltage Options'];

     @$lengthWattege=$csvData['Length/Wattage Options'];
     @$mounting=$csvData['Mounting Options'];
     @$colorTemTwo=$csvData['Color Te\mperature (CCT)'];
     @$housing=$csvData['Housing Color Options'];
     @$sizeAndWattege=$csvData['Size & Wattage Options'];
     @$rodset=$csvData['Rod Set Options'];
     @$spoollength=$csvData['Spool Length'];
     @$lampOption=$csvData['Lamp Options'];
     @$lenseOption=$csvData['Lens Options'];
     @$sizeandLamp=$csvData['Size & Lamps Options'];
     @$wattAndBollardOption=$csvData['Watts & Bollard Options'];
     @$wattegeAndVarating=$csvData['Wattage & VA Rating'];
     @$wattegeBatterry=$csvData['Wattage & Battery Type'];
     @$wattegeAndLense=$csvData['Wattage & Lens Options'];
     @$softconnectorOption=$csvData['Soft Connector Options'];
     @$cableOption=$csvData['Cable Options'];
     @$batteryOption=$csvData['Battery Options'];
     @$SensorOptions=$csvData['Sensor Options'];
     @$distribution=$csvData['Distribution Options'];
     @$VoltageRatingOptions=$csvData['Voltage Rating Options'];
     @$beamAngleOption=$csvData['Beam Angle Options'];
     @$lumen=$csvData['Lumens'];
     @$testing=$csvData['Testing'];
     @$dimmingOption=$csvData['Dimming Options'];
     @$CCTOptions=$csvData['CCT Options'];
     @$finishTwo=$csvData['Finish Option'];
     @$outputWattege=$csvData['Output Wattage Options'];
     @$numberChannel=$csvData['Number of Channels & Wattage Options'];
     @$LengthWattageOptionstwo=$csvData['Length / Wattage Options'];
     @$lengthAndwattege=$csvData['Length & Wattage Options'];

   @$filtedCsvData[]=array(@$product_id,@$parent_sku,@$child_sku, @$colorTemparatorecct,@$finishOption,@$lightSource,@$selectLight,@$endCap,@$letterColor,@$wattegeOp, @$mainCableLenght,@$selectSize,@$metaltrim,@$wattegeAndLumen,@$finalGlobe, @$lampBallest,@$lampAndBallesttwo,@$fixtureOption,@$controleOp,@$roundTrim,@$squreTrim,@$voltage, @$wattegeAndLumenTwo,@$rbColor, @$reflactor,@$color,@$colorTemp,@$SelectSizewl,@$voltageOption,@$lengthWattege,@$mounting,@$colorTemTwo, @$housing,@$sizeAndWattege,@$rodset,@$spoollength,@$lampOption,@$lenseOption, @$sizeandLamp, @$wattAndBollardOption,@$wattegeAndVarating,@$wattegeBatterry,@$wattegeAndLense,@$softconnectorOption,@$cableOption, @$batteryOption,@$SensorOptions,@$distribution,@$VoltageRatingOptions,@$beamAngleOption ,@$lumen,@$testing,@$dimmingOption,@$CCTOptions,@$finishTwo,@$outputWattege,@$outputWattege, @$numberChannel,  @$LengthWattageOptionstwo,@$lengthAndwattege);
 }
 foreach($filtedCsvData as $newData){
     fputcsv($fileOpen,$newData);
 }


?>
     
     