<?php
$productFileData=[];
$modelData=[];
$childSkuData=[];
$allData=[];
$withSkuData=[];
$allProductFile=fopen("C:/xampp/htdocs/relight/csvupload/Product.csv","r");
$modelProductFile=fopen("C:/xampp/htdocs/relight/modelproduct/model_product.csv","r");
while (($productData = fgetcsv($allProductFile)) !== FALSE) {
  $productFileData[] = $productData; 
}
fclose($allProductFile);
$x=0;
while (($modelProductData = fgetcsv($modelProductFile)) !== FALSE) {
    if($x != 0) {
        $parentSku= $modelProductData[2];
        $childSku= $modelProductData[3];
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
              return [str_replace('[S]',"",@$v[0]) => @$v[1]];
          }, $dataArray);
         }
        $newArray = array();
         $result_array = array();
         foreach ($result as $val) {
           foreach ($val as $key => $inner_val) {
             $result_array[$key] = $inner_val;
           }

         }
         $additional = array(
          'parent_sku' => $arrayData['parent_sku'],
          'child_sku' => $arrayData['child_sku'],
        );
        array_push($withSkuData,array_merge($additional,$result_array));
        }   
    }
    $factoryAndWiring=[];
    $endCapLampType=[];
    $selectRefAndVoltage=[];
    $wattegLumenAndColor=[];
    $wattegeAndColor=[];
    $outputAndFixtuerWatt=[];
    $endCapAndColor=[];
    $ledModulAndColor=[];
    $FixtureAndColor=[];
    $reflectoreAndMetalFinish=[];
    $WattegeAndVoltageFinish=[];
    $finishAndVoltageFinish=[];
    $finishAndFacePlate=[];
    $VoltageAndColor=[];
    $BeamAngleAndColor=[];
    $finishOptionAndColor=[];
    $LumenPackOptionAndColor=[];
    $sizeWattegeOptionAndColor=[];
    $WattegeAndLumenOptionAndColor=[];
    $FixtureWattegeOptionAndColor=[];
    $finishOptionAndTrim=[];
    $selectFinishAndColor=[];
    $finishAndHeight=[];
    $lengthAndAndColor=[];
    $outputWattegeAndVoltage=[];
    $rtColorAndBeam=[];
    $wiringAndColor=[];
    $lamppAndColor=[];
    $fixtureSizeAndColor=[];
    $WattAndLumenAndColor=[];
    $WattAndOpticeAndColor=[];
    $VoltageAndLens=[];
    $mountingAndColor=[];
    $lengthAndFinish=[];
    $trimplateAndColor=[];
    $occupancyAndColor=[];
    $WattAndTrimOption=[];
    $sizeWattLumenAndColor=[];
    $accessoriesAndColor=[];
    $lenseAndColor=[];
    $lightDistriAndColor=[];
    $mountingAndControl=[];
    $wattegeAndLumenColor=[];
    $trimShapColor=[];
    $finishAndLetter=[];
    $colorAndcolorTemp=[];
    $emergencyBatteryAndFinish=[];
    $reflectoreOpAndcolorTemp=[];
    $rbColorAndColorTemp=[];
    $frostedAndColorTemp=[];
    $trimRingAndColorTemp=[];
    $letterAndColorTemp=[];
    $reflactoreAndColorTemp=[];
    $reflactoreFinishAndColorTemp=[];
foreach($withSkuData as $WithskuValue) {
  if(count($WithskuValue) == 4) {
    if(@$WithskuValue['Factory Installed Lamps'] && @$WithskuValue['Wiring Options'] ) {
      array_push($factoryAndWiring,$WithskuValue);
    }else if(@$WithskuValue['End Cap Finish Options'] && @$WithskuValue['Lamp Type Options']) {
      array_push($endCapLampType,$WithskuValue);
    }else if(@$WithskuValue['Select Reflector'] && @$WithskuValue['Voltage Options']) {
      array_push($selectRefAndVoltage,$WithskuValue);
    }else if(@$WithskuValue['Wattage & Lumen Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($wattegLumenAndColor,$WithskuValue);
    }else if(@$WithskuValue['Output Voltage'] && @$WithskuValue['Fixture Wattage']) {
      array_push($outputAndFixtuerWatt,$WithskuValue);
    }else if(@$WithskuValue['Wattage Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($wattegeAndColor,$WithskuValue);
    }else if(@$WithskuValue['End Cap Finish Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($endCapAndColor,$WithskuValue);
    }else if(@$WithskuValue['LED Module & Wattage Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($ledModulAndColor,$WithskuValue);
    }else if(@$WithskuValue['Fixture Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($FixtureAndColor,$WithskuValue);
    }else if(@$WithskuValue['Reflector Finish'] && @$WithskuValue['Metal Trim Ring Finish']) {
      array_push($reflectoreAndMetalFinish,$WithskuValue);
    }else if(@$WithskuValue['Wattage Options'] && @$WithskuValue['Voltage Options']) {
      array_push($WattegeAndVoltageFinish,$WithskuValue);
    }else if(@$WithskuValue['Finish Options'] && @$WithskuValue['Voltage Options']) {
      array_push($finishAndVoltageFinish,$WithskuValue);
    }else if(@$WithskuValue['Finish Options'] && @$WithskuValue['Face Plate Style']) {
      array_push($finishAndFacePlate,$WithskuValue);
    } else if(@$WithskuValue['Voltage Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($VoltageAndColor,$WithskuValue);
    }else if(@$WithskuValue['Beam Angle Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($BeamAngleAndColor,$WithskuValue);
    }else if(@$WithskuValue['Finish Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($finishOptionAndColor,$WithskuValue);
    }else if(@$WithskuValue['Lumen Package Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($LumenPackOptionAndColor,$WithskuValue);
    }else if(@$WithskuValue['Size & Wattage Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($sizeWattegeOptionAndColor,$WithskuValue);
    }else if(@$WithskuValue['Wattage & Lumen Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($WattegeAndLumenOptionAndColor,$WithskuValue);
    }else if(@$WithskuValue['Fixture Wattage Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($FixtureWattegeOptionAndColor,$WithskuValue);
    }else if(@$WithskuValue['Finish Options'] && @$WithskuValue['Trim Ring Finish']) {
      array_push($finishOptionAndTrim,$WithskuValue);
    }else if(@$WithskuValue['Select Finish (Reflectors & Baffles)'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($selectFinishAndColor,$WithskuValue);
    }else if(@$WithskuValue['Finish Options'] && @$WithskuValue['Height Options']) {
      array_push($finishAndHeight,$WithskuValue);
    }else if(@$WithskuValue['Length & Wattage Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($lengthAndAndColor,$WithskuValue);
    }else if(@$WithskuValue['Output Wattage Options'] && @$WithskuValue['Output Voltage Options']) {
      array_push($outputWattegeAndVoltage,$WithskuValue);
    }else if(@$WithskuValue['Beam Angle Options'] && @$WithskuValue['[RT]Color Temperature (CCT)']) {
      array_push($rtColorAndBeam,$WithskuValue);
    } else if(@$WithskuValue['Wiring Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($wiringAndColor,$WithskuValue);
    } else if(@$WithskuValue['Lamp/Wattage Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($lamppAndColor,$WithskuValue);
    } else if(@$WithskuValue['Fixture Size'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($fixtureSizeAndColor,$WithskuValue);
    }else if(@$WithskuValue['Wattage & Lumen'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($WattAndLumenAndColor,$WithskuValue);
    }else if(@$WithskuValue['Wattage & Optics Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($WattAndOpticeAndColor,$WithskuValue);
    }else if(@$WithskuValue['Voltage Options'] && @$WithskuValue['Lens Options']) {
      array_push($VoltageAndLens,$WithskuValue);
    }else if(@$WithskuValue['Mounting Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($mountingAndColor,$WithskuValue);
    }else if(@$WithskuValue['Length Options'] && @$WithskuValue['Finish Options']) {
      array_push($lengthAndFinish,$WithskuValue);
    }else if(@$WithskuValue['Trimplate Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($trimplateAndColor,$WithskuValue);
    }else if(@$WithskuValue['Occupancy Sensor'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($occupancyAndColor,$WithskuValue);
    }else if(@$WithskuValue['Wattage Options'] && @$WithskuValue['Trim Options']) {
      array_push($WattAndTrimOption,$WithskuValue);
    }else if(@$WithskuValue['Size\, Wattage & Lumen Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($sizeWattLumenAndColor,$WithskuValue);
    }else if(@$WithskuValue['Accessories Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($accessoriesAndColor,$WithskuValue);
    }else if(@$WithskuValue['Lens Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($lenseAndColor,$WithskuValue);
    }else if(@$WithskuValue['Light Distribution Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($lightDistriAndColor,$WithskuValue);
    }else if(@$WithskuValue['Mounting Options'] && @$WithskuValue['Control Options']) {
      array_push($mountingAndControl,$WithskuValue);
    }else if(@$WithskuValue['Wattage / Lumen Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($wattegeAndLumenColor,$WithskuValue);
    }else if(@$WithskuValue['Trim Shape Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($trimShapColor,$WithskuValue);
    }else if(@$WithskuValue['Finish Options'] && @$WithskuValue['Letter Color Options']) {
      array_push($finishAndLetter,$WithskuValue);
    }else if(@$WithskuValue['Finish Options'] && @$WithskuValue['Emergency Battery Options']) {
      array_push($emergencyBatteryAndFinish,$WithskuValue);
    }else if(@$WithskuValue['Color'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($colorAndcolorTemp,$WithskuValue);
    }else if(@$WithskuValue['Reflector Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($reflectoreOpAndcolorTemp,$WithskuValue);
    }else if(@$WithskuValue['Color'] && @$WithskuValue['[RB]Color Temperature']) {
      array_push($rbColorAndColorTemp,$WithskuValue);
    }else if(@$WithskuValue['Frosted Lens'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($frostedAndColorTemp,$WithskuValue);
    }else if(@$WithskuValue['Trim Ring Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($trimRingAndColorTemp,$WithskuValue);
    }else if(@$WithskuValue['Letter Color Options'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($letterAndColorTemp,$WithskuValue);
    }else if(@$WithskuValue['Reflector'] && @$WithskuValue['Color Temperature (CCT)']) {
      array_push($reflactoreAndColorTemp,$WithskuValue);
    }
    
    else if(@$WithskuValue['Reflector Finish'] && @$WithskuValue['Color Temperature']) {
      array_push($reflactoreFinishAndColorTemp,$WithskuValue);
    }
  }
}


// @$header[]=array('parent_sku','child_sku','Color','[RB]Color Temperature');
// $fileName='rbcolor-and-color'.date("d-m-y").'.csv';
// $downloadDir=__DIR__."/double-varient/".$fileName;
// $fileOpen = fopen($downloadDir, "w");
// foreach ($rbColorAndColorTemp as $csvData) {
//     @$parent=$csvData['parent_sku'];
//     @$child=$csvData['child_sku'];
//     @$fct=$csvData['Color'];
//     @$color=$csvData['[RB]Color Temperature'];
//     @$header[]=array(@$parent,@$child,@$fct,@$color);
// }
// foreach($header as $newData){
//   fputcsv($fileOpen,$newData);
// }

// @$new[]=array('parent_sku','child_sku','Frosted Lens','Color Temperature (CCT)');
// $fileName='finishAndLetter'.date("d-m-y").'.csv';
// $downloadDir=__DIR__."/double-varient/".$fileName;
// $fileOpen = fopen($downloadDir, "w");
// foreach ($frostedAndColorTemp as $csvData) {
//     @$parent=$csvData['parent_sku'];
//     @$child=$csvData['child_sku'];
//     @$color=$csvData['Frosted Lens'];
//     @$socond=$csvData['Color Temperature (CCT)'];
//     @$new[]=array(@$parent,@$child,@$color,@$socond);
// }
// foreach($new as $newData){
//   fputcsv($fileOpen,$newData);
// }

// @$newthree[]=array('parent_sku','child_sku','Trim Ring Options','Color Temperature (CCT)');
// $fileName='trim-ring-and-colorTemp'.date("d-m-y").'.csv';
// $downloadDir=__DIR__."/double-varient/".$fileName;
// $fileOpen = fopen($downloadDir, "w");
// foreach ($trimRingAndColorTemp as $csvData) {
//     @$parent=$csvData['parent_sku'];
//     @$child=$csvData['child_sku'];
//     @$color=$csvData['Trim Ring Options'];
//     @$socond=$csvData['Color Temperature (CCT)'];
//     @$newthree[]=array(@$parent,@$child,@$color,@$socond);
// }
// foreach($newthree as $newData){
//   fputcsv($fileOpen,$newData);
// }


// @$newtwo[]=array('parent_sku','child_sku','Letter Color Options','Color Temperature (CCT)');
// $fileName='letterAndColorTemp'.date("d-m-y").'.csv';
// $downloadDir=__DIR__."/double-varient/".$fileName;
// $fileOpen = fopen($downloadDir, "w");
// foreach ($letterAndColorTemp as $csvData) {
//     @$parent=$csvData['parent_sku'];
//     @$child=$csvData['child_sku'];
//     @$color=$csvData['Letter Color Options'];
//     @$socond=$csvData['Color Temperature (CCT)'];
//     @$newtwo[]=array(@$parent,@$child,@$color,@$socond);
// }
// foreach($newtwo as $newData){
//   fputcsv($fileOpen,$newData);
// }
// @$newfour[]=array('parent_sku','child_sku','Reflector','Color Temperature (CCT)');
// $fileName='reflactore-And-ColorTemp'.date("d-m-y").'.csv';
// $downloadDir=__DIR__."/double-varient/".$fileName;
// $fileOpen = fopen($downloadDir, "w");
// foreach ($reflactoreAndColorTemp as $csvData) {
//     @$parent=$csvData['parent_sku'];
//     @$child=$csvData['child_sku'];
//     @$color=$csvData['Reflector'];
//     @$socond=$csvData['Color Temperature (CCT)'];
//     @$newfour[]=array(@$parent,@$child,@$color,@$socond);
// }
// foreach($newfour as $newData){
//   fputcsv($fileOpen,$newData);
// }

@$newfour[]=array('parent_sku','child_sku','Reflector Finish','Color Temperature');
$fileName='reflactoreFinishAndColorTemp'.date("d-m-y").'.csv';
$downloadDir=__DIR__."/double-varient/".$fileName;
$fileOpen = fopen($downloadDir, "w");
foreach ($reflactoreFinishAndColorTemp as $csvData) {
  @$parent=$csvData['parent_sku'];
  @$child=$csvData['child_sku'];
  @$color=$csvData['Reflector Finish'];
  @$socond=$csvData['Color Temperature'];
  @$newfour[]=array(@$parent,@$child,@$color,@$socond);
}
foreach($newfour as $newData){
  fputcsv($fileOpen,$newData);
}






?>