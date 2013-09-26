<?php


	echo "数字をいれてください。 >>";
	$input = trim(fgets(STDIN));


	if($input%4 == 0 && $input%100 !==0 || $input%400 == 0)
	{
				echo $input."は閏年です。".PHP_EOL;
	} else {
				echo $input."は閏年ではないです。".PHP_EOL;
  }

?>
