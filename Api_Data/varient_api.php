 <?php
    $row=0;
    $csvData=[];
    $simple_array = array();
    $model_array = array();
    $varientData=[];
    // model_product_id-2-03-11-22
    $handle = fopen(__DIR__.'/model_data/all_model_id.csv', "r");
    while (($header = fgetcsv($handle,100,",")) !== FALSE) {
        if($row ==0 ) {
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
        @$headers[]=array('product_id', 'parent_sku','sku', 'price', 'calculated_price','sale_price','retail_price','map_price', 'cost_price','Color Temperature (CCT)','Finish Options','Factory Installed Lamps','Wiring Options','Light Source Options','Select Light Source','End Cap Finish Options','Lamp Type Options','Select Reflector','Voltage Options','Letter Color Options','Number of Faces','Wattage & Lumen Options','Wattage Options','Main Cable Length','Output Voltage','Fixture Wattage','Lens Options','Height Options','Fixture Options','Wattage & Optics Options','Wattage & Optic Options','Driver Option','LED Module & Wattage Options','Select Size','Select Size (W x L)', 'End Cap Options','Wattage  Options',   'WattageOptions',  'Wattage & Globe Options',  'Metal Trim Ring Finish', 'Reflector Finish', 'Wattage & Lumen', 'Pendant Mounting Kit',  'Face Plate Style',   'Beam Angle Options',  'Output Wattage Options', 'Mounting Options','Lumen Package Options',  'Size & Wattage Options', 'Lumen Package & Lens Type Options', 'Optics Options', 'Frame Size & Wattage Options', 'Color temperature (CCT)',   'Fixture Wattage Options', 'Select Lamp Options',  'Trim Ring Finish','Select Finish (Reflectors & Baffles)','Length & Wattage Options', 'Output Voltage Options', 'Number of Channels & Wattage Options',   'Length / Wattage Options',   'Wattagen Options', 'Output Wattage & Voltage Options', 'Wattage and Lumen Options',  'Wattage / Lumen Options', 'Pendant Mount Kit',  'Length/Wattage Options',  'Source/Wattage Options',   'Wattage & Voltage Options',  'Size and Wattage Options', 'Wattage and Voltage Options', 'Housing Sizes Option','Housing Sizes Options', 'Fixture Size',    'Stem Mount Options:', 'Ceiling Canopy Options',  'Wire Guard Options:',  'Stem Mount Options',  'Size Options',  'Photo Cell Options',  'Rod Set Options',   'Spool Length',    'Distribution Options',  'Lamp Options', 'Size & Lamps Options',  'Wattage & Lens Options',  'Trim Color Options',  'Trim Shape Options',    'Length Options', 'Watts & Bollard Options', 'Sensor Options', 'Frame Options', 'Trimplate Options', 'Wattage & VA Rating', 'Wattage & Battery Type', 'Soft Connector Options', 'Cable Options',  'No. of Heads Options', 'Housing Color Options', 'No. of Faces Options','Battery Options','Face Panel Options',  'Voltage',  'Optic Options','Voltage Optipns','Dimming Options','Photocontrol Options', 'Control Options','Voltage Rating	Options','Voltage Rating Options', 'Base Type Options','Input Voltage Options', 'Connector Type Options', 'Finial & Globe Options', 'Select Options','Wattage Up/Down Options', 'Lamp Count Options', 'Trim Type Options','Options', 'Lamp / Ballast Options', 'Lamp & Ballast Options', 'Lumens','Fixture Size Options', 'Housing Options', 'Lamp/Wattage Options', 'Wattag & Lumen','Photocell Options', 'Wattage Up / Down Options','Wattage & Optics/Beams Options', 'Wattage Optics/Beams Options','Occupancy Sensor','Trim Options','Size, Wattage & Lumen Options', 'Mounting Kit', 'Fixture Configuration', 'Photo Cell','Square Trims Ring Options', 'Round Trim Ring Options','Square Trim Ring Options', 'Color', 'Emergency Battery Options','Color Te,mperature (CCT)','Reflector Options',  'Reflector', 'Color Temperature', 'Testing', 'Trim Ring Options', 'Finish Option', 'Frosted Lens',); 

        $fileName='varient-data-1-'.date("d-m-y").'.csv';
          $downloadDir=__DIR__."/varientData/page-3/".$fileName;
          $fileOpen = fopen($downloadDir, "w"); 

        foreach($allData as $csvData) {
            @$id=$csvData['product_id'];
            @$parent=$csvData['parent_sku'];
            @$sku=$csvData['sku'];
            @$pr=$csvData['price'];
            @$cp=$csvData['calculated_price'];
            @$sp=$csvData['sale_price'];
            @$rp=$csvData['retail_price'];
            @$mp=$csvData['map_price'];
            @$cp=$csvData['cost_price'];
           @$a=$csvData['Color Temperature (CCT)'];
           @$b=$csvData['Finish Options'];
           @$c=$csvData['Factory Installed Lamps'];
           @$d=$csvData['Wiring Options'];
           @$e=$csvData['Light Source Options'];
           @$f=$csvData['Select Light Source'];
           @$g=$csvData['End Cap Finish Options'];
           @$h=$csvData['Lamp Type Options'];
           @$i=$csvData['Select Reflector'];
           @$j=$csvData['Voltage Options'];
           @$k=$csvData['Letter Color Options'];
           @$l=$csvData['Number of Faces'];
           @$m=$csvData['Wattage & Lumen Options'];
           @$n=$csvData['Wattage Options'];
           @$o=$csvData['Main Cable Length'];
           @$p=$csvData['Output Voltage'];
           @$q=$csvData['Fixture Wattage'];
           @$r=$csvData['Lens Options'];
           @$s=$csvData['Height Options'];
           @$t=$csvData['Fixture Options'];
           @$u=$csvData['Wattage & Optics Options'];
           @$v=$csvData['Wattage & Optic Options'];
           @$w=$csvData['Driver Option'];
           @$x=$csvData['LED Module & Wattage Options'];
           @$y=$csvData['Select Size'];
           @$z=$csvData['Select Size (W x L)'];
           @$aa=$csvData['End Cap Options'];
           @$bb=$csvData['Wattage  Options'];
           @$cc=$csvData['WattageOptions'];
           @$dd=$csvData['Wattage & Globe Options'];
           @$ee=$csvData['Metal Trim Ring Finish'];
           @$ff=$csvData['Reflector Finish'];
           @$gg=$csvData['Wattage & Lumen'];
           @$hh=$csvData['Pendant Mounting Kit'];
           @$ii=$csvData['Face Plate Style'];
           @$jj=$csvData['Beam Angle Options'];
           @$kk=$csvData['Output Wattage Options'];
           @$ll=$csvData['Mounting Options'];
           @$mm=$csvData['Lumen Package Options'];
           @$nn=$csvData['Size & Wattage Options'];
           @$oo=$csvData['Lumen Package & Lens Type Options'];
           @$pp=$csvData['Optics Options'];
           @$qq=$csvData['Frame Size & Wattage Options'];
           @$rr=$csvData['Color temperature (CCT)'];
           @$ss=$csvData['Fixture Wattage Options'];
           @$tt=$csvData['Select Lamp Options'];
           @$uu=$csvData['Trim Ring Finish'];
           @$vv=$csvData['Select Finish (Reflectors & Baffles)'];
           @$ww=$csvData['Length & Wattage Options'];
           @$xx=$csvData['Output Voltage Options'];
           @$yy=$csvData['Number of Channels & Wattage Options'];
           @$zz=$csvData['Length / Wattage Options'];
           @$aa_1=$csvData['Wattagen Options'];
           @$bb_1=$csvData['Output Wattage & Voltage Options'];
           @$cc_1=$csvData['Wattage and Lumen Options'];
           @$dd_1=$csvData['Wattage / Lumen Options'];
           @$ee_1=$csvData['Pendant Mount Kit'];
           @$ff_1=$csvData['Length/Wattage Options'];
           @$gg_1=$csvData['Source/Wattage Options'];
           @$hh_1=$csvData['Wattage & Voltage Options'];
           @$ii_1=$csvData['Size and Wattage Options'];
           @$jj_1=$csvData['Wattage and Voltage Options'];
           @$kk_1=$csvData['Housing Sizes Option'];
           @$ll_1=$csvData['Housing Sizes Options'];
           @$mm_1=$csvData['Fixture Size'];
           @$nn_1=$csvData['Stem Mount Options:'];
           @$oo_1=$csvData['Ceiling Canopy Options'];
           @$pp_1=$csvData['Wire Guard Options:'];
           @$qq_1=$csvData['Stem Mount Options'];
           @$rr_1=$csvData['Size Options'];
           @$ss_1=$csvData['Photo Cell Options'];
           @$tt_1=$csvData['Rod Set Options'];
           @$uu_1=$csvData['Spool Length'];
           @$vv_1=$csvData['Distribution Options'];
           @$ww_1=$csvData['Lamp Options'];
           @$xx_1=$csvData['Size & Lamps Options'];
           @$yy_1=$csvData['Wattage & Lens Options'];
           @$zz_1=$csvData['Trim Color Options'];
           @$aa_2=$csvData['Trim Shape Options'];
           @$bb_2=$csvData['Length Options'];
           @$cc_2=$csvData['Watts & Bollard Options'];
           @$dd_2=$csvData['Sensor Options'];
           @$ee_2=$csvData['Frame Options'];
           @$ff_2=$csvData['Trimplate Options'];
           @$gg_2=$csvData['Wattage & VA Rating'];
           @$hh_2=$csvData['Wattage & Battery Type'];
           @$ii_2=$csvData['Soft Connector Options'];
           @$jj_2=$csvData['Cable Options'];
           @$kk_2=$csvData['No. of Heads Options'];
           @$ll_2=$csvData['Housing Color Options'];
           @$mm_2=$csvData['No. of Faces Options'];
           @$nn_2=$csvData['Battery Options'];
           @$oo_2=$csvData['Face Panel Options'];
           @$pp_2=$csvData['Voltage'];
           @$qq_2=$csvData['Optic Options'];
           @$rr_2=$csvData['Voltage Optipns'];
           @$ss_2=$csvData['Dimming Options'];
           @$tt_2=$csvData['Photocontrol Options'];
           @$uu_2=$csvData['Control Options'];
           @$vv_2=$csvData['Voltage Rating	Options'];
           @$ww_2=$csvData['Voltage Rating Options'];
           @$xx_2=$csvData['Base Type Options'];
           @$yy_2=$csvData['Input Voltage Options'];
           @$zz_2=$csvData['Connector Type Options'];
          @$aa_3=$csvData['Finial & Globe Options'];
          @$bb_3=$csvData['Select Options'];
          @$cc_3=$csvData['Wattage Up/Down Options'];
          @$dd_3=$csvData['Lamp Count Options'];
          @$ee_3=$csvData['Trim Type Options'];
          @$ff_3=$csvData['Options'];
          @$gg_3=$csvData['Lamp / Ballast Options'];
          @$hh_3=$csvData['Lamp & Ballast Options'];
          @$ii_3=$csvData['Lumens'];
          @$jj_3=$csvData['Fixture Size Options'];
          @$kk_3=$csvData['Housing Options'];
          @$ll_3=$csvData['Lamp/Wattage Options'];
          @$mm_3=$csvData['Wattag & Lumen'];
          @$nn_3=$csvData['Photocell Options'];
          @$oo_3=$csvData['Wattage Up / Down Options'];
          @$pp_3=$csvData['Wattage & Optics/Beams Options'];
          @$qq_3=$csvData['Wattage Optics/Beams Options'];
          @$rr_3=$csvData['Occupancy Sensor'];
          @$ss_3=$csvData['Trim Options'];
          @$tt_3=$csvData['Size, Wattage & Lumen Options'];
          @$uu_3=$csvData['Mounting Kit'];
          @$vv_3=$csvData['Fixture Configuration'];
          @$ww_3=$csvData['Photo Cell'];
          @$xx_3=$csvData['Square Trims Ring Options'];
          @$yy_3=$csvData['Round Trim Ring Options'];
          @$zz_3=$csvData['Square Trim Ring Options'];
           @$aa_4=$csvData['Color'];
           @$bb_4=$csvData['Emergency Battery Options'];
           @$cc_4=$csvData['Color Te,mperature (CCT)'];
           @$dd_4=$csvData['Reflector Options'];
           @$ee_4=$csvData['Reflector'];
           @$ff_4=$csvData['Color Temperature'];
           @$gg_4=$csvData['Testing'];
           @$hh_4=$csvData['Trim Ring Options'];
           @$ii_4=$csvData['Finish Option'];
           @$jj_4=$csvData['Frosted Lens'];
          @$headers[]=array(@$id,@$parent, @$sku, @$pr, @$cp, @$sp, @$rp,@$mp,@$cp, @$a, @$b, @$c,@$d,@$e, @$f, @$g, @$h, @$i,  @$j, @$k,@$l,@$m,@$n,@$o,@$p,@$q,@$r,@$s, @$t,@$u, @$v,@$w,@$x, @$y, @$z,@$aa,@$bb,@$cc, @$dd,@$ee,@$ff,@$gg,@$hh,@$ii, @$jj,@$kk,@$ll,@$mm,@$nn,  @$oo, @$pp,@$qq,@$rr,@$ss, @$tt,@$uu,@$vv,@$ww,@$xx,@$yy, @$zz, @$aa_1, @$bb_1, @$cc_1, @$dd_1, @$ee_1, @$ff_1, @$gg_1, @$hh_1,@$ii_1, @$jj_1, @$kk_1, @$ll_1, @$mm_1,@$nn_1, @$oo_1, @$pp_1,  @$qq_1, @$rr_1, @$ss_1,@$tt_1, @$uu_1,@$vv_1,@$ww_1, @$xx_1, @$yy_1, @$zz_1,@$aa_2,@$bb_2, @$cc_2, @$dd_2, @$ee_2, @$ff_2,@$gg_2, @$hh_2, @$ii_2,@$jj_2,@$kk_2, @$ll_2, @$mm_2, @$nn_2, @$oo_2, @$pp_2,@$qq_2,  @$rr_2, @$ss_2, @$tt_2, @$uu_2, @$vv_2, @$ww_2, @$xx_2, @$yy_2, @$zz_2, @$aa_3, @$bb_3,@$cc_3,@$dd_3, @$ee_3, @$ff_3,@$gg_3, @$hh_3,@$ii_3, @$jj_3, @$kk_3, @$ll_3, @$mm_3, @$nn_3, @$oo_3, @$pp_3, @$qq_3, @$rr_3, @$ss_3, @$tt_3, @$uu_3, @$vv_3,  @$ww_3, @$xx_3, @$yy_3, @$zz_3,@$aa_4, @$bb_4, @$cc_4,@$dd_4, @$ee_4, @$ff_4, @$gg_4, @$hh_4, @$ii_4, @$jj_4,);
        }
        foreach($headers as $newData){
                fputcsv($fileOpen,$newData);
            }   
    ?>


        
  
                                                      