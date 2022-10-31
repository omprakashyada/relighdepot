<?php
 $productFileData=[];
 $modelData=[];
 $childSkuData=[];
 $allProductFile=fopen("C:/xampp/htdocs/relight/csvupload/product.csv","r");
 $modelProductFile=fopen("C:/xampp/htdocs/relight/simple_and_model_data/model_data31-10-22.csv","r");
 while (($productData = fgetcsv($allProductFile)) !== FALSE) {
   $productFileData[] = $productData; 
 }
 fclose($allProductFile);
 $x=0;
 while (($modelProductData = fgetcsv($modelProductFile)) !== FALSE) {
    $skuCode=$modelProductData[1];
    if($x != 0) {
        if($skuCode == 0) {
            $modelData[]=$skuCode;
        }
    }
     $x++;
 }
fclose($modelProductFile); 
$productCsvData=[];
for($i=0; $i < count($modelData);$i++) {
    $j=0;
    foreach($productFileData as $product) {
        if($modelData[$i] == $product[4]) {
            $productCsvData[]=$product;
        }
    }  
}
@$filtedCsvData[]=array('ProductId','Product Name','Product Code/SKU','Bin Picking Number','Brand Name','Product Description','Price','Cost Price','Retail Price','Sale Price','Fixed Shipping Cost','Free Shipping','Product Warranty','Product Weight','Product Width','Product Height','Product Depth','Allow Purchases', 'Product Visible','Product Availability','Track Inventory','Current Stock Level','Low Stock Level','Category', 'Product Image URL - 1','Product Image URL - 2','Product Image URL - 3','Product Image URL - 4','Product Image URL - 5','Product Image URL - 6','Product Image URL - 7','Product Image URL - 8','Product Image URL - 9','Product Image URL - 10','Product Image URL - 11','Product Image URL - 12','Product Image URL - 13','Page Title','Meta Keywords','Meta Description','Product Condition','Product UPC/EAN','GPS Global Trade Item Number','Product Custom Fields','Minimum Purchase Quantity','Maximum Purchase Quantity','Shipping Groups');
$fileName='All-Parent-Data-new'.date("d-m-y").'-'.time().'.csv';
$downloadDir=__DIR__."/child_model_product/parent-all-data/".$fileName;
$fileOpen = fopen($downloadDir, "w");
foreach ($productCsvData as $csvData) {
    $productid=$csvData[1]; 
    $productName=$csvData[2];
    $productSkuCode=$csvData[4];
    $binPicking=$csvData[5];
    $brandName=$csvData[6];
    $productDescription=$csvData[9];
    $price=$csvData[10];
    $costPrice=$csvData[11];
    $retailPrice=$csvData[12];
    $salePrice=$csvData[13];
    $FixedShippingCost = $csvData[14];
    $freeShipping=$csvData[15];
    $productWarrenty=$csvData[16];
    $productWeight=$csvData[17];
    $productWidth=$csvData[18];
    $productHeight=$csvData[19];
    $productDept=$csvData[20];
    $allowpurchase=$csvData[21];
    $productVisible=$csvData[22];
    $productAvilty=$csvData[23];
    $trackInventary = $csvData[24];
    $currentStockLevel=$csvData[27];
    $lowStockLevel = $csvData[28];
    $category=$csvData[29];
    $productImageUrl_1= $csvData[30];
    $productImageUrl_2= $csvData[36];
    $productImageUrl_3= $csvData[42];
    $productImageUrl_4= $csvData[48];
    $productImageUrl_5= $csvData[54];
    $productImageUrl_6= $csvData[60];
    $productImageUrl_7= $csvData[66];
    $productImageUrl_8= $csvData[72];
    $productImageUrl_9= $csvData[78];
    $productImageUrl_10= $csvData[84];
    $productImageUrl_11= $csvData[90];
    $productImageUrl_12=$csvData[96];
    $productImageUrl_13=$csvData[102];
    $pageTitle=$csvData[109];
    $metaKeywords=$csvData[110];
    $metaDescription=$csvData[111];
    $productCondition=$csvData[112];
    $productUpc = $csvData[116];
    $tradItemNumber=$csvData[120];
    $productCustomFeild=$csvData[132];
    $minPurchaseQuantity= $csvData[133];
    $maxPurchaseQuantity= $csvData[134];
    $sippingGroup=$csvData[135];
    @$filtedCsvData[]=array($productid,$productName,$productSkuCode,$binPicking,$brandName,$productDescription,$price,$costPrice,$retailPrice,$salePrice,$FixedShippingCost,$freeShipping,$productWarrenty,$productWeight,$productWidth,$productHeight,$productDept,$allowpurchase,$productVisible,$productAvilty,$trackInventary,$currentStockLevel,$lowStockLevel,$category,$productImageUrl_1,$productImageUrl_2,$productImageUrl_3,$productImageUrl_4,$productImageUrl_5,$productImageUrl_6,$productImageUrl_7,$productImageUrl_8,$productImageUrl_9,$productImageUrl_10,$productImageUrl_11,$productImageUrl_12,$productImageUrl_13,$pageTitle,$metaKeywords,$metaDescription,$productCondition,$productUpc, $tradItemNumber,$productCustomFeild,$minPurchaseQuantity,$maxPurchaseQuantity,$sippingGroup);
}
foreach($filtedCsvData as $newData){
    fputcsv($fileOpen,$newData);
}






?>