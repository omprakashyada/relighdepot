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
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>configure-Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-10" style="min-height:100px;margin:20px auto">
            <table class="table" id="tblUser">
            <thead class="text-info">
                <tr>
                    <th scope="col">SR.NO</th>
                    <th scope="col">PRODUCT-ID</th>
                    <th scope="col">PARENT-SKU</th>
                    <th scope="col">CHILD-SKU</th>
                </tr>
            </thead>
             <tbody class="text-secondary">
             <?php
                     $selectData="SELECT * FROM `model_product`";
                     $result = $conn->query($selectData);
                     $i=1;
                    while($tableData = $result->fetch_assoc()){
                ?>
                <tr>
                   
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $tableData['product_id']; ?></td>
                    <td><?php echo $tableData['parent_sku']; ?></td>
                    <td><?php echo $tableData['child_sku']; ?></td>
                </tr>
                <?php
                    }
            
                ?>
            </tbody>
        </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
jQuery(document).ready(function($) {
    $('#tblUser').DataTable();
} );
</script>
</body>
</html>