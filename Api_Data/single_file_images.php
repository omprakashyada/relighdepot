<?php
$row=0;
$csvData=[];
$imageData=[];
$handle = fopen(__DIR__.'/simple_data/test_id.csv',"r");
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
                $array=array('data'=>$data);
                $additional=array('parent_sku'=>$parent_sku,
                'product_id'=> $productId);
                    $arr=array_merge($array,$additional);
                    array_push($imageData,$arr); 
                // foreach ($data as $i =>$element) {
                //     $element['parent_sku'] = $parent_sku;
                //     array_push($imageData,$element);
                // }  
            } 
        }
       
    }
}

$result=[];
foreach($imageData as $newData){
    $x=1;
    $y=1;
    for($i=0;$i<count($newData['data']);$i++){
        $allData[]=array(
                  'product_id' => $newData['product_id'],
                  'parent_sku' => $newData['parent_sku'],
                  'image_file-'.$x++ =>@$newData['data'][$i]['image_file'],
                  'url_standard-'.$y++ =>@$newData['data'][$i]['url_standard'],
                 
                );          
    }
    array_push($result,$allData);
}

$a=[];
$allData=[];
foreach($result as $custom) {
    for($j=1;$j<count($custom);$j++) {
    unset($custom[$j]['product_id'],$custom[$j]['parent_sku']);
    $a=$custom;
    break;
    }
    $convert_array = array_reduce($a,'array_merge',array());
    array_push($allData,$convert_array);
}
echo "<pre>";
print_r($allData);

    //$a=1;
//     $header[]=array( 'id','parent_sku','product_id', 'image_file','url_zoom','url_standard-'.$a,'url_thumbnail', 'url_tiny');
//   $fileName='simple_image-2-'.date("d-m-y").'.csv';
//   $downloadDir=__DIR__."/simple_data_media/".$fileName;
//   $fileOpen = fopen($downloadDir, "w");
//   $k=1;

// foreach($imageData as $csvData){
//     @$id=$csvData['id'];
//     @$sku=$csvData['parent_sku'];  
//     @$product_id=$csvData['product_id'];
//     @$image_file=$csvData['image_file'];
//     @$url_zoom=$csvData['url_zoom']; 
//     @$Url_standard=$csvData['url_standard-'.$k];
//     @$url_thumb=$csvData['url_thumbnail'];
//     @$url_tiny=$csvData['url_tiny'];
//     $header[]=array( @$id,@$sku,@$product_id,@$image_file,@$url_zoom,@$Url_standard, @$url_thumb, @$url_tiny);
// }
// $a++;
// foreach($header as $newData){
//     fputcsv($fileOpen,$newData);
// }




?>

       
                                           
                




                 