 <!-- < ?php
  $selectData="SELECT * FROM `product_data` LIMIT 200 OFFSET 2800";
  $simple_array = array();
  $model_array = array();
  global $tableProductId;
  $result = $conn->query($selectData);
  if ($rowData=($result->num_rows > 0 )){
      while($tableData = $result->fetch_assoc()) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.bigcommerce.com/stores/av4rzyboqm/v3/catalog/products/'.$tableData["product_id"].'/variants',
          //CURLOPT_URL => 'https://api.bigcommerce.com/stores/c76t6z3pfh/v3/catalog/products/475/variants',
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
        $allArrayData=[];
        $parentSku=$tableData['product_type'];
        $tableProductId=$tableData['product_id'];
            foreach($responseData as $allData) {
              $arrayCount=count($allData);
              if($arrayCount == 1) {
                $simple_array[] = array('sku'=>$parentSku, 'product_id'=>$tableProductId);
                } else {
                  $childsku=array();
                  foreach($allData as $data) {
                    $childsku[]=$data['sku'];  
                  }
                  $childSkuData=implode(",",$childsku);
                  $model_array[] = array('sku'=>$parentSku,'product_id'=>$tableProductId,'child_sku' => $childSkuData);
                }
              break;
            }
          }
    }
    // $truncateData="TRUNCATE TABLE simple_product";
    // mysqli_query($conn,$truncateData);
    $message="ok";
    $num=1;
    foreach($simple_array as $simpleData) {
      $product_id=$simpleData['product_id'];
      $productSku=$simpleData['sku'];
      $insert= "INSERT INTO simple_product (`product_id`,`sku`) Values ('$product_id','$productSku')";
      if(mysqli_query($conn,$insert)) {
         $num++;
      }else {
          echo "error";
      }
    }
  
    // $truncateData="TRUNCATE TABLE model_product";
    // mysqli_query($conn,$truncateData);
    $ok=1;
    foreach($model_array as $modelData) {
      $model_sku=$modelData['sku'];
      $model_child_sku =$modelData['child_sku'];
      $modelProductId=$modelData['product_id']; 
      $sql= "INSERT INTO model_product (`product_id`,`parent_sku`,`child_sku`) Values ('$modelProductId','$model_sku','$model_child_sku')";
      if(mysqli_query($conn,$sql)) {
        $ok++;
      }else {
        echo "error";
      }
    }
?>        -->

 <?php
$row=0;
$csvData=[];
$simple_array = array();
$model_array = array();
$handle = fopen(__DIR__.'/csvupload/product_data.csv', "r");
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
        CURLOPT_URL => 'https://api.bigcommerce.com/stores/av4rzyboqm/v3/catalog/products/'.$productId.'/variants',
        //CURLOPT_URL => 'https://api.bigcommerce.com/stores/c76t6z3pfh/v3/catalog/products/475/variants',
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
      foreach($responseData as $allData) {
        $arrayCount=count($allData);
        if($arrayCount == 1) {
          foreach($allData as $singleData) {
           $simple_array[] = array('sku'=>@$singleData['sku'],'product_id'=>@$singleData['product_id']);
          }
        } else {
          $childsku=array();
          foreach($allData as $data) {
            $childsku[]=$data['sku'];  
          }
          $childSkuData=implode(",",$childsku);
          $model_array[] = array('sku'=>$productSku,'product_id'=>$productId,'child_sku' => $childSkuData);
         } 
      }
    }
 }
  @$headers[]=array('product_id','parent_sku');
  $fileName='simple_data'.date("d-m-y").'.csv';
  $downloadDir=__DIR__."/simple_and_model_data/".$fileName;
  $fileOpen = fopen($downloadDir, "w");
   foreach($simple_array as $model) {
   $newArray=(array_filter($model));
   if(empty($newArray)){
   }else {
    echo "<pre>";
    print_r($newArray);
    @$product_id=$newArray['product_id'];
    @$parent_sku=$newArray['sku'];
    // @$child_sku=$model['child_sku'];
    @$headers[]=array(@$product_id,@$parent_sku);
   }
  }
foreach($headers as $newData){
    fputcsv($fileOpen,$newData);
  }
  
  
?>