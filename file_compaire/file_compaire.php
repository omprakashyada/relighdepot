<?php
$akData=[];
$matchingData=[];
$x=0;
$akeneoFile=fopen(__DIR__.'/productakeneo.csv','r');
while($akneoData = fgetcsv($akeneoFile)) {
    if($x == 0) {
        $x++;
    } else {
        $akData[]=array(
            'sku' => $akneoData[0]
        );
    }
  
}
fclose($akeneoFile);

$csvFiles=fopen('C:/xampp/htdocs/relight/Api_Data/simple_data/simple03-11-22.csv','r');
while($simpleData = fgetcsv($csvFiles)){
    $matchingData[]=$simpleData;
}
fclose($csvFiles);

$productCsvData=[];
 foreach($akData as $data){
  $j=0;
    foreach($matchingData as $product) {
      if($data['sku']==$product[3]) {
        $productCsvData[]=array(
          'product' => $product[3]
        );
      } 
      $j++;
    }
  }

  echo "<pre>";
  print_r($productCsvData);
?>