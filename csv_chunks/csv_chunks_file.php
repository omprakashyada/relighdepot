<?php
$csvData=[];
$header=[];
$in=fopen(__DIR__.'/files/model_product_id-1-03-11-22.csv','r');
$outputFile = 'chunked_file';
$splitSize = 10;
$rows = 0;
$rowData=0;
$fileCount = 0;
$out = null;
while (!feof($in)) {
    if (($rows % $splitSize)==0) {
        if ($rows > 0) {
           fclose($out);
        }
        $fileCount++;
        $fileName = __DIR__.'/export/'.$outputFile.$fileCount.".csv";
        $out = fopen($fileName,'w');
    }
    $data=fgetcsv($in);
    if($rowData == 0) {
        $rowData++; 
    } else {
        if($data) {
            fputcsv($out,$data);
        }
        $rows++;
    }
}
fclose($out);


?>