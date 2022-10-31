<?php
$productFileData=[];
$modelData=[];
$childSkuData=[];
$allData=[];
$withSkuData=[];
$allProductFile=fopen("C:/xampp/htdocs/relight/csvupload/Product.csv","r");
$modelProductFile=fopen("C:/xampp/htdocs/relight/simple_and_model_data/model_data31-10-22.csv","r");
while (($productData = fgetcsv($allProductFile)) !== FALSE) {
  $productFileData[] = $productData; 
}
fclose($allProductFile);
$x=0;
while (($modelProductData = fgetcsv($modelProductFile)) !== FALSE) {
    if($x != 0) {
        $parentSku= $modelProductData[1];
        $childSku= $modelProductData[2];
        $productId=$modelProductData[0];
        if($productId == 0) {
        } else {
           $modelData[] =array(
              'child_sku' => $childSku,
              'parent_sku' =>$parentSku
            );
        }
    }
     $x++;
}
fclose($modelProductFile);
$a=0;
foreach($modelData as $childData) {
    $arr=array(
      "data" => explode(",",$childData['child_sku'])
    );
    echo "<pre>";
    print_r($arr);
    $additional = array($a++ =>$childData['parent_sku']);
    $arr['data'] = array_merge($arr['data'], $additional);
    array_push($childSkuData,$arr);
}
$newArrayData=[];
foreach($childSkuData as $childArrayData) {
  foreach($childArrayData as $data) {
    $newArrayData[]=$data;
  }
}
$productCsvData=[];
foreach($newArrayData as $skuData) {
  $parentData=array_pop($skuData);
  for($k=0;$k < count($skuData);$k++) {
    $j=0;
    foreach($productFileData as $product) {
      if($skuData[$k]==$product[4]) {
        $productCsvData[]=array(
          'product' => $product,
          'parent_sku' => $parentData,
          'child_sku' => $skuData[$k], 
        );
      }
      $j++;
    }
  }
}


$newArraypushed=[];
foreach($productCsvData as $arrayData) { 
   $newFetureData=(explode(',[S]',$arrayData['product'][2]));
   $filterData=(array_filter($newFetureData));
    $countArray=count($filterData);
      if($countArray > 0){
        $dataArray=[];
        for($i=0;$i < $countArray; $i++){
          $dataArray[]=(explode('=',$filterData[$i]));
        }
       
      
        $result=[];
        for($k=0;$k< count($dataArray);$k++) {
          $result = array_map(function($v){
                $replace=array('[RB]','[S]','[RT]');
              return [str_replace($replace,"",@$v[0]) => @$v[1]];
          }, $dataArray);
         }
        $newArray = array();
         $result_array = array();
         foreach ($result as $val) {
           foreach ($val as $key => $inner_val) {
             $result_array[$key] = $inner_val;
           }
         }
         $famkey=[];
        foreach($result_array as  $sy => $resval) {
            $famkey[]=$sy;
        }
        $newfamily=implode(',',$famkey);
         $additional = array(
          'parent_sku' => $arrayData['parent_sku'],
          'child_sku' => $arrayData['child_sku'],
          'family' => $newfamily,
        );
        array_push($withSkuData,array_merge($additional,$result_array));
        }   
    }

   
    $newUniqueData=(array_unique($withSkuData,SORT_REGULAR));
    $finalData=[];
    foreach($newUniqueData as $parentDataArray) {
      array_push($finalData,$parentDataArray); 
    }
   
    @$filtedCsvData[]=array('parent_sku','family_count','child_sku','Color Temperature (CCT)','Finish Options','Factory Installed Lamps','Wiring Options','End Cap Finish Options','Lamp Type Options','Select Reflector','Voltage Options','Wattage Options','Letter Color Options','Number of Faces','Wattage & Lumen Options','Fixture Wattage','Color','Main Cable Length','Lens Options','Height Options','Wattage & Optics Options','Driver Option','LED Module & Wattage Options','End Cap Options','WattageOptions','Pendant Mounting Kit','Beam Angle Options','Mounting Options','Trim Ring Finish','Select Finish (Reflectors & Baffles)','Length & Wattage Options','Output Wattage Options','Output Voltage Options','Wattage & Optics/Beams Options','Connector Type Options','Emergency Battery Options','Trimplate Options','Occupancy Sensor','Trim Options','Size\, Wattage & Lumen Options','Size & Wattage Options','Control Options','Square Trim Ring Options','Round Trim Ring Options','Accessories Options','Trim Shape Options','Color Te\,mperature (CCT)','Reflector Options','Reflector','Reflector Finish','Color Temperature','Fixture Options','Color Temperat','Frosted Lens','Distribution Options');

    $fileName='All-Varients-Value'.date("d-m-y").'-'.time().'.csv';
    $downloadDir=__DIR__."/parent-all-data/".$fileName;
    $fileOpen = fopen($downloadDir, "w");
    foreach ($finalData as $csvData) {
      @$parent_sku=$csvData['parent_sku'];
      @$childSku=$csvData['child_sku'];
      @$familyData=$csvData['family'];
      @$colorTemp=$csvData['Color Temperature (CCT)'];
      @$finishOption=$csvData['Finish Options'];
      @$factoryInstalled=$csvData['Factory Installed Lamps'];
      @$WiringOptions =$csvData['Wiring Options'];
      @$endCap=$csvData['End Cap Finish Options'];
      @$lamppType=$csvData['Lamp Type Options'];
      @$selectReflactore=$csvData['Select Reflector'];
      @$Voltage=$csvData['Voltage Options'];
      @$wattegeOption=$csvData['Wattage Options'];
      @$letterColor=$csvData['Letter Color Options'];
      @$NumberOfFaces=$csvData['Number of Faces'];
      @$wattageAndLumen=$csvData['Wattage & Lumen Options'];
      @$fixtureWatt=$csvData['Fixture Wattage'];
      @$color=$csvData['Color'];
      @$mainCable=$csvData['Main Cable Length'];
        @$lenseOption=$csvData['Lens Options'];
        @$lens=str_replace('[RB]Finish Options',"",$lenseOption);
      @$heightOption=$csvData['Height Options'];
      @$opticeOption=$csvData['Wattage & Optics Options'];
      @$driverType=$csvData['Driver Option'];
      @$ledModual=$csvData['LED Module & Wattage Options'];
      @$endcapOption=$csvData['End Cap Options'];
      @$wattageAndOption=$csvData['WattageOptions'];
      @$pendentMountain=$csvData['Pendant Mounting Kit'];
      @$beamAngle=$csvData['Beam Angle Options'];
      @$mounting=$csvData['Mounting Options'];
      @$trimRing=$csvData['Trim Ring Finish'];
      @$selectBaffels=$csvData['Select Finish (Reflectors & Baffles)'];
      @$lengthAndWattege=$csvData['Length & Wattage Options'];
      @$outputWattege=$csvData['Output Wattage Options'];
      @$outputVoltaege=$csvData['Output Voltage Options'];
      @$wattegeAndBeam=$csvData['Wattage & Optics/Beams Options'];
      @$connectoreOption=$csvData['Connector Type Options'];
      @$emergencyBattery=$csvData['Emergency Battery Options'];
      @$trimpleOption=$csvData['Trimplate Options'];
      @$occupencySensor=$csvData['Occupancy Sensor'];
      @$trimOption=$csvData['Trim Options'];
      @$sizeOption=$csvData['Size\, Wattage & Lumen Options'];
      @$sizeWattege=$csvData['Size & Wattage Options'];
      @$controlOption=$csvData['Control Options'];
      @$squreTrim=$csvData['Square Trim Ring Options'];
      @$RoundTrime=$csvData['Round Trim Ring Options'];
      @$accessories=$csvData['Accessories Options'];
      @$trimShapOption=$csvData['Trim Shape Options'];
      @$colorTempTwo=$csvData['Color Te\,mperature (CCT)'];
      @$reflectoreOption=$csvData['Reflector Options'];
      @$reflactore=$csvData['Reflector'];
      @$reflactoreFinish=$csvData['Reflector Finish'];
      @$colorTempThree=$csv['Color Temperature'];
      @$fixtureOption=$csvData['Fixture Options'];
      @$colorTemprat=$csvData['Color Temperat'];
      @$frosted=$csvData['Frosted Lens'];
      @$distribution=$csvData['Distribution Options'];
      @$array_data = explode(",",$familyData);
      @$varientCount = count($array_data);
      @$filtedCsvData[]=array(@$parent_sku,@$varientCount,@$childSku,@$colorTemp,@$finishOption,@$factoryInstalled, @$WiringOptions,@$endCap,@$lamppType,@$selectReflactore,@$Voltage,@$wattegeOption,@$letterColor,@$NumberOfFaces,@$wattageAndLumen,@$fixtureWatt,@$color,@$mainCable,@$lens,@$heightOption,@$opticeOption,@$driverType,@$ledModual,@$endcapOption,@$wattageAndOption,@$pendentMountain,@$beamAngle,@$mounting,@$trimRing,@$selectBaffels,@$lengthAndWattege,@$outputWattege,@$outputVoltaege,@$wattegeAndBeam,@$connectoreOption,@$emergencyBattery,@$trimpleOption,@$occupencySensor,@$trimOption,@$sizeOption,@$sizeWattege,@$controlOption,@$squreTrim,@$RoundTrime,@$accessories,@$trimShapOption,@$colorTempTwo,@$reflectoreOption,@$reflactore,@$reflactoreFinish,@$colorTempThree,@$fixtureOption,@$colorTemprat,@$frosted, @$distribution);
    }
    foreach($filtedCsvData as $newData){
        fputcsv($fileOpen,$newData);
    }


?>