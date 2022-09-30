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
$selectData="SELECT * FROM `product_data`limit 100";
$result = $conn->query($selectData);
if ($rowData=($result->num_rows > 0 )){
    while($tableData = $result->fetch_assoc()) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
         //CURLOPT_URL => 'https://api.bigcommerce.com/stores/c76t6z3pfh/v3/catalog/products/'.$tableData["product_id"].'/variants',
       CURLOPT_URL => 'https://api.bigcommerce.com/stores/c76t6z3pfh/v3/catalog/products/475/variants',
        
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'X-Auth-Token: c58s1pacoyqqvry7a1ja4c8o7rxd6hs'
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    // echo $response;
    $responseData=json_decode($response,true);
    $subcategoryData=[];
    $category=[];
    foreach($responseData as $responseValue){
      $i=0;
        foreach($responseValue as $sub_category) {
          if(@$sub_category['option_values'] == null) {
            array_push($category,$sub_category);
          } else {
            array_push($subcategoryData,$sub_category);
          }
         
        } 
    }
    $bigArrayData= [];
    foreach($category as $categoryData) {
        $countData=count($categoryData);
        if($countData == 27) {
            array_push($bigArrayData,$categoryData);
        }
       
    }
    // foreach($bigArrayData as $selectCategoryData) {
    //     $productSku= @$selectCategoryData['sku'];
    //     $product_id=@$selectCategoryData['product_id'];
    //     $insert= "INSERT INTO simple_product (`product_id`,`sku`) Values ('$product_id','$productSku')";
    //     if(mysqli_query($conn,$insert)) {
    //         echo "success";
    //     }else {
    //         echo "error";
    //     }
    // }
    
  }
}

       // model product table data insertion 
    $arrayData = [];
    $i=1;
    foreach($subcategoryData as $key=>$data){
     
      $countValue=count($data['option_values']);
      $csv=json_encode($data['sku']);
        echo "<pre>";
        echo $csv;
        $productId=$data['product_id'];
        $parentSku= $data['sku']; 
        $childSku=$data['sku'].'-'.$i++;
        // $sql= "INSERT INTO model_product (`product_id`,`parent_sku`,`child_sku`) Values ('$productId','$parentSku','$childSku')";
        // if(mysqli_query($conn,$sql)) {
        //     echo "success";
        // }else {
        // echo "error";
        // }
    }   
 
?>

