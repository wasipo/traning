<?php

echo "数字を入れてね >>";

$num = trim(fgets(STDIN));
intval($num);
$count = 0;


for($i = 0; $i < $num; $i++)
{

	if(!empty($i) && $i !== 1)
	{
		if($num % $i == 0)
		{
			echo $i."で割り切れました。".PHP_EOL;
			$count++;
		}
	}

}

if(empty($count))
{
    echo "これ素数っすわ。".PHP_EOL;
} else {
		echo PHP_EOL.$count."回割り切りました".PHP_EOL;
}
