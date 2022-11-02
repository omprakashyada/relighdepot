<?php
$productFileData=[];
$modelData=[];
$childSkuData=[];
$allData=[];
$withSkuData=[];
$allProductFile=fopen("C:/xampp/htdocs/relight/csvupload/Product.csv","r");
$modelProductFile=fopen("C:/xampp/htdocs/relight/simple_and_model_data/model_page-10-02-11-22.csv","r");
//$modelProductFile=fopen("C:/xampp/htdocs/relight/modelproduct/model.csv","r");
while (($productData = fgetcsv($allProductFile)) !== FALSE) {
  $productFileData[] = $productData; 
}
fclose($allProductFile);
$x=0;
while (($modelProductData = fgetcsv($modelProductFile)) !== FALSE) {
    if($x != 0) {
        $parentSku= $modelProductData[1];
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
echo "<pre>";
print_r($newArrayData);

$productCsvData=[];
foreach($newArrayData as $skuData) {
    $parentData=array_pop($skuData);
       for($k=0;$k < count($skuData);$k++) {
        $j=0;
        foreach($productFileData as $product) {
          if($skuData[$k]==$product[4]) {
            if($product[0] =='  SKU') {
                $productCsvData[]=array(
                    'product'=> $product,
                    'parent_sku' => $parentData,
                    'child_sku' => $skuData[$k], 
                  );
            }
            
          }
          $j++;
        }
    }
}
$input = array_map("unserialize", array_unique(array_map("serialize", $productCsvData)));

@$filtedCsvData[]=array('parent_sku','Child_sku','ProductId','Product Name','Bin Picking Number','Brand Name','Product Description','Price','Cost Price','Retail Price','Sale Price','Fixed Shipping Cost','Free Shipping','Product Warranty','Product Weight','Product Width','Product Height','Product Depth','Allow Purchases', 'Product Visible','Product Availability','Track Inventory','Current Stock Level','Low Stock Level','Category', 'Product Image URL - 1','Product Image URL - 2','Product Image URL - 3','Product Image URL - 4','Product Image URL - 5','Product Image URL - 6','Product Image URL - 7','Product Image URL - 8','Product Image URL - 9','Product Image URL - 10','Product Image URL - 11','Product Image URL - 12','Product Image URL - 13','Page Title','Meta Keywords','Meta Description','Product Condition','Product UPC/EAN','GPS Global Trade Item Number','Product Custom Fields','Minimum Purchase Quantity','Maximum Purchase Quantity','Shipping Groups');
$fileName='New-Parent-And-Child-Data-page-tenth'.date("d-m-y").'-'.time().'.csv';
$downloadDir=__DIR__."/model-child-pages-Data/".$fileName;
$fileOpen = fopen($downloadDir, "w");
foreach($productCsvData as $csvData){
    $parent_sku=$csvData['parent_sku'];
    $child_sku=$csvData['child_sku'];
    $productid=$csvData['product'][1]; 
    $productName=$csvData['product'][2];
   // $productSkuCode=$csvData['product'][4];
    $binPicking=$csvData['product'][5];
    $brandName=$csvData['product'][6];
    $productDescription=$csvData['product'][9];
    $price=$csvData['product'][10];
    $costPrice=$csvData['product'][11];
    $retailPrice=$csvData['product'][12];
    $salePrice=$csvData['product'][13];
    $FixedShippingCost = $csvData['product'][14];
    $freeShipping=$csvData['product'][15];
    $productWarrenty=$csvData['product'][16];
    $productWeight=$csvData['product'][17];
    $productWidth=$csvData['product'][18];
    $productHeight=$csvData['product'][19];
    $productDept=$csvData['product'][20];
    $allowpurchase=$csvData['product'][21];
    $productVisible=$csvData['product'][22];
    $productAvilty=$csvData['product'][23];
    $trackInventary = $csvData['product'][24];
    $currentStockLevel=$csvData['product'][27];
    $lowStockLevel = $csvData['product'][28];
    $category=$csvData['product'][29];
    $productImageUrl_1= $csvData['product'][30];
    $productImageUrl_2= $csvData['product'][36];
    $productImageUrl_3= $csvData['product'][42];
    $productImageUrl_4= $csvData['product'][48];
    $productImageUrl_5= $csvData['product'][54];
    $productImageUrl_6= $csvData['product'][60];
    $productImageUrl_7= $csvData['product'][66];
    $productImageUrl_8= $csvData['product'][72];
    $productImageUrl_9= $csvData['product'][78];
    $productImageUrl_10= $csvData['product'][84];
    $productImageUrl_11= $csvData['product'][90];
    $productImageUrl_12=$csvData['product'][96];
    $productImageUrl_13=$csvData['product'][102];
    $pageTitle=$csvData['product'][109];
    $metaKeywords=$csvData['product'][110];
    $metaDescription=$csvData['product'][111];
    $productCondition=$csvData['product'][112];
    $productUpc = $csvData['product'][116];
    $tradItemNumber=$csvData['product'][120];
    $productCustomFeild=$csvData['product'][132];
    $minPurchaseQuantity= $csvData['product'][133];
    $maxPurchaseQuantity= $csvData['product'][134];
    $sippingGroup=$csvData['product'][135];
    @$filtedCsvData[]=array($parent_sku,$child_sku,$productid,$productName,$binPicking,$brandName,$productDescription,$price,$costPrice,$retailPrice,$salePrice,$FixedShippingCost,$freeShipping,$productWarrenty,$productWeight,$productWidth,$productHeight,$productDept,$allowpurchase,$productVisible,$productAvilty,$trackInventary,$currentStockLevel,$lowStockLevel,$category,$productImageUrl_1,$productImageUrl_2,$productImageUrl_3,$productImageUrl_4,$productImageUrl_5,$productImageUrl_6,$productImageUrl_7,$productImageUrl_8,$productImageUrl_9,$productImageUrl_10,$productImageUrl_11,$productImageUrl_12,$productImageUrl_13,$pageTitle,$metaKeywords,$metaDescription,$productCondition,$productUpc, $tradItemNumber,$productCustomFeild,$minPurchaseQuantity,$maxPurchaseQuantity,$sippingGroup);
}
foreach($filtedCsvData as $newData){
    fputcsv($fileOpen,$newData);
}


?>