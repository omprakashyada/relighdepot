<?php

    $allProductFile=fopen("C:/xampp/htdocs/relight/csvupload/Product.csv","r");
    $colorTempFile=fopen(__DIR__.'/single-varient-file/color-temprature-15-10-22-1665817498.csv','r');
    $endCapfinshFile=fopen(__DIR__.'/single-varient-file/end-cap-finish-option-15-10-22-1665820359.csv','r');
    $factoryInstalledFile=fopen(__DIR__.'/single-varient-file/factory-installed-data-15-10-22-1665819377.csv','r');
    $finishProductFile=fopen(__DIR__.'/single-varient-file/finish-Product-15-10-22-1665816130.csv','r');
    $wattegeOptionFile=fopen(__DIR__.'/single-varient-file/Wattage-Options-15-10-22-1665821385.csv','r');
    $colorParentSku=[];
    $endCap=[];
    $factoryInstalled=[];
    $finshOption=[];
    $wattegeOption=[];
    //color file data 
    $color=0;
    while(($colorData = fgetcsv($colorTempFile)) !== FALSE){
        $colorSkuCode=$colorData[1];
        if($color != 0) {
            if($colorSkuCode == 0) {
                $colorParentSku[]=$colorSkuCode;
            }
        }
         $color++; 
    }
    $colorCodeData=(array_unique($colorParentSku));
    fclose($colorTempFile);

//endcapfile data 
    $end=0;
    while(($endCapfinshData = fgetcsv($endCapfinshFile)) !== FALSE){
        $endSkuCode=$endCapfinshData[1];
        if($end != 0) {
            if($endSkuCode == 0) {
                $endCap[]=$endSkuCode;
            }
        }
         $end++; 
    }
    $endcapData=(array_unique($endCap));
    fclose($endCapfinshFile);
    //factoryInstalled Data 
    $fact=0;
    while(($factInstalledData = fgetcsv($factoryInstalledFile)) !== FALSE){
        $factInsCode=$factInstalledData[1];
        if($fact != 0) {
            if($factInsCode == 0) {
                $factoryInstalled[]=$factInsCode;
            }
        }
        $fact++; 
    }
    $factoryCodeData=(array_unique($factoryInstalled));
    fclose($factoryInstalledFile);

    //finish option data 

    $finish=0;
    while(($finishData = fgetcsv($finishProductFile)) !== FALSE){
        $finishSkuCode=$finishData[1];
        if($finish != 0) {
            if($finishSkuCode == 0) {
              $finshOption[]=$finishSkuCode;
            }
        }
        $finish++; 
    }

    $finishCodeData=(array_unique($finshOption));
    fclose($finishProductFile);

    //wattege option 

    $wattege=0;
    while(($wattegeData = fgetcsv($wattegeOptionFile)) !== FALSE){
        $wattegeSkuCode=$wattegeData[1];
        if($wattege != 0) {
            if($wattegeSkuCode == 0) {
                $wattegeOption[]=$wattegeSkuCode;
            }
        }
        $wattege++; 
    }
    $wattegeCodeData=(array_unique($wattegeOption));
    fclose($wattegeOptionFile);
    $newArray=(array_merge($wattegeCodeData,$finishCodeData,$factoryCodeData,$endcapData,$colorCodeData));
    $productFileData=[];
    $row=0;
    while (($productData = fgetcsv($allProductFile)) !== FALSE) {
        $allproduct=$productData;
        if($row != 0) {
           if($allproduct[0]=="  SKU") {
            $productFileData[]=$allproduct;
           }
        }
        $row++;  
    }
 
   $productCsvData=[];
    for($a=0; $a < count($newArray); $a++) {
        foreach($productFileData as $product) {
            if($newArray[$a] == $product[4]) {
                $productCsvData[]=$product;
            }
        }
    }
    // echo "<pre>";
    // print_r($productCsvData);
    // exit;
    @$filtedCsvData[]=array('sku','Price','Cost Price','Retail Price','Sale Price');
    $fileName='Product-Price-'.date("d-m-y").'-'.time().'.csv';
    $downloadDir=__DIR__."/csvFile/".$fileName;
    $fileOpen = fopen($downloadDir, "w");
    foreach ($productCsvData as $csvData) {
        $productSkuCode=$csvData[4];
        $price=$csvData[10];
        $costPrice=$csvData[11];
        $retailPrice=$csvData[12];
        $salePrice=$csvData[13];
        @$filtedCsvData[]=array($productSkuCode,$price,$costPrice,$retailPrice,$salePrice);
    }
    foreach($filtedCsvData as $newData){
        fputcsv($fileOpen,$newData);
    }

?>