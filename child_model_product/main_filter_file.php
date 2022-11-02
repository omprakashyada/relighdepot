<?php
$mainArray=[];
$childSkuData=[];
$mainFile=fopen(__DIR__.'/single-varient-file/New-Parent-And-Child-Data31-10-22-1667219252.csv',"r");
$x=0;
while (($productData = fgetcsv($mainFile)) !== FALSE) {
    if($x == 0) {
        $x++;
    } else {
       $varient=str_replace('\,', "/",$productData[3]);
       $mainArray[]=array(
        'parent_sku' => $productData[0],
        'child_sku' => $productData[1],
        'product_id' => $productData[2],
        'variant' =>str_replace("[S]","",explode(",",$varient)),
       );
    }
}
fclose($mainFile);
$newArray=[];
$testArray=[];
$varientArray=[];

foreach($mainArray as $varientData) {
    $varientArray[]=($varientData['variant']);
    foreach($varientData['variant'] as $var) {
        $newArray[]=array(
            'product_id' => $varientData['product_id'],
            'parent_sku' =>$varientData['parent_sku'],
            'child_sku' =>$varientData['child_sku']
        ); 
    }
}

echo "<pre>";
print_r($varientArray);

?>
