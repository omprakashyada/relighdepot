<?php

if (($open = fopen("relightprd.csv", "r")) !== FALSE)
{
  while (($data = fgetcsv($open)) !== FALSE)
  {   
  $csv_array[] = $data;
  }

  fclose($open);
}

 foreach ($csv_array as $key => $value) {
 
  if(!$key==0){

    $sku=$value[0];
    $option_check=$value[1];
    $option_replace=$value[2];
   
            
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.bigcommerce.com/stores/c76t6z3pfh/v3/catalog/products?keyword='.$sku.'',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'X-Auth-Token: c58s1pacoyqqvry7a1ja4c8o7rxd6hs',
      'Content-Type: application/json'
    ),
  ));

  $response = curl_exec($curl);

     curl_close($curl);
     //echo $response;
     $ProductData=json_decode($response);
     // echo "<pre>";
     // print_r($ProductData->data);
     // die;
         
             if(isset($ProductData->data))
             {
               $DataRetrieve=$ProductData->data;
              foreach ($DataRetrieve as $key => $value) {
                // echo "<pre>";
                // print_r($value);
                // die;
                 $sku_check=$value->sku;
                 if($sku_check == $sku){

                    $product_id=$value->id;
                    
                            $curl = curl_init();
                            curl_setopt_array($curl, array(
                              CURLOPT_URL => 'https://api.bigcommerce.com/stores/c76t6z3pfh/v3/catalog/products/'.$product_id.'/options',
                              CURLOPT_RETURNTRANSFER => true,
                              CURLOPT_ENCODING => '',
                              CURLOPT_MAXREDIRS => 10,
                              CURLOPT_TIMEOUT => 0,
                              CURLOPT_FOLLOWLOCATION => true,
                              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                              CURLOPT_CUSTOMREQUEST => 'GET',
                              CURLOPT_HTTPHEADER => array(
                                'X-Auth-Token: c58s1pacoyqqvry7a1ja4c8o7rxd6hs',
                                'Content-Type: application/json'
                              ),
                            ));

                            $response = curl_exec($curl);

                            curl_close($curl);
                            
                              $OptionData=json_decode($response);
                             
                              if(isset($OptionData->data)){
                                 $Option=$OptionData->data;
                                foreach ( $Option as $key => $value) {
                                  
                                  $display_name=$value->display_name;
                                    if($display_name==$option_check){


                                                    $option_id=$value->id;                                 
                                                    $curl = curl_init();
                                                    curl_setopt_array($curl, array(
                                                      CURLOPT_URL => 'https://api.bigcommerce.com/stores/c76t6z3pfh/v3/catalog/products/'.$product_id.'/options/'.$option_id,
                                                      CURLOPT_RETURNTRANSFER => true,
                                                      CURLOPT_ENCODING => '',
                                                      CURLOPT_MAXREDIRS => 10,
                                                      CURLOPT_TIMEOUT => 0,
                                                      CURLOPT_FOLLOWLOCATION => true,
                                                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                      CURLOPT_CUSTOMREQUEST => 'PUT',
                                                      CURLOPT_POSTFIELDS =>'{

                                                          "display_name": "'. $option_replace.'"

                                                       }',
                                                      CURLOPT_HTTPHEADER => array(
                                                        'X-Auth-Token: c58s1pacoyqqvry7a1ja4c8o7rxd6hs',
                                                        'Content-Type: application/json'
                                                      ),
                                                    ));

                                                    $response = curl_exec($curl);
                                                    curl_close($curl);
                                                   //echo $response
                                                    echo "<pre>" ;
                                                    print_r($response);                                        
                                                    // $option=json_decode($response);
                                                    // echo "<pre>";
                                                    // print_r($option->data);
                                                    
                                    }
                                }
                              }                    


                 }
                      
              }
             }

  }
  
 } 




 