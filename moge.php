<?php

$table = trim(fgets(STDIN));
$table_ar = explode(",",$table);

$table_colum = array();
$table_line = array();

intval($table_ar);

for($i = 1; $i <= $table_ar[0]; $i++)
{
	$table_line[$i] = trim(fgets(STDIN));
}

//var_dump($table_line);

$table_result = array();
for($n = 1; $n <= count($table_line); $n++)
{ 
	$table_result[$n] = explode(",",$table_line[$n]); 
}

foreach($table_result as $key => $val)
{
	foreach($table_result[$key] as $k => $v)
	{
		$num = $k+1;
		$table_result[$key][$num] = $v;
	}

	unset($table_result[$key][0]);

}

$serch_res = array();
for($j = 1; $j <= count($table_result); $j++)
{
	if(!empty($table_result[$j]))
	{
		for($k = 1; $k <= count($table_result); $k++)
		{
			$serch_res[$j][] = $table_result[$k][$j];
		}
	}
}

echo "検索値は？>>";
$serch = trim(fgets(STDIN));

var_dump($serch_res);

foreach($serch_res as $key => $val)
{
	foreach($val as $k => $v)
	{
		if($key !== 1)
		{
			if($serch == $v)
			{
				$flg = "ok";
				$cheat = $k+1;
				echo $key."-".$cheat.",";
			} 
		}
	}

}

if(empty($flg))
{
	echo "-1";
}



?>
