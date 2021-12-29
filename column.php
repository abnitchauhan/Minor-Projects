<?php 

$csv = 'data/pune.csv';

$file = fopen($csv, 'r');

while(($readcsv = fgetcsv($file)) !== FALSE)
{
    $data[] = $readcsv;  //Read the Data Rowise Initially
}
$headers = $data[0];
 
// Get The Variants Name 
$variant_names = array_slice($headers, 2);

array_shift($data);

for($i=0;$i<count($headers); $i++)
    {
        $columnwise[] = getColumn($data, $i); // Call the getColumn function   
    }

if(count($headers) == count($columnwise))
{
    $finalData = array_combine($headers, $columnwise);
}
// echo json_encode($finalData);
  
   
        // echo $finalData['Week'][$i];
        // echo "<br/>";
        foreach($variant_names as $variant) {
            for($i=0;$i<count($finalData['Week']);$i++)
            {
          $city_data[] =   [$finalData['Week'][$i],$finalData[$variant][$i]] ;
            }

            $final[] = array('name' => $variant, 'data' => $city_data);

        } 
    
     echo json_encode($final);
    // $final[] = [$variant,$city_data];

 
  // echo json_encode($final);

// Function To Read the Data Columwise
function getColumn($arr, $col)
{
    $column = [];
    for($i=0;$i<count($arr);$i++)
        {  
        $column[] = $arr[$i][$col]; 
        } 
    return $column;
}  
 



?>