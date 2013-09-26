<?php

$num = trim(fgets(STDIN));

for($i = 0; $i < $num; $i++)
{
		if(!empty($i) && $i%3==0)
		{
			echo " Fizz ";
		} else if(!empty($i) && $i%5==0) {
			echo " Buzz ";
		} else if(!empty($i) && $i%3==0 && $i%5==0){
			echo " FizzBuzz ";
		} else {
			echo $i;
		}
}


?>
