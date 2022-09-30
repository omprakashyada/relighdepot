<?php session_start();?>

<!DOCTYPE html>
<html>
 <head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
   <script  type="text/javascript"  src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script  type="text/javascript"  src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<style>
	.main_form {
    position: relative;
}
button#read {
    position: absolute;
    right: 276px;
    top: 48px;
}
td {
    text-align: center;
}
</style>
 </head>
 <body >
	 <div class="container">
		<form method="POST" style="text-align: center" id="find_form">
		   <h2>Enter Your Search Values</h2>
		     <label>Existing Value :</label>
		     <input type="text" name="existing" id="existing" placeholder="Existing Value" />
		    <input type="submit" name="Find" value="Find" id="find"/>
		</form>
		<div class="main_form">
		<form method="POST" style="text-align: center" id="replace_form">
		   <h2>Enter Your Replace Values</h2>
		     <label>New Value :</label>
		     <input type="text" name="existing_val" id="ex_val" placeholder="Existing Value" />
		     <input type="text" name="new_val" id="new_val" placeholder="Enter New Value" />
		    <input type="submit" name="Replace" value="Replace" />
		</form>
		 <button id="read">Set Existing Value</button>
		</div>
  </div>
 </body>
</html>
<script type='text/javascript'>
$(document).ready(function(){
        $('#read').on('click', function () {
            var setvalue=$('#sess_val').val();
            $('#ex_val').val(setvalue);
       });
});
</script>
<?php 

if (($open = fopen("testing_product.csv", "r")) !== FALSE)
{
  while (($data = fgetcsv($open)) !== FALSE)
  {   
  $csv_array[] = $data;
  }
  fclose($open);
}
	if(isset($_REQUEST['Find'])){
				$option_check=$_POST['existing']; 
				$_SESSION['passing']=$_POST['existing'];
				?>
				<input type="hidden" name="sess_val" id="sess_val" value="<?php echo $_SESSION['passing'];?>">
					<table id='example' class='show-user-table display ' style='width:100%'>
													<thead>
														<tr>
														<th>Product ID</th>
														<th>Option ID</th>
														<th>Name</th>
														<th>Display Name</th>
														</tr>
													</thead>
				  <?php 
	                    foreach ($csv_array as $key => $value) {
		                  if(!$key==0){
		                  $product_id=$value[0];
		                  // echo "<pre>";  
		                  // print_r($product_id);
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
				              'X-Auth-Token: c58s1pacoyqqvry7a1ja4c8o7rxd6hs'
				            ),
				          ));

				          $response = curl_exec($curl);
				          curl_close($curl);
				          $data_var=json_decode($response);
				          if(isset($data_var->data)){
				                  $option=$data_var->data; 
				                   foreach ($option as $option_c) {
				                   $display_name=$option_c->display_name; 
				                       if($display_name==$option_check){
				                        $option_id=$option_c->id;
				                        $curl = curl_init();
				                            curl_setopt_array($curl, array(
				                            CURLOPT_URL => 'https://api.bigcommerce.com/stores/c76t6z3pfh/v3/catalog/products/'.$product_id.'/options/'.$option_id,
				                            CURLOPT_RETURNTRANSFER => true,
				                            CURLOPT_ENCODING => '',
				                            CURLOPT_MAXREDIRS => 10,
				                            CURLOPT_TIMEOUT => 0,
				                            CURLOPT_FOLLOWLOCATION => true,
				                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				                            CURLOPT_CUSTOMREQUEST => 'GET',
				                            // CURLOPT_POSTFIELDS =>'{

				                            // "display_name": $option_replace

				                            // }',
				                            CURLOPT_HTTPHEADER => array(
				                            'X-Auth-Token: c58s1pacoyqqvry7a1ja4c8o7rxd6hs',
				                            'Content-Type: application/json'
				                            ),
				                            ));
				                            $response = curl_exec($curl);
				                            curl_close($curl);
				                             $result_data=json_decode($response);
				                             $result_output=$result_data->data;?>

											
															<tbody class="tbody">
																<tr>
																<td><?php echo $result_output->product_id;?> </td>   
																<td><?php echo $result_output->id;?> </td>     
																<td><?php echo $result_output->name;?></td>
																<td><?php echo $result_output->display_name;?></td>
																</tr>
															</tbody>
											
                        
				                           
				                      <?php }
				                       
				                   }

				                 }   
				           }
				       }?>
				       	</table>
				<?php }


				if(isset($_REQUEST['Replace'])){
					$option_check=$_POST['existing_val'];
					$option_replace=$_POST['new_val'];?>
					<table id='example' class='show-user-table display ' style='width:100%'>
													<thead>
														<tr>
														<th>Product ID</th>
														<th>Option ID</th>
														<th>Name</th>
														<th>Display Name</th>
														</tr>
													</thead>
					<?php
					  foreach ($csv_array as $key => $value) {
		                  if(!$key==0){
		                  	 $product_id=$value[0];  
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
				              'X-Auth-Token: c58s1pacoyqqvry7a1ja4c8o7rxd6hs'
				            ),
				          ));

				          $response = curl_exec($curl);

				          curl_close($curl);
				          $data_var=json_decode($response);
				          if(isset($data_var->data)){

				                  $option=$data_var->data; 
				                   foreach ($option as $option_c) {
				                   
				                   $display_name=$option_c->display_name; 
				                    
				                       if($display_name==$option_check){
				                        $option_id=$option_c->id;
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

				                            "display_name": "'.$option_replace.'"

				                            }',
				                            CURLOPT_HTTPHEADER => array(
				                            'X-Auth-Token: c58s1pacoyqqvry7a1ja4c8o7rxd6hs',
				                            'Content-Type: application/json'
				                            ),
				                            ));

				                            $response = curl_exec($curl);

				                            curl_close($curl);
				                           $result_data=json_decode($response);
				                             $result_output=$result_data->data;?>

											
															<tbody class="tbody">
																<tr>
																<td><?php echo $result_output->product_id;?> </td> 
																<td><?php echo $result_output->id;?> </td>     
																<td><?php echo $result_output->name;?></td>
																<td><?php echo $result_output->display_name;?></td>
																</tr>
															</tbody>

				                      <?php }
				                       

				                   }

				                 }   

				        
				           }
				       }
				  ?>
				 </table>
				<?php
				}

				 ?>

