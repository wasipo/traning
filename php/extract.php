<?php

echo "平方根を計算します。  >>";
$input = trim(fgets(STDIN));
intval($input);

$boo = sqrt($input);


 if($input <= 0)
 {
		return false;
 } else if($input > 0) {
		$i = $input;
 } else {
		$i = 1;
 }

 do
 {
   $e = $i;
	 $i = ($input / $i + $i) * 0.5;
 } while ($i < $e);


echo $e.PHP_EOL;
echo $boo.PHP_EOL;


?>
