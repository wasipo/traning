<?php

$array = array();

$input = trim(fgets(STDIN));
for($i = 0; $i < $input; $i++)
{
	$array[$i] = rand(0,4096);
}

foreach($array as $key => $val)
{

	if(empty($key))
	{
		echo '===========no sort================'.PHP_EOL;
	}
		echo $val.PHP_EOL;

}

for($j=0; $j < $input; $j++)
{

	for($k=$input-1; $k>$j; $k--)
	{
		if($array[$k-1] > $array[$k])
		{
			swap($array[$k],$array[$k-1]);
		}
	}

	if(empty($j))
	{
		echo '===========sort================'.PHP_EOL;
	}

	echo $array[$j].PHP_EOL;

}

function swap(&$x,&$y)
{
		$temp = $x;
		$x = $y;
		$y = $temp;
}

