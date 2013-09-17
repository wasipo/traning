<?php

$int = trim(fgets(STDIN));
$random_int = array();

for($i = 0; $i < $int; $i++)
{
		$random_int[$i] = $i;
}

$size = count($random_int);
$search = trim(fgets(STDIN));

for($j = 0; $j < $size; $j++)
{
		if($random_int[$j] == $search)
		{
				echo $j;
		}
}
