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
$selectData="SELECT * FROM `simple_product` limit 5";
$result = $conn->query($selectData);
$csvData=[];
while( $tableData=mysqli_fetch_array($result)) {
    array_push($csvData,$tableData);
}
$fileName='products-2022-09-28.csv';
$fileDirPath= __DIR__."/newproduct/".$fileName;
$fileOpenCsv= fopen($fileDirPath, "r");
while (($data =fgetcsv($fileOpenCsv,'1',',')) !== FALSE) {
    print_r($data);
 }
 fclose($fileOpenCsv);




?>