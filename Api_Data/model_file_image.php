<?php
$row=0;
$csvData=[];
$imageData=[];
$handle = fopen(__DIR__.'/model_data/all_model_id.csv',"r");
while (($header = fgetcsv($handle)) !== FALSE) {
    $num = count($header);
    if($row ==0 ){
        $row++; 
    } else {
      $productId=$header[0];
      $parent_sku = $header[1];
        $curl = curl_init();
        curl_setopt_array($curl, array(

    CURLOPT_URL => 'https://api.bigcommerce.com/stores/av4rzyboqm/v3/catalog/products/'.$productId.'/images',
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
        foreach($responseData as $data){
            if((@count($data)) > 1) {
                foreach ($data as $i =>$element) {
                    $element['parent_sku'] = $parent_sku;
                    array_push($imageData,$element);
                }  
            } 
        }
       
    }
}
echo "<pre>";
print_r($imageData);

  $header[]=array( 'id','parent_sku','product_id','description','image_file','url_zoom','url_standard','url_thumbnail', 'url_tiny');
  $fileName='model_images-'.date("d-m-y").'.csv';
  $downloadDir=__DIR__."/simple_data_media/".$fileName;
  $fileOpen = fopen($downloadDir, "w");
foreach($imageData as $csvData){
    @$id=$csvData['id'];
    @$sku=$csvData['parent_sku'];  
    @$product_id=$csvData['product_id'];
    @$description=$csvData['description'];
    @$image_file=$csvData['image_file'];
    @$url_zoom=$csvData['url_zoom']; 
    @$Url_standard=$csvData['url_standard'];
    @$url_thumb=$csvData['url_thumbnail'];
    @$url_tiny=$csvData['url_tiny'];
    $header[]=array( @$id,@$sku,@$product_id,@$description,@$image_file,@$url_zoom,@$Url_standard, @$url_thumb, @$url_tiny);
}
foreach($header as $newData){
    fputcsv($fileOpen,$newData);
}


?>

                                           
                




                 