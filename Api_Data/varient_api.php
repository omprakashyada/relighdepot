 <?php
    $row=0;
    $csvData=[];
    $simple_array = array();
    $model_array = array();
    $varientData=[];
    // model_product_id-2-03-11-22
    $handle = fopen(__DIR__.'/files/model_product_id-5-03-11-22.csv', "r");
    while (($header = fgetcsv($handle,100,",")) !== FALSE) {
        if($row ==0 ){
            $row++; 
        } else {
            $product_id=($header[0]);
            $parent_sku=$header[1];
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.bigcommerce.com/stores/av4rzyboqm/v3/catalog/products/'.$product_id.'/variants',
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
                if(@count($data)== 1){
                } else {
                    foreach($data as $parentData) {
                    $additional=array('parent_sku'=> $parent_sku);
                    $arr=array_merge($parentData,$additional);
                    array_push($varientData,$arr); 
                    }
                }
                
            }
        }
    }

  
    $optionData=[];
    $optionArray=[];
    $allData=[];
    foreach($varientData as $newData) {
        foreach($newData['option_values'] as $opValue){
            $allData[]=array(
                'product_id' => $newData['product_id'],
                'parent_sku' => $newData['parent_sku'],
                'sku' => $newData['sku'],
                'price'=> $price=$newData['price'],
                'calculated_price'=> $calculated=$newData['calculated_price'],
                'sale_price'  => $sale_price=$newData['sale_price'],  
                'retail_price' => $retaile_price=$newData['retail_price'],  
                'map_price'=> $map_price=$newData['map_price'],  
                'cost_price' => $cost_price=$newData['cost_price'], 
                $opValue['option_display_name']=> $opValue['label'],
            );
        }
    }
    
//     $headers[]=array('product_id','parent_sku','sku','price','calculated_price','sale_price','retail_price','map_price','cost_price','Finish Options', 'Wattage & Lumen Options',
//     'Color Temperature (CCT)', 'Wattage Options', 'Fixture Options','Length/Wattage Options','Length / Wattage Options', 'Length & Wattage Options','Voltage Options','Mounting Options','Beam Angle Options', 'Size & Wattage Options','Source/Wattage Options','Wattage & Voltage Options', 'Size and Wattage Options','Wattage and Voltage Options', 'Housing Sizes Option','Housing Sizes Options','Fixture Size',  'Stem Mount Options:','Ceiling Canopy Options','Wire Guard Options:','Stem Mount Options','Size Options', 'Photo Cell Options', 'Lens Options', 'Rod Set Options', 'Spool Length', 'Distribution Options','Lamp Options', 'Size & Lamps Options','Wattage & Lens Options','Trim Color Options', 'Pendant Mounting Kit', 'Trim Shape Options','Length Options','Lumen Package Options', 'Lumen Package & Lens Type Options','Watts & Bollard Options','Sensor Options', 'Frame Options','Trimplate Options', 'Wattage & VA Rating','Wattage & Battery Type', 'Soft Connector Options','Cable Options', 'No. of Heads Options','Housing Color Options',
//   );

    $a=[];
    // $fileName='varient-data-4-'.date("d-m-y").'.csv';
    // $downloadDir=__DIR__."/varientData/".$fileName;
    // $fileOpen = fopen($downloadDir, "w");
        foreach($allData as $csvData){
        //     echo "<pre>";
         $a[]=(array_keys($csvData));
//         @$id=$csvData['product_id'];
//         @$parent_sku=@$csvData['parent_sku'];
//         @$sku=$csvData['sku'];
//         @$price=$csvData['price'];
//         @$calculated=$csvData['calculated_price'];   
//         @$sale_price=$csvData['sale_price']; 
//         @$retail_price=$csvData['retail_price'];
//         @$map_price=$csvData['map_price'];   
//         @$cost_price=$csvData['cost_price']; 

//     @$finish_op=@$csvData['Finish Options']; 
//     @$wattelumen=@$csvData['Wattage & Lumen Options'];
//     @$cct=@$csvData['Color Temperature (CCT)'];
//     @$wto=@$csvData['Wattage Options'];
//     @$fxtrop=@$csvData['Fixture Options'];
//     @$lenswat=@$csvData['Length/Wattage Options'];
//     @$lengthwatop=@$csvData['Length / Wattage Options'];
//     @$lenandwath=@$csvData['Length & Wattage Options'];
//     @$voltageopt=@$csvData['Voltage Options'];
//     @$mountingop=@$csvData['Mounting Options'];
//     @$beam=@$csvData['Beam Angle Options'];
//     @$sizewatt=@$csvData['Size & Wattage Options'];
//     @$sourcewatt=@$csvData['Source/Wattage Options'];
//     @$wattegandvolt=@$csvData['Wattage & Voltage Options'];
//     @$sizeandwattege=@$csvData['Size and Wattage Options'];
//     @$wattegeandvoltagetwo=@$csvData['Wattage and Voltage Options'];
//     @$housingsizeoption=@$csvData['Housing Sizes Option'];
//     @$housesizeoptwo=@$csvData['Housing Sizes Options'];
//     @$fixturesize=@$csvData['Fixture Size'];
//     @$stemmount=@$csvData['Stem Mount Options:'];
//     @$ceiling=@$csvData['Ceiling Canopy Options'];
//     @$wiregop=@$csvData['Wire Guard Options:'];
//     @$stemmountoptwo=@$csvData['Stem Mount Options'];
//     @$sizeop=@$csvData['Size Options'];
//     @$photocell=@$csvData['Photo Cell Options'];
//     @$lenseoption=@$csvData['Lens Options'];
//     @$rodset=@$csvData['Rod Set Options'];
//     @$spoollength=@$csvData['Spool Length'];
//     @$distribution=@$csvData['Distribution Options'];
//     @$lampp=@$csvData['Lamp Options'];
//     @$sizeandlampp=@$csvData['Size & Lamps Options'];
//     @$watandlense=@$csvData['Wattage & Lens Options'];
//     @$trimcolor=@$csvData['Trim Color Options'];
//     @$pendantmount=@$csvData['Pendant Mounting Kit'];
//     @$trimshap=@$csvData['Trim Shape Options'];
//     @$length=@$csvData['Length Options'];
//     @$lumenpack=@$csvData['Lumen Package Options'];
//     @$lemuneandlense=@$csvData['Lumen Package & Lens Type Options'];
//     @$wattsbollard=@$csvData['Watts & Bollard Options'];
//     @$sensor=@$csvData['Sensor Options'];
//     @$framoption=@$csvData['Frame Options'];
//     @$trimplateop=@$csvData['Trimplate Options'];
//     @$wattandvarat=@$csvData['Wattage & VA Rating'];
//     @$watteandbaterry=@$csvData['Wattage & Battery Type'];
//     @$softconnect=@$csvData['Soft Connector Options'];
//     @$cableoption=@$csvData['Cable Options'];
//     @$noofhead=@$csvData['No. of Heads Options'];
//     @$housing=@$csvData['Housing Color Options'];

// $headers[]=array(@$id, @$parent_sku, @$sku, @$price, @$calculated,@$sale_price,@$retail_price, @$map_price, @$cost_price,@$finish_op, @$wattelumen, @$cct, @$wto,  @$fxtrop,  @$lenswat, @$lengthwatop, @$lenandwath, @$voltageopt,  @$mountingop, @$beam,  @$sizewatt,  @$sourcewatt, @$wattegandvolt, @$sizeandwattege, @$wattegeandvoltagetwo, @$housingsizeoption, @$housesizeoptwo,   @$fixturesize, @$stemmount, @$ceiling,@$wiregop,@$stemmountoptwo, @$sizeop,  @$photocell,  @$lenseoption,  @$rodset,  @$spoollength, @$distribution, @$lampp, @$sizeandlampp,  @$watandlense, @$trimcolor, @$pendantmount, @$trimshap, @$length,  @$lumenpack, @$lemuneandlense, @$wattsbollard, @$sensor,  @$framoption, @$trimplateop, @$wattandvarat, @$watteandbaterry, @$softconnect, @$cableoption,  @$noofhead, @$housing,);
 }
 echo "<pre>";
 print_r(array_unique($a,SORT_REGULAR));
//   foreach($headers as $newData){
//       fputcsv($fileOpen,$newData);
//   }
  
 
?> 
                      
            @$housecolor=@$csvdata['Housing Color Options'];
            @$fixtureOption=@$csvdata['Fixture Options'];
            @$letterColor=@$csvdata['Letter Color Options'];
            @$=@$csvdata['Finish Options'];
            @$=@$csvdata['No. of Faces Options'];
            @$=@$csvdata['Battery Options'];
            @$=@$csvdata['Face Panel Options'];
            @$=@$csvdata['Pendant Mounting Kit
            @$=@$csvdata['Wattage Options'];
            @$=@$csvdata['Color Temperature (CCT)'];
            @$=@$csvdata['Size & Wattage Options'];
            @$=@$csvdata['Wattage & Lumen Options'];
            @$=@$csvdata['Voltage Options'];
            @$=@$csvdata['Height Options'];
            @$=@$csvdata['Mounting Options'];
            @$=@$csvdata['Wattage & Optics Options'];
            @$=@$csvdata['Lens Options'];
            @$=@$csvdata['Wattage & Lens Options'];
            @$=@$csvdata['Optics Options'];
            @$=@$csvdata['Voltage'];
            @$=@$csvdata['Sensor Options'];
            @$=@$csvdata['Optic Options'];
            @$=@$csvdata['Size Options'];
            @$=@$csvdata['Voltage Optipns'];
            @$=@$csvdata['Dimming Options'];
            @$=@$csvdata['Beam Angle Options'];
            @$=@$csvdata['Lamp Options'];
            @$=@$csvdata['Photocontrol Options'];
            @$=@$csvdata['Control Options'];
            @$=@$csvdata['Distribution Options'];
            @$=@$csvdata['Length & Wattage Options'];
  
        
            
    
                      
 
    
                             
           
                                    
        
            
          

 
                      
 
                                        
           

    
                             
           
                                    
        
            
          

 
                      
 
                                        