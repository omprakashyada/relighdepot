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
   

}

?>