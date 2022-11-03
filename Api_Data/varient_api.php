 <?php
    $row=0;
    $csvData=[];
    $simple_array = array();
    $model_array = array();
    $varientData=[];
    $handle = fopen(__DIR__.'/files/test.csv', "r");
    while (($header = fgetcsv($handle,100,",")) !== FALSE) {
        if($row ==0 ){
            $row++; 
        } else {
            $product_id=($header[0]);
            $parent_sku=$header[1];
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.bigcommerce.com/stores/av4rzyboqm/v3/catalog/products/'.$product_id.'/variants',
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
                    if(count($data)== 1){
                    } else {
                        foreach($data as $parentData) {
                          $arr=array(
                            'data'=>$parentData,
                        );
                        $additional = array('parent_sku'=> $parent_sku);
                        $arr['data'] = array_merge($arr['data'], $additional);
                        array_push($varientData,$arr); 
                        }
                        
                    }
                   
                }
        }
    }
    $optionData=[];
    $optionArray=[];
    foreach($varientData as $newData) {
     $optionData[]=($newData['data']['option_values']);
    }
    foreach($optionData as $value){
        foreach($value as $nValue){
            $optionArray[]=$nValue;
        }
    }
   $resultData=[];
   for($k=0;$k< count($optionArray);$k++) {
       $resultData= array_map(function($v){
           return [$v['option_display_name'] =>$v['label']];
       },$optionArray);
   }
   echo "<pre>";
   print_r($resultData);
?> 