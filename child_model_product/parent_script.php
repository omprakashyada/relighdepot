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
        $parentSku=$modelProductData[1];
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
        //   'child_sku' => $arrayData['child_sku'],
          'family' => $newfamily,
        );
        array_push($withSkuData,$additional);
        }   
    }

    $new=[];
    
    $newUniqueData=(array_unique($withSkuData,SORT_REGULAR));
    $finalData=[];
    foreach($newUniqueData as $parentDataArray) {
      array_push($finalData,$parentDataArray); 
    }
 @$filtedCsvData[]=array('SKU','family_count','family');
 $fileName='All-Parent-Family-Data-new'.date("d-m-y").'-'.time().'.csv';
 $downloadDir=__DIR__."/single-varient-file/".$fileName;
 $fileOpen = fopen($downloadDir, "w");
 foreach ($finalData as $csvData) {
   @$SKU=$csvData['parent_sku'];
   @$family=$csvData['family'];
   @$schools_array = explode(",",$family);
   @$familycount = count($schools_array);
   @$filtedCsvData[]=array(@$SKU,@$familycount,@$family);
 }
 foreach($filtedCsvData as $newData){
     fputcsv($fileOpen,$newData);
 }
 
    


  



?>