<?php
$cities = ['Pune', 'Bengaluru', 'Hyderabad'];

foreach($cities as $city)
{
    $file = "data/$city.csv";
    $final = setJson($file); 
    $result_overall[] = array($city => $final); 
} 

echo json_encode($result_overall);

// Read CSV to JSON
function setJson($filename)
{ 
    $csv= file_get_contents($filename);
    $data = array_map("str_getcsv", explode("\n", $csv));
    // $json = array($data);
    return ($data);
}


 