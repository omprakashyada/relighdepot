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
$selectData="SELECT * FROM `product_data`";
$result = $conn->query($selectData);
if ($rowData=($result->num_rows > 0 )){
    while($tableData = $result->fetch_assoc()) {
      $curl = curl_init();
      curl_setopt_array($curl, array(
       CURLOPT_URL => 'https://api.bigcommerce.com/stores/c76t6z3pfh/v3/catalog/products/'.$tableData["product_id"].'/variants',
        //CURLOPT_URL => 'https://api.bigcommerce.com/stores/c76t6z3pfh/v3/catalog/products/475/variants',
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
      $responseData=json_decode($response,true);
      $allArrayData=[];
      $arrayCount='';
      $productSkuData='';
      $childSkuData='';
      $parentSku=$tableData['product_type'];
      $tableProductId=$tableData['product_id'];
     
        foreach($responseData as $allData) {
          foreach($allData as $csvData) {
            $arrayCount=count($csvData);
            if($arrayCount == 27 ) {
              array_push($allArrayData,$csvData);
            }
          }
        }
        $variateData=[];
        $singleData=[];
        $countArray=[];
        $childSku=[];
        foreach($allArrayData as $key =>$optionData) {
          $productSkuData=$optionData['sku'];   
          array_push($countArray,$optionData['product_id']);
        }
      if(count($countArray) > 1){
        foreach($allArrayData as $data) {
          array_push($childSku,$data['sku']);
          array_push($variateData,$data);
        }
      } else {
        foreach($allArrayData as $data) {
          array_push($singleData,$data);
        }
      }

      //simple ,model table insertion 
      foreach($singleData as $selectCategoryData) {
         $productSku= @$selectCategoryData['sku'];
         $product_id=@$selectCategoryData['product_id'];
        $insert= "INSERT INTO simple_product (`product_id`,`sku`) Values ('$product_id','$productSku')";
          if(mysqli_query($conn,$insert)) {
              echo "success";
          }else {
              echo "error";
          }
      }
      $uniqueId=[];
      $childSkuData=json_encode($childSku);
      foreach($variateData as $multiData) {
        $uniqueId[]=$multiData['product_id'];
        $productUniqueId=array_unique($uniqueId);
        $parentSku= $multiData['sku']; 
        $parentTableSku=$tableData['product_type'];
       $tableProductId=$tableData['product_id'];
        $sql= "INSERT INTO model_product (`product_id`,`parent_sku`,`child_sku`) Values ('$tableProductId','$parentTableSku','$childSkuData')";
        if(mysqli_query($conn,$sql)) {
            echo "success";
        }else {
        echo "error";
        }
       }
       
      
     
    //  echo "<pre>";
    //  print_r($singleData);

    //   $alldata = array();    
    //   foreach($singleData as $data) {
    //     $product_id = $data['product_id'];
    //     $productSku = $data['sku'];
    //     $alldata[]= array($product_id,$productSku);
    //   }
      // echo "<pre>";
      // print_r($alldata);
          






    
      // foreach($responseData as $responseValue) {
      //     foreach($responseValue as $key=>$sub_category) {
      //       if(@$sub_category['product_id'] > 0) {
      //         array_push($subcategoryData,$sub_category['sku']);
      //         $product_id=$sub_category['product_id'];
      //         $parentSku=$sub_category['sku'];
      //       } else {
      //         array_push($category,$sub_category);
      //       //     if(@$sub_category['option_values'] == null) {
      //       //       array_push($category,$sub_category);
      //       //     } else {
      //       //       array_push($subcategoryData,$sub_category);
         
      //     }
         
      // }   
     
     
        // echo $product_id;
        // print_r($parentSku);
        // echo "<pre>";
       // $childSku=(json_encode($subcategoryData));
        // echo "<br>";
   // }
    
      // $arrayData = [];
       //$skuData=[];
      // echo "<pre>";
      // print_r($subcategoryData);
      // echo "<br>";
        //foreach($subcategoryData as $key=>$data){
        //   $array_count = count($data['option_values']);
          //  for($x=1; $x<=$countValue ;$x++ ) { 
          //    array_push($skuData,$data['sku']);
          //  }
        //  $subChildCategory =  json_encode($skuData);
        //   echo "<pre>";
        //   print_r($subChildCategory);
            // $productId=$data['product_id'];
            // $parentSku= $data['sku']; 
            // $sql= "INSERT INTO model_product (`product_id`,`parent_sku`,`child_sku`) Values ('$product_id','$parentSku','$childSku')";
            // if(mysqli_query($conn,$sql)) {
            //     echo "success";
            // }else {
            // echo "error";
            // }
        //}

    // $bigArrayData= [];
    // foreach($category as $categoryData) {
    //     $countData=count($categoryData);
    //     if($countData == 27) {
    //         array_push($bigArrayData,$categoryData);
    //     }
       
    // }
    //   foreach($bigArrayData as $selectCategoryData) {
    //       $productSku= @$selectCategoryData['sku'];
    //       $product_id=@$selectCategoryData['product_id'];
    //       $insert= "INSERT INTO simple_product (`product_id`,`sku`) Values ('$product_id','$productSku')";
    //       if(mysqli_query($conn,$insert)) {
    //           echo "success";
    //       }else {
    //           echo "error";
    //       }
   //  }

    
  }
}
?>
