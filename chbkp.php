<?php
$productFileData=[];
$modelData=[];
$childSkuData=[];
$allProductFile=fopen("C:/xampp/htdocs/relight/csvupload/product.csv","r");

$modelProductFile=fopen("C:/xampp/htdocs/relight/modelproduct/model.csv","r");
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

$result=[];
$newArraypushed=[];
foreach($productCsvData as $arrayData) { 
  echo "<pre>";
  print_r($arrayData['product'][2]);
   $colorTemp= (explode('=',$arrayData['product'][2]));
  if($colorTemp[0] == '') {
  } else {
  //   $result[$colorTemp[0]]=$colorTemp[1];
  //   $array=array(
  //     'parent_sku' =>$arrayData['parent_sku'],
  //     'child_sku' => $arrayData['child_sku'],
  //     'price' => $arrayData['product'][10],
  //     'cost_price' =>$arrayData['product'][11],
  //     'retail_price' =>$arrayData['product'][12],
  //     'sale_price' => $arrayData['product'][13],
  //   );
  //  $mergeData=array_merge($result,$array);
  //  array_push($newArraypushed,$mergeData);
  }
}
// $fileName='child-model-Product'.date("d-m-y").'-'.time().'.csv';
// $downloadDir= __DIR__."/csvFile/".$fileName;
// $fileOpen = fopen($downloadDir, "w");

// $csvFileHeader[]=array('sku','parent',"Color_Temperature",'price','cost_price','Retail_price','sale_price');
// foreach($newArraypushed as $csvData) {
//  $color=(preg_split("/\,/", $csvData['[S]Color Temperature (CCT)'])); 
//   $colorArray=($color[0]);
//   $colorNewArray=preg_split("/\s+/",$colorArray);
//  $csvFileHeader[]=array($csvData['child_sku'],$csvData['parent_sku'],$colorNewArray[0],$csvData['price'],$csvData['cost_price'],$csvData['retail_price'],$csvData['sale_price']);
// }
// foreach($csvFileHeader as $csvValue) {
//   fputcsv($fileOpen,$csvValue);
// }

?>