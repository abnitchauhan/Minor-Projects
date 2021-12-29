<?php 
 $file = "data/Pune.csv";
 $final = setJson($file); 

 $headers = $final[0];

 $date = $headers[0];


 $variant_names = array_slice($headers,2);

 // echo json_encode($variant_names) ; 
 array_shift($final);

 
 foreach($final as $values)
 {
    // $dates[] = $values[0];
    
    if(count($headers) == count($values))
    {
     $combined[] =  array_combine($headers, $values);
    }
 } 

foreach($combined as $total)
{
    
}

 echo json_encode(count($combined));
 
// echo "Dates: " . json_encode($dates);
// echo "<br/>";
 



 // echo json_encode(($combined));
//  $date = [];
// foreach($combined as $total)
// { 
//    $newDate[] = array_push($date, $total['Week']);
//  foreach ($variant_names as $variants) 
//  {
//     //echo json_encode($total[$variants]);  
//     // $checkFinal[] = array("name" => $variants, "data" =>[$dates, $combined[$variants]]);
//  }
// }
// echo json_encode($newDate);

 // echo json_encode($checkFinal);

 // echo json_encode($combined);
// $finalData = [];
//  foreach($combined as $totalData)
//  {
//     foreach($variant_names as $variants)
//     {
//         $list = array_push($finalData, $totalData[$variants]);
//     }
//  }
//  echo json_encode($list);

// for($i=0;$i< count($combined);$i++)
// { 
// foreach($variant_names as $variant)
// {
//     // echo json_encode($variants);
//    $finalData[] = $combined[$i][$variant]; 
// }    
// }

// echo json_encode($finalData);


 // echo json_encode($combined);
 

// Read CSV to JSON
function setJson($filename)
{ 
    $csv= file_get_contents($filename);
    $data = array_map("str_getcsv", explode("\n", $csv)); 
    return ($data);
}

