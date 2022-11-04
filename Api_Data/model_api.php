<?php
$row=0;
$csvData=[];
$simple_array = array();
$model_array = array();
$handle = fopen(__DIR__.'/files/model_product_id-11-03-11-22.csv', "r");
while (($header = fgetcsv($handle)) !== FALSE) {
    $num = count($header);
    if($row ==0 ){
        $row++; 
    } else {
    //   $productId=($header[0]);
    //   $productId=($header[1]);
    //   $productSku=$header[2];
        $product_id=$header[0];
        // $parent_sku=$header[1];
        // echo "<pre>";
        // print_r($product_id);
        $curl = curl_init();
        curl_setopt_array($curl, array(
        //CURLOPT_URL => 'https://api.bigcommerce.com/stores/av4rzyboqm/v3/catalog/products/'.$productId.'/variants?page=10',
        // CURLOPT_URL => 'https://api.bigcommerce.com/stores/av4rzyboqm/v3/catalog/products/'.$productId.'/variants',
        CURLOPT_URL => 'https://api.bigcommerce.com/stores/av4rzyboqm/v3/catalog/products/'.$product_id,
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
            foreach($responseData as $data) {
                if(@$data['base_variant_id']=='') {
                    if(empty($data)) {
                    } else {
                        $model_array[]=$data; 
                    } 
                } else {
                $simple_array[]=$data; 
                }
            }
         }
    }

    $header[]=array('id','name',  'type','sku', 'description','weight', 'width','depth', 'height','price','cost_price', 'retail_price','sale_price','map_price','tax_class_id','product_tax_code', 'calculated_price', 'brand_id','option_set_id', 'option_set_display', 'inventory_level',  'inventory_warning_level', 'inventory_tracking','reviews_rating_sum','reviews_count','total_sold','fixed_cost_shipping_price','is_free_shipping','is_visible', 'is_featured','warranty', 'bin_picking_number',  'upc', 'mpn', 'gtin','search_keywords','availability', 'availability_description','sort_order', 'condition','is_condition_shown','order_quantity_minimum','order_quantity_maximum',  'page_title',  'base_variant_id',);
    $fileName='model-data-11-'.date("d-m-y").'.csv';
    $downloadDir=__DIR__."/model_data/".$fileName;
    $fileOpen = fopen($downloadDir, "w");
  foreach($model_array as $csvData){
      @$id=$csvData['id'];
      @$name=$csvData['name']; 
      @$type=$csvData['type'];
      @$sku=$csvData['sku'];
      @$description=$csvData['description'];
      @$weight=$csvData['weight'];
      @$width=$csvData['width'];   
      @$depth=$csvData['depth'];    
      @$height=$csvData['height'];   
      @$price=$csvData['price'];    
      @$cost_price=$csvData['cost_price'];    
      @$retail_price=$csvData['retail_price'];    
      @$sale_price=$csvData['sale_price'];    
      @$map_price=$csvData['map_price'];    
      @$tax_id=$csvData['tax_class_id'];    
      @$product_tax=$csvData['product_tax_code'];   
      @$calculated_price=$csvData['calculated_price'];
      @$brand_id=$csvData['brand_id']; 
      @$option_set_id=$csvData['option_set_id']; 
      @$option_display=$csvData['option_set_display'];
      @$inventry_level=$csvData['inventory_level']; 
      @$inventry_warning_level=$csvData['inventory_warning_level']; 
      @$inventry_tracking=$csvData['inventory_tracking'];
      @$review_rating_sum=$csvData['reviews_rating_sum']; 
      @$review_count=$csvData['reviews_count']; 
      @$Total_sold=$csvData['total_sold'];
      @$fixed_cost=$csvData['fixed_cost_shipping_price'];
      @$is_free_sipping=$csvData['is_free_shipping']; 
      @$is_visible=$csvData['is_visible']; 
      @$isFeatured=$csvData['is_featured']; 
      @$warrenty=$csvData['warranty']; 
      @$binpcingNumber=$csvData['bin_picking_number']; 
      @$upc=$csvData['upc']; 
      @$mpn=$csvData['mpn']; 
      @$gtin=$csvData['gtin']; 
      @$searchKeyword=$csvData['search_keywords']; 
      @$avilityKeyword=$csvData['availability']; 
      @$avi_description=$csvData['availability_description'];
      @$sort_order=$csvData['sort_order'];
      @$condition=$csvData['condition'];
      @$condition_shown=$csvData['is_condition_shown']; 
      @$order_quntity_min=$csvData['order_quantity_minimum'];
      @$order_quntity_max=$csvData['order_quantity_maximum']; 
      @$page_title=$csvData['page_title'];
      @$base_varient=$csvData['base_variant_id'];
      $header[]=array(@$id, @$name, @$type, $sku,@$description,@$weight, @$width,@$depth, @$height, @$price,@$cost_price,  @$retail_price, @$sale_price,@$map_price, @$tax_id, @$product_tax,  @$calculated_price, @$brand_id,  @$option_set_id,@$option_display, @$inventry_level, @$inventry_warning_level, @$inventry_tracking, @$review_rating_sum, @$review_count, @$Total_sold,@$fixed_cost, @$is_free_sipping, @$is_visible,@$isFeatured, @$warrenty, @$binpcingNumber,@$upc,@$mpn, @$gtin,@$searchKeyword, @$avilityKeyword,@$avi_description, @$sort_order, @$condition, @$condition_shown,@$order_quntity_min, @$order_quntity_max,  @$page_title,@$base_varient);
  }
  foreach($header as $newData){
      fputcsv($fileOpen,$newData);
  }

?>