<?php
$csvData=[];
$in=fopen(__DIR__.'/csvupload/Product.csv','r');
$outputFile = 'chunked_file';
$splitSize = 10000;
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
        $fileName = __DIR__.'/file_chunk/'.$outputFile.$fileCount.".csv";
        $out = fopen($fileName, 'w');
    }
    $data = fgetcsv($in);
    if($rowData == 0) {
        $herderData=($data);
        fputcsv($out,$herderData);
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