<?php
$productAllData=[];
$modelArrayData=[];
$modelData=[];
$childSkuData=[];
$productFile=fopen(__DIR__.'/csvupload/product.csv','r');
$modelProduct =fopen(__DIR__.'/ModelProduct/model.csv','r');

while($productData= fgetcsv($productFile)) {
    $productAllData[] = $productData;
}
fclose($productFile);
$x=0;
while($modelProductData= fgetcsv($modelProduct)){
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
fclose($modelProduct);
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
foreach($newArrayData as $allskuData) {
   for($i=0;$i < count($allskuData); $i++) {
        $j=0;
        $count=1;
        foreach($productAllData as $product) {
            if($allskuData[$i]==$product[4]) {
                $productCsvData[]=array(
                    'product' => $product[2],
                   
                   );
            }
            $j++;
        }
    }
}





?>