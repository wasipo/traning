<?php
// php 5.4.4

while (($buffer = fgets(STDIN, 4096)) !== false) 
{
    $str = $buffer;
}

$array = explode(' ',$str);
$result = array_count_values($array);

foreach($result as $key => $val)
{
    echo $key.' '.$val.PHP_EOL;
}
