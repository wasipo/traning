<?php

$s_array = array("undefined","2-3","2-2","2-1","sum","undefined","1-7","1-6","1-5","1-4","sum","undefined","0-11","0-10","0-9","0-8","sum");

$i = 0;
$cnt = 0;
$a = array();
$c = 0;

while(!empty($s_array[$i]))
{
	if($s_array[$i] == "undefined")
	{
		$tmp=0;
		for($j=$i; $j < count($s_array); $j++)
		{
			if($s_array[$j] == "undefined" && $tmp === 1)
			{	
				break;	
			} else if($s_array[$j] !== "undefined") {
				$a[$cnt][$c] = $s_array[$j];	
				$c++;
			} else {	
				$tmp++;
			}
		}
		$cnt++;
	}
	$i++;
}


for($i = 0; $i < count($a); $i++)
{
		array_multisort($a[$i],SORT_NUMERIC);
}

var_dump($a);
