<!-- <  ?php
session_start(); 
include_once (__DIR__.'/authentication.php');

?>
< ?php
$servername = "localhost";
$username = "root";
$password = "";
$database='rdevarona_relight_depot_search';
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);

}


if(isset($_POST['submit'])) {
   $uploadFile=$_FILES['uploadfile'];
        $arrayData=[]; 
        global $data;
        global $count;
        $i=0;
        $records = []; 
        $handle = fopen($_FILES['uploadfile']['tmp_name'], "r");
        while (($header = fgetcsv($handle, 10000, ",")) !== FALSE)
        { 
            foreach($header as $data) {
                echo "<pre>";
                print_r($data);
                
            }
        
        }

} -->

<?php
session_start(); 
include_once (__DIR__.'/authentication.php');
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database='rdevarona_relight_depot_search';
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);

}


if(isset($_POST['submit'])) {
    $uploadFile=$_FILES['uploadfile'];
    // if($uploadFile=='') {
    //     echo "error";
    // } else {
        $truncateData="TRUNCATE TABLE product_data";
        mysqli_query($conn,$truncateData);
        $arrayData=[]; 
        $itemType='';
        $productId='';
        $productType='';
        $columnValues=[];
        $row=0;
        $handle = fopen($_FILES['uploadfile']['tmp_name'], "r");
        while (($header = fgetcsv($handle, 10000, ",")) !== FALSE) {
            $num = count($header);
    
            // for ($c=0; $c < $num; $c++) {
            //     echo "<pre>";
            //   print_r($header[$c]);
            //     echo "<pre>";
            //    print_r(@$header[$c]);
                // if($header[$c] == "Product Code/SKU") {
                //     // echo $c;
                //     print_r(prev($header[$c]));
                //     //print_r($header[$c]);
                    
                //     // array_push($arrayData)
                // //    $header[$row][$c]=$header[$c];
                // } elseif($header[$c] == "Item Type") {
                //     // echo $c;
                // } elseif($header[$c] == "Product ID") {
                //     // echo $c;
                // }
                // echo $c;
                // echo "<pre>";
                // print_r(@$header[0][$c]);
            //    }
               
            if($row ==0 ){
                $row++; 
            } else {
                $itemType=($header[0]);
                $productId=($header[1]);
                $productType=($header[4]);
                if($itemType =='Product') {
                    $insert= "INSERT INTO product_data (`product_id`,`item_type`,`product_type`) Values ('$productId','$itemType','$productType')";
                    if(mysqli_query($conn,$insert)) {
                        echo "success insert";
                    }else {
                        echo "error";
                    } 
                } else {
                    echo "error";
                }
                
                    
            }
        }
        
    //}
    
}

?>

