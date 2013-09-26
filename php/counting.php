<?php

$ar = array(7,2,4,56,7,2,87,67,89,3);
$count = array();
foreach($ar as $v)
{
	$count[$v] = isset($count[$v]) ? $count[$v] + 1 : 1;
}

$sorted = array();
$min = min($ar);
$max = max($ar);

for($i = $min; $i < $max; $i++)
{
		if(isset($count[$i]))
		{
			for($j = 0; $j < $count[$j]; $j++)
			{
					$sorted[] = $i;
			}
		}
}

foreach($sorted as $val)
{
	echo $val;
}
