 <?php
    $row=0;
    $csvData=[];
    $simple_array = array();
    $model_array = array();
    $varientData=[];
    // model_product_id-2-03-11-22
    $handle = fopen(__DIR__.'/model_data/all_model_id.csv', "r");
    while (($header = fgetcsv($handle,100,",")) !== FALSE) {
        if($row ==0 ){
            $row++; 
        } else {
            $product_id=($header[0]);
            $parent_sku=$header[1];
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.bigcommerce.com/stores/av4rzyboqm/v3/catalog/products/'.$product_id.'/variants?page=2',
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
    foreach($varientData as $newData){
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
    $headers[]=array( 'product_id','parent_sku','sku','price','calculated_price','sale_price','retail_price','map_price','cost_price','Wattage Options','Color Temperature (CCT)','End Cap Finish Options','Wattage & Optic Options','Voltage Options','Lens Options', 'Driver Option','Finish Options', 'Height Options','Wattage & Optics Options','End Cap Options', 'Wattage  Options','Wattage & Globe Options','Pendant Mounting Kit','Wattage & Lumen Options', 'Beam Angle Options','Fixture Options', 'Pendant Mount Kit', 'Fixture Size', 'Stem Mount Options:', 'Ceiling Canopy Options', 'Wire Guard Options:', 'Stem Mount Options','Mounting Options', 'Voltage', 'Optics Options', 'Distribution Options','Connector Type Options', 'Trim Type Options', 'Photocell Options','Wattage & Optics/Beams Options','Wattage Optics/Beams Options', 'Factory Installed Lamps','Mounting Kit',  'Occupancy Sensor', 'Wiring Options','Size & Wattage Options', 'Control Options',);

     $a=[];
        $fileName='varient-data-2-'.date("d-m-y").'.csv';
        $downloadDir=__DIR__."/varientData/page-2/".$fileName;
        $fileOpen = fopen($downloadDir, "w");
        foreach($allData as $csvData){
            echo "<pre>";
            @$a=$csvData['product_id'];
            @$b=$csvData['parent_sku'];
            @$c=$csvData['sku'];
            @$d=$csvData['price'];
            @$e=$csvData['calculated_price'];
            @$f=$csvData['sale_price'];
            @$g=$csvData['retail_price'];
            @$h=$csvData['map_price'];
            @$i=$csvData['cost_price'];
            @$j=$csvData['Wattage Options'];
            @$k=$csvData['Color Temperature (CCT)'];
            @$l=$csvData['End Cap Finish Options'];
            @$m=$csvData['Wattage & Optic Options'];
            @$n=$csvData['Voltage Options'];
            @$o=$csvData['Lens Options'];
            @$p=$csvData['Driver Option'];
            @$q=$csvData['Finish Options'];
            @$r=$csvData['Height Options'];
            @$s=$csvData['Wattage & Optics Options'];
            @$t=$csvData['End Cap Options'];
            @$u=$csvData['Wattage  Options'];
            @$v=$csvData['Wattage & Globe Options'];
            @$w=$csvData['Pendant Mounting Kit'];
            @$x=$csvData['Wattage & Lumen Options'];
            @$y=$csvData['Beam Angle Options'];
            @$z=$csvData['Fixture Options'];
            @$aa=$csvData['Pendant Mount Kit'];
            @$bb=$csvData['Fixture Size'];
            @$cc=$csvData['Stem Mount Options:'];
            @$dd=$csvData['Ceiling Canopy Options'];
            @$ee=$csvData['Wire Guard Options:'];
            @$ff=$csvData['Stem Mount Options'];
            @$gg=$csvData['Mounting Options'];
            @$hh=$csvData['Voltage'];
            @$ii=$csvData['Optics Options'];
            @$jj=$csvData['Distribution Options'];
            @$kk=$csvData['Connector Type Options'];
            @$uu=$csvData['Trim Type Options'];
            @$ll=$csvData['Photocell Options'];
            @$mm=$csvData['Wattage & Optics/Beams Options'];
            @$nn=$csvData['Wattage Optics/Beams Options'];
            @$oo=$csvData['Factory Installed Lamps'];
            @$pp=$csvData['Mounting Kit'];
            @$qq=$csvData['Occupancy Sensor'];
            @$rr=$csvData['Wiring Options'];
            @$ss=$csvData['Size & Wattage Options'];
            @$tt=$csvData['Control Options'];
        // $a[]=(array_keys($csvData));
        @$headers[]=array(@$a, @$b,@$c, @$d, @$e,   @$f, @$g, @$h, @$i, @$j,  @$k, @$l, @$m,  @$n,  @$o,@$p, @$q, @$r, @$s,  @$t, @$u, @$v, @$w, @$x, @$y, @$z,@$aa,@$bb, @$cc, @$dd, @$ee, @$ff, @$gg, @$hh, @$ii, @$jj,@$kk, @$uu, @$ll, @$mm, @$nn,@$oo,@$pp, @$qq,  @$rr, @$ss,@$tt,);
       
    }
    foreach($headers as $newData){
        fputcsv($fileOpen,$newData);
    }

//  echo "<pre>";
//  print_r(array_unique($a,SORT_REGULAR));
 
  
 
?> 
  
                
                               
 
    
 
                 
    
  

















                
                                    
            
    
          
   
 
  
               
  
                      
          
                      
  
        
               
    
                      
 
    
            
                
           
          
                                    
        
      
 
                      
 
                                        
           

    
                             
           
                                    
        
            
          

 
                      
 
                                               
                      
  
        
               
    
                      
 
    
            
                
           
          
                                    
        
      
 
                      
 
                                        
           

    
                             
           
                                    
        
            
          

 
                      
 
                                        
      
 
                      
 
                                        
           

    
                             
           
                                    
        
            
          

 
                      
 
                                               
                      
  
        
               
    
                      
 
    
            
                
           
          
                                    
        
      
 
                      
 
                                        
           

    
                             
           
                                    
        
            
          

 
                      
 
                                        
                
           
          
                                    
        
      
 
                      
 
                                        
           

    
                             
           
                                    
        
            
          

 
                      
 
                                               
                      
  
        
               
    
                      
 
    
            
                
           
          
                                    
        
      
 
                      
 
                                        
           

    
                             
           
                                    
        
            
          

 
                      
 
                                        
      
 
                      
 
                                        
           

    
                             
           
                                    
        
            
          

 
                      
 
                                               
                      
  
        
               
    
                      
 
    
            
                
           
          
                                    
        
      
 
                      
 
                                        
           

    
                             
           
                                    
        
            
          

 
                      
 
                                        