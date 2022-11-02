<?php
$row=0;
$csvData=[];
$simple_array = array();
$model_array = array();
$handle = fopen('C:/xampp/htdocs/relight/csvupload/new_product_data.csv', "r");
while (($header = fgetcsv($handle)) !== FALSE) {
    $num = count($header);
    if($row ==0 ){
        $row++; 
    } else {
      $itemType=($header[0]);
      $productId=($header[1]);
      $productSku=$header[2];
 $curl = curl_init();
 curl_setopt_array($curl, array(
   //CURLOPT_URL => 'https://api.bigcommerce.com/stores/av4rzyboqm/v3/catalog/products/'.$productId.'/variants?page=10',
   // CURLOPT_URL => 'https://api.bigcommerce.com/stores/av4rzyboqm/v3/catalog/products/'.$productId.'/variants',
    CURLOPT_URL => 'https://api.bigcommerce.com/stores/av4rzyboqm/v3/catalog/products/'.$productId,
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => '',
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 0,
     CURLOPT_FOLLOWLOCATION => true,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => 'GET',
     CURLOPT_HTTPHEADER => array(
         'X-Auth-Token: f7j4oo7ck3vju2cpu70qrdqm706gy8m'
     ),
      
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $responseData=json_decode($response,true);
        foreach($responseData as $data) {
            if(@$data['base_variant_id']=='') {
            } else {
               $simple_array[]=$data; 
            }
        }
    }
}

echo "<pre>";
print_r($simple_array);
?>