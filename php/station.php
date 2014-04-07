<?php

$input = trim(fgets(STDIN));
$from = explode(" ",$input);
list($n,$m) = $from;

$tmp = array();
for($i=1; $i<=$n; $i++)
{
	 fscanf(STDIN,"%d",$tmp[$i]);
}

$result = array();
for($i=0; $i<$m; $i++)
{
	$o=0;$p=0;
	$input = trim(fgets(STDIN));
	$to = explode(" ",$input);
	list($o,$p) = $to;
	
	$res = array();
	$num = 0;
	while($o<=$p)
	{
		$num++;
		$res[$num] = $tmp[$o];
		$result[$i] = array_sum($res);
		$o++;
	}
}

foreach($result as $val)
{
	echo $val.PHP_EOL;
}
