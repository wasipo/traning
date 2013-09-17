<?php

$array = array();

$input = trim(fgets(STDIN));
for($i = 0; $i < $input; $i++)
{
	$array[$i] = rand(0,40);
}


foreach($array as $key => $val)
{

	if(empty($key))
	{
		echo '===========no sort================'.PHP_EOL;
	} else {
		echo $val.PHP_EOL;
	}

}

for($j=0; $j < $input; $j++)
{
	for($k=$input-1; $k>$j; $k--)
	{ 
		if($array[$k-1] > $array[$k])
		{
			$tmp = $array[$k];
			$array[$k] = $array[$k-1];
			$array[$k-1] = $tmp;
		}
	}
}


foreach($array as $key => $val)
{
	if(empty($key))
	{
		echo '===========bubble sort================'.PHP_EOL;
	} else {
		echo $val.PHP_EOL;
	}
}


