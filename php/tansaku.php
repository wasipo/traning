<?php

$source = array();

do{

	if($input === "y")
	{
			$rows = explode("\n", $source);
			break;
	} else {
			
			$tmp = array();
			$source[] = $input;	
	}

} while($input = trim(fgets(STDIN)));



foreach($source as $val)
{
		echo $val;
}

