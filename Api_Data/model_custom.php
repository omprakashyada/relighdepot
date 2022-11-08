<?php
$row=0;
$csvData=[];
$customData=[];
$handle = fopen(__DIR__.'/model_data/all_model_id.csv',"r");
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

$headers[]=array('product_id','parent_sku', 'Light Source', 'Fixture Size','Color Rendering Index (CRI)', 'Lumen Output','Color Temperature','Total Input Watts','Ballast and Voltage','Listings and Ratings', 'Driver Type','Luminaire Efficacy Rating (LER)','L70 Expected Life (hours)', 'Lamp Count', 'Pack Size','Total Input Watt', 'Color Temperature (CCT)',  'Max Ambient Temp', '__alsobought', 'Max Color Rendering Index (CRI)Temp','Lamp Type','Base', 'Bulb', 'Watts', 'Initial Lumens', 'Mean Lumens', 'Color Temp. (deg K)', 'Color Rendition Index (CRI)', 'Coating', 'Lamp Life (3hrs. per start)', 'Lamp Life (12hrs. per start)', 'MOL (in / mm)','MOD (in / mm)', 'Manufacturer', 'Ballast Technology', 'Ballast Type', 'Lamp Wattage',  'Line Voltage','Starting Type', 'Ballast Factor', 'Insulation Rating', 'Pack', 'Total Inputs', 'L70 Expected Hours (hours)', 'Pack size', 'Rated Life', 'Warranty',  'Color Rendering Index', 'Expected Life (hours)', 'Color Rendering index (CRI)',  'Max Ambient', 'Light Soure', 'L70 Expected Life Hours','Fixture Watts','DriverType', 'Total Input  Watts', 'Color Rendering Imdex (CRI)', 'L70 Expected Life (hour)', 'Luminaire Efficacy Rating  (LER)', 'Color Temperature  (CCT)', 'Luminaire Efficacy Rating', 'Luminaire Efficacy rating (LER)', 'Total Watt Input','Driver  Type', 'Driver Typw', 'L70 Expected Life', 'Color Rendering Index (CRI0', 'LIght Source','120-277V','Color Rendering  Index (CRI)','Fixrture Size','Fxiture Size',);
//$new=[];

$fileName='model-custom-feild-'.date("d-m-y").'.csv';
$downloadDir=__DIR__."/model_data/custom_feild/".$fileName;
$fileOpen = fopen($downloadDir, "w");
foreach($allData as $csvData){ 
    //$new[]=(array_keys($csvData));
    @$a=@$csvData['product_id'];
    @$b=@$csvData['parent_sku'];
    @$c=@$csvData['Light Source'];
    @$d=@$csvData['Fixture Size'];
    @$e=@$csvData['Color Rendering Index (CRI)'];
    @$f=@$csvData['Lumen Output'];
    @$g=@$csvData['Color Temperature'];
    @$h=@$csvData['Total Input Watts'];
    @$i=@$csvData['Ballast and Voltage'];
    @$j=@$csvData['Listings and Ratings'];
    @$k=@$csvData['Driver Type'];
    @$l=@$csvData['Luminaire Efficacy Rating (LER)'];
    @$m=@$csvData['L70 Expected Life (hours)'];
    @$n=@$csvData['Lamp Count'];
    @$o=@$csvData['Pack Size'];
    @$p=@$csvData['Total Input Watt'];
    @$q=@$csvData['Color Temperature (CCT)'];
    @$r=@$csvData['Max Ambient Temp'];
    @$s=@$csvData['__alsobought'];
    @$t=@$csvData['Max Color Rendering Index (CRI)Temp'];
    @$u=@$csvData['Lamp Type'];
    @$v=@$csvData['Base'];
    @$w=@$csvData['Bulb'];
    @$x=@$csvData['Watts'];
    @$y=@$csvData['Initial Lumens'];
    @$z=@$csvData['Mean Lumens'];
    @$aa=@$csvData['Color Temp. (deg K)'];
    @$bb=@$csvData['Color Rendition Index (CRI)'];
    @$cc=@$csvData['Coating'];
    @$dd=@$csvData['Lamp Life (3hrs. per start)'];
    @$ee=@$csvData['Lamp Life (12hrs. per start)'];
    @$ff=@$csvData['MOL (in / mm)'];
    @$gg=@$csvData['MOD (in / mm)'];
    @$hh=@$csvData['Manufacturer'];
    @$ii=@$csvData['Ballast Technology'];
    @$jj=@$csvData['Ballast Type'];
    @$kk=@$csvData['Lamp Wattage'];
    @$ll=@$csvData['Line Voltage'];
    @$mm=@$csvData['Starting Type'];
    @$nn=@$csvData['Ballast Factor'];
    @$oo=@$csvData['Insulation Rating'];
    @$pp=@$csvData['Pack'];
    @$qq=@$csvData['Total Inputs'];
    @$rr=@$csvData['L70 Expected Hours (hours)'];
    @$ss=@$csvData['Pack size'];
    @$tt=@$csvData['Rated Life'];
    @$uu=@$csvData['Warranty'];
    @$vv=@$csvData['Color Rendering Index'];
    @$ww=@$csvData['Expected Life (hours)'];
    @$xx=@$csvData['Color Rendering index (CRI)'];
    @$yy=@$csvData['Max Ambient'];
    @$zz=@$csvData['Light Soure'];
    @$aaa=@$csvData['L70 Expected Life Hours'];
    @$bbb=@$csvData['Fixture Watts'];
    @$ccc=@$csvData['DriverType'];
    @$ddd=@$csvData['Total Input  Watts'];
    @$eee=@$csvData['Color Rendering Imdex (CRI)'];
    @$fff=@$csvData['L70 Expected Life (hour)'];
    @$ggg=@$csvData['Luminaire Efficacy Rating  (LER)'];
    @$hhh=@$csvData['Color Temperature  (CCT)'];
    @$iii=@$csvData['Luminaire Efficacy Rating'];
    @$jjj=@$csvData['Luminaire Efficacy rating (LER)'];
    @$kkk=@$csvData['Total Watt Input'];
    @$lll=@$csvData['Driver  Type'];
    @$mmm=@$csvData['Driver Typw']; 
    @$nnn=@$csvData['L70 Expected Life'];
    @$ooo=@$csvData['Color Rendering Index (CRI0']; 
    @$ppp=@$csvData['LIght Source']; 
    @$qqq=@$csvData['120-277V']; 
    @$rrr=@$csvData['Color Rendering  Index (CRI)'];
    @$sss=@$csvData['Fixrture Size'];
    @$ttt=@$csvData['Fxiture Size'];

    $headers[]=array(@$a, @$b,@$c, @$d, @$e,  @$f, @$g, @$h, @$i, @$j,  @$k, @$l, @$m,  @$n,  @$o,@$p, @$q, @$r, @$s,  @$t, @$u, @$v, @$w, @$x, @$y,@$z,@$aa,@$bb, @$cc, @$dd, @$ee, @$ff, @$gg, @$hh, @$ii, @$jj,@$kk,@$ll, @$mm, @$nn,@$oo,@$pp, @$qq,  @$rr, @$ss,@$tt,@$uu,@$vv, @$ww, @$xx, @$yy, @$zz, @$aaa,@$bbb,  @$ccc, @$ddd, @$eee, @$fff, @$ggg, @$hhh, @$iii, @$jjj, @$kkk,@$lll, @$mmm,@$nnn,@$ooo,@$ppp,@$qqq,@$rrr,@$sss,@$ttt);
}

// echo "<pre>";
// print_r(array_unique($new,SORT_REGULAR));
foreach($headers as $newData){
    fputcsv($fileOpen,$newData);
}

?>
                             
    