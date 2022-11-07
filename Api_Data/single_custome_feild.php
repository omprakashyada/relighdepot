<?php
$row=0;
$csvData=[];
$customData=[];
$handle = fopen(__DIR__.'/simple_data/single_product_id.csv',"r");
while (($header = fgetcsv($handle)) !== FALSE) {
    $num = count($header);
    if($row ==0 ){
        $row++; 
    } else {
      $productId=$header[0];
      $parent_sku = $header[1];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            //CURLOPT_URL => 'https://api.bigcommerce.com/stores/av4rzyboqm/v3/catalog/products/'.$productId.'/custom-feilds',

    CURLOPT_URL => 'https://api.bigcommerce.com/stores/av4rzyboqm/v3/catalog/products/'.$productId.'/custom-fields',
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
        foreach($responseData as $data){
            if((@count($data)) > 1) {
                $array=array('data'=>$data);
                $additional=array('parent_sku'=>$parent_sku,
                'product_id'=> $productId);
                    $arr=array_merge($array,$additional);
                    array_push($customData,$arr); 
            } 
        }
       
    }
}
$allData=[];
$result=[];
foreach($customData as $newData){
    for($i=0;$i<count($newData['data']);$i++){
        $allData[]=array(
                  'product_id' => $newData['product_id'],
                  'parent_sku' => $newData['parent_sku'],
                  @$newData['data'][$i]['name']=>@$newData['data'][$i]['value'], 
                );          
    }
    array_push($result,$allData);

}
$a=[];
$allData=[];
foreach($result as $custom) {
    for($j=1;$j<count($custom);$j++) {
    unset($custom[$j]['product_id'],$custom[$j]['parent_sku']);
    $a=$custom;
    break;
    }
    $convert_array = array_reduce($a,'array_merge',array());
    array_push($allData,$convert_array);
}

$new=[];
$header[]=array('product_id', 'parent_sku', 'Light Source','Fixture Size','Listings and Ratings', 'Ballast and Voltage', 'Color Rendering Index (CRI)', 'Lumen Output','Color Temperature', 'Total Input Watts', '__alsobought','Lamp Count', 'Lens', 'Socket', 'Application','Insulation Rating', 'Driver Type', 'Luminaire Efficacy Rating (LER)','L70 Expected Life (hours)','Color Temperature (CCT)','Max Ambient Temp', 'Pack Size','Manufacturer', 'Ballast Technology', 'Ballast Type','Lamp Type','Lamp Wattage',  'Line Voltage','Starting Type', 'Ballast Factor','Total Input Watt', 'Housing Type','Color Rendering Index', 'Rated Life', 'Expected Life (hours)', 'Color Temperature  (CCT)', 'Max Ambient', 'Color Rendering index (CRI)','Total Watt Input Watts', 'Colo Rendering Index (CRI)','Driver type','Luminaire Efficacy Rating','Max AMbient', 'L70 Expected Life hours)','Lumen Options', 'Color Rendering Index ((CRI)',  'Fixtture Size', 'Wattage', 'Fixrture Size', 'L90 Expected Life (hours)', 'Fixtrure Size', 'Coilor Temperature', 'Color TemperatureColor Rendering Index (CRI)', 'L70 Expected Hours (hours)', 'Fixture SIze',);

$fileName='custom-feilds'.date("d-m-y").'.csv';
$downloadDir=__DIR__."/custom_feilds/".$fileName;
$fileOpen = fopen($downloadDir, "w");

foreach($allData as $csvData){
        @$a=$csvData['product_id'];
        @$b=$csvData['parent_sku'];
        @$c=$csvData['Light Source'];
        @$d=$csvData['Fixture Size'];
        @$e=$csvData['Listings and Ratings'];
        @$f=$csvData['Ballast and Voltage'];
        @$g=$csvData['Color Rendering Index (CRI)'];
        @$h=$csvData['Lumen Output'];
        @$i=$csvData['Color Temperature'];
        @$j=$csvData['Total Input Watts'];
        @$k=$csvData['__alsobought'];
        @$l=$csvData['Lamp Count'];
        @$m=$csvData['Lens'];
        @$n=$csvData['Socket'];
        @$o=$csvData['Application'];
        @$p=$csvData['Insulation Rating'];
        @$q=$csvData['Driver Type'];
        @$r=$csvData['Luminaire Efficacy Rating (LER)'];
        @$s=$csvData['L70 Expected Life (hours)'];
        @$t=$csvData['Color Temperature (CCT)'];
        @$u=$csvData['Max Ambient Temp'];
        @$v=$csvData['Pack Size'];
        @$w=$csvData['Manufacturer'];
        @$x=$csvData['Ballast Technology'];
        @$y=$csvData['Ballast Type'];
        @$z=$csvData['Lamp Type'];
        @$aa=$csvData['Lamp Wattage'];
        @$bb=$csvData['Line Voltage'];
        @$cc=$csvData['Starting Type'];
        @$dd=$csvData['Ballast Factor'];
        @$ee=$csvData['Total Input Watt'];
        @$ff=$csvData['Housing Type'];
        @$gg=$csvData['Color Rendering Index'];
        @$hh=$csvData['Rated Life'];
        @$ii=$csvData['Expected Life (hours)'];
        @$jj=$csvData['Color Temperature  (CCT)'];
        @$kk=$csvData['Max Ambient'];
        @$ll=$csvData['Color Rendering index (CRI)'];
        @$mm=$csvData['Total Watt Input Watts'];
        @$nn=$csvData['Colo Rendering Index (CRI)'];
        @$oo=$csvData['Driver type'];
        @$pp=$csvData['Luminaire Efficacy Rating'];
        @$qq=$csvData['Max AMbient'];
        @$rr=$csvData['L70 Expected Life hours)'];
        @$ss=$csvData['Lumen Options'];
        @$tt=$csvData['Color Rendering Index ((CRI)'];
        @$uu=$csvData['Fixtture Size'];
        @$vv=$csvData['Wattage'];
        @$ww=$csvData['Fixrture Size'];
        @$xx=$csvData['L90 Expected Life (hours)'];
        @$yy=$csvData['Fixtrure Size'];
        @$zz=$csvData['Coilor Temperature'];
        @$aaa=$csvData['Color TemperatureColor Rendering Index (CRI)'];
        @$bbb=$csvData['L70 Expected Hours (hours)'];
        @$ccc=$csvData['Fixture SIze'];
        @$header[]=array(@$a, @$b,@$c, @$d, @$e,   @$f, @$g, @$h, @$i, @$j,  @$k, @$l, @$m,  @$n,  @$o,@$p, @$q, @$r, @$s,  @$t, @$u, @$v, @$w, @$x, @$y, @$z,@$aa,@$bb, @$cc, @$dd, @$ee, @$ff, @$gg, @$hh, @$ii, @$jj,@$kk, @$uu, @$ll, @$mm, @$nn,@$oo,@$pp, @$qq,  @$rr, @$ss,@$tt,@$uu, @$vv, @$ww, @$xx, @$yy, @$zz, @$aaa, @$bbb, @$ccc);
//$new[]=(array_keys($csvData));
}

// echo "<pre>";
// print_r(array_unique($new,SORT_REGULAR));
foreach($header as $newData){
    fputcsv($fileOpen,$newData);
}
?>

           

    
                             
           
                                    
        
            
          

 
                      
 
                                        
                      
              
  
        
               
    
                      
 
    
            
                
           
          
                                    
        
      
 
                      
 
                                        
           

    
                             
           
                                    
        
            
          

 
                      
 
                                        