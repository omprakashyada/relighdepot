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
    foreach($withSkuData as $WithskuValue) {
         if(count($WithskuValue) == 4) {
            echo "<pre>";
            print_r($WithskuValue);
        }
    }
//   $colorTemp=[];
//   $finishOptionData=[];
//   $lightSource=[];
//   $selectLightSource=[];
//   $endCapFinish=[];
//   $wattegeOption=[];
//   $mettalTrimFinsh=[];
//   $wattegeandlumen=[];
//   $mainCable=[];
//   $lenAndWattege=[];
//   $channels=[];
//   $outPutWattege=[];
//   $outPutWattAndVolt=[];
//   $fixtureOption=[];
//   $VoltageOption=[];
//   $LamppAndBallest=[];
//   $LampBallest=[];
//   $lumnens=[];
//   $rtColorOption=[];
//   $fixtureSize=[];
//   $fixtureWatt=[];
//   $housingColor=[];
//   $letterColor=[];
//   $wattegeUpDown=[];
//   $emergencyBattery=[];
//   $sizeWattege=[];
//   $accessoriesOption=[];
//   $roundTrim=[];
//   $squreTrim=[];
//   $Voltage=[];
//   $rbColorTemp=[];
//   $rbFixture=[];
//   $fixtureConfig=[];
//   $controlOption=[];
//   $wattAndLumen=[];
//   $reflactore=[];
//   $color=[];
// foreach($withSkuData as $WithskuValue) {
//   if(count($WithskuValue) == 3) {
//     if(@$WithskuValue['Color Temperature (CCT)']) {
//       array_push($colorTemp,$WithskuValue);
//     } else if(@$WithskuValue['Finish Options']) {
//       array_push($finishOptionData,$WithskuValue);
//     }else if(@$withSkuData['Light Source Options']) {
//       array_push($lightSource,$WithskuValue);
//     }else if (@$withSkuData['Select Light Source']){
//       array_push($selectLightSource,$WithskuValue);
//     } else if (@$withSkuData['End Cap Finish Options']) {
//       array_push($endCapFinish,$WithskuValue);
//     } else if (@$WithskuValue['Wattage Options']) {
//       array_push($wattegeOption,$WithskuValue);
//     }else if (@$WithskuValue['Metal Trim Ring Finish']) {
//       array_push($mettalTrimFinsh,$WithskuValue);
//     }else if (@$WithskuValue['Wattage & Lumen Options']) {
//       array_push($wattegeandlumen,$WithskuValue);
//     } else if (@$WithskuValue['Main Cable Length']) {
//       array_push($mainCable,$WithskuValue);
//     }else if (@$WithskuValue['Length & Wattage Options']){
//       array_push($lenAndWattege,$WithskuValue);
//     }else if (@$WithskuValue['Number of Channels & Wattage Options']){
//       array_push($channels,$WithskuValue);
//     }else if(@$WithskuValue['Output Wattage Options']) {
//       array_push($outPutWattege,$WithskuValue);
//     }else if(@$WithskuValue['Output Wattage & Voltage Options']) {
//       array_push($outPutWattAndVolt,$WithskuValue);
//     } else if (@$WithskuValue['Fixture Option']) {
//       array_push($fixtureOption,$WithskuValue);
//     }else if(@$WithskuValue['Voltage Options']) {
//       array_push($VoltageOption,$WithskuValue);
//     } else if (@$WithskuValue['Lamp & Ballast Options']){
//       array_push($LamppAndBallest,$WithskuValue);
//     }else if(@$WithskuValue['Lamp / Ballast Options']) {
//       array_push($LampBallest,$WithskuValue);
//     } else if(@$WithskuValue['Lumens']) {
//       array_push($lumnens,$WithskuValue);
//     }else if(@$WithskuValue['[RT]Color Temperature (CCT)']) {
//       array_push($rtColorOption,$WithskuValue);
//     } else if (@$WithskuValue['Fixture Size Options']) {
//       array_push($fixtureSize,$WithskuValue);
//     } else if (@$WithskuValue['Fixture Wattage Options']) {
//       array_push($fixtureWatt,$WithskuValue);
//     } else if (@$WithskuValue['Housing Color Options']) {
//       array_push($housingColor,$WithskuValue);
//     } else if(@$WithskuValue['Letter Color Options']) {
//       array_push($letterColor,$WithskuValue);
//     } else if (@$WithskuValue['Wattage Up / Down Options']){
//       array_push($wattegeUpDown,$WithskuValue);
//     }else if (@$WithskuValue['[RB]Emergency Battery Option']){
//       array_push($emergencyBattery,$WithskuValue);
//     } else if(@$WithskuValue['Size & Wattage Options']){
//       array_push($sizeWattege,$WithskuValue);
//     }else if(@$WithskuValue['Accessories Options']){
//       array_push($accessoriesOption,$WithskuValue);
//     }else if(@$WithskuValue['Round Trim Ring Options']){
//       array_push($roundTrim,$WithskuValue);
//     }else if(@$WithskuValue['Square Trim Ring Options']){
//       array_push($squreTrim,$WithskuValue);
//     }else if(@$WithskuValue['Voltage']){
//       array_push($Voltage,$WithskuValue);
//     } else if(@$WithskuValue['[RB]Color Temperature (CCT)']){
//       array_push($rbColorTemp,$WithskuValue);
//     } else if(@$WithskuValue['[RB]Fixture Options']){
//       array_push($rbFixture,$WithskuValue);
//     }else if(@$WithskuValue['Fixture Configuration']){
//       array_push($fixtureConfig,$WithskuValue);
//     }else if(@$WithskuValue['Control Options']){
//       array_push($controlOption,$WithskuValue);
//     }else if(@$WithskuValue['Wattage / Lumen Options']){
//       array_push($wattAndLumen,$WithskuValue);
//     }else if(@$WithskuValue['Reflectors']){
//       array_push($reflactore,$WithskuValue);
//     }else if(@$WithskuValue['Color']){
//       array_push($color,$WithskuValue);
//     }
//   }

// }
// @$filtedCsvData[]=array('parent_sku','child_sku','Light Source Options');
// $fileName='light-source'.date("d-m-y").'.csv';
// $downloadDir=__DIR__."/single-varient-file/".$fileName;
// $fileOpen = fopen($downloadDir, "w");
// foreach ($lightSource as $csvData) {
//     @$parent=$csvData['parent_sku'];
//     @$child=$csvData['child_sku'];
//     @$color=$csvData['Light Source Options'];
//     @$filtedCsvData[]=array(@$parent,@$child,@$color);
// }
// foreach($filtedCsvData as $newData){
//   fputcsv($fileOpen,$newData);
// }

  



?>