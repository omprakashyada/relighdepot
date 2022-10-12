<?php
$productFileData=[];
$modelData=[];
$childSkuData=[];
$allProductFile=fopen(__DIR__.'/product_data.csv',"r");
$modelProductFile=fopen("C:/xampp/htdocs/relight/modelproduct/newModel.csv","r");
while (($productData = fgetcsv($allProductFile)) !== FALSE) {
    $productFileData[] = $productData; 
}
fclose($allProductFile);

$x=0;
while (($modelProductData = fgetcsv($modelProductFile)) !== FALSE) {
    if($x != 0) {
        $childSku= $modelProductData[3];
        $productId=$modelProductData[0];
        if($productId == 0) {
        } else {
           $modelData[] =array($childSku);
        }
    }
     $x++;
}
fclose($modelProductFile);

foreach($modelData as $childData) {
    $arr=explode(",",$childData[0]);
    array_push($childSkuData,$arr);
}

$newArrayData=[];
foreach($childSkuData as $childArrayData) {
  foreach($childArrayData as $data) {
    $newArrayData[]=$data;
  }
}


$newData=(array_chunk($newArrayData,1));
$productCsvData=[];
$count=count($newData);
for($i=0;$i<$count;$i++) {
  $j=0;
  foreach($productFileData  as $product) {
    if($newData[$i][0] ==$product[4]) {
       $productCsvData[]=$product;
    }
    $j++;
  }
}

$newArraypushed=[];
foreach($productCsvData as $arrayData) {
  $array=array(
  'data' =>explode('=',$arrayData[2]),
  'price' => $arrayData[10]); 
  echo "<pre>";
  print_r($array);
}


?>