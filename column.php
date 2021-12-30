<?php 



$cities = ['Pune', 'Bengaluru', 'Hyderabad'];


foreach($cities as $city)
{
    $city_data[] = getData($city);

    $allCity[] = array($city => $city_data);
}

echo json_encode($allCity);


function getData($city)
{
    global $combined;

 $csv = "data/$city.csv";
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
        
foreach($variant_names as $variant)
    {
    // echo json_encode(array_sum($finalData[$variant]));
        $pieData[] = array('name' => $variant, 'y' => array_sum($finalData[$variant]));
    }
         
        $dates = $columnwise[0]; 
        $variant_data = array_slice($columnwise, 2); 
        for($i=0;$i<count($variant_data);$i++)
        {
            $combined[] = [$dates,$variant_data[$i]];  
        }

      $combined_count = count($combined); 

for($i=0; $i<count($combined); $i++)
         {
            $bar_chart[] = array('name' =>$variant_names[$i], 'data'=> setData($i)); // Chart Data for Bar Graph
         }

         $total_array[]  = array('pie' => $pieData, 'bar' => $bar_chart);

         return $total_array;
}

 function setData($times)
 {
    global $combined;
    for($i=0; $i<count($combined[0][0]); $i++)
    {
       $data_check[] = [$combined[$times][0][$i], intval($combined[$times][1][$i])];

    }
    $data = $data_check; 
   return $data;
 }     

  
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