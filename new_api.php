 <?php
session_start();
include_once (__DIR__.'/authentication.php');
$servername = "localhost";
$username = "root";
$password = "";
$database='rdevarona_relight_depot_search';
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

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
 
?>
            

          