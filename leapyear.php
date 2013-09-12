<?php

	$input = trim(fgets(STDIN));

	if($input%4 ===0)
	{
		echo $input." is Leap Year".PHP_EOL;
	} else if($input%100 == 0){
			if($input%100 !== 0)
			{
				echo $input."は閏年です。".PHP_EOL;
			}
	} else if($input%400 == 0) {
				echo $input."は閏年です".PHP_EOL;
	} else {
				echo $input."は閏年ではないです。".PHP_EOL;

  }

?>
