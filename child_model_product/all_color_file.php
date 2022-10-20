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
    $allcolorData=[];
    foreach($withSkuData as $WithskuValue) {
      if(count($WithskuValue) == 3) {
        if(@$WithskuValue['Color Temperature (CCT)'] || @$WithskuValue['[RB]Color Temperature (CCT)'] || @$WithskuValue['[RT]Color Temperature (CCT)']){
          array_push($allcolorData,$WithskuValue);
        } 
      }
    }
    
    @$headers[]=array('parent_sku','child_sku','Color Temperature (CCT)','[RT]Color Temperature (CCT)','[RB]Color Temperature (CCT)');
    $fileName='All-color-Data'.date("d-m-y").'.csv';
    $downloadDir=__DIR__."/single-varient-file/".$fileName;
    $fileOpen = fopen($downloadDir, "w");
    foreach ($allcolorData as $csvData) {
        @$parent=$csvData['parent_sku'];
        @$child=$csvData['child_sku'];
        $replace = array('[RT]Emergency Battery Options', '(Default)', '(Standard)', '(recommended)', '/ Frosted Lens','/ Clear Lens','/ Cool White','/ Soft White','/ White','/ Natural DL','/ Clear Cleans','(Warm White)','(Super White)','/ Clear','/ Frosted');
        @$colorTemp= str_replace($replace,"",$csvData['Color Temperature (CCT)']);
        @$rtColorTemp=$csvData['[RT]Color Temperature (CCT)'];
        @$rbColorDataTemp=$csvData['[RB]Color Temperature (CCT)'];
        @$headers[]=array(@$parent,@$child,@$colorTemp,@$rtColorTemp,@$rbColorDataTemp);
    }
    foreach($headers as $newData){
      fputcsv($fileOpen,$newData);
    }
?> 