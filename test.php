<?php

$a = ['a','b','c','d'];
$b = [1,2,3,4];

if (count($a) == count($b))
{
	for($i=0;$i<count($a);$i++)

		$c[] = [$a[$i], $b[$i]];
}

echo json_encode($c);