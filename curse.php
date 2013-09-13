<?php


$random = array("あ","い","う","え","お","か","き","く","け","こ","た","ち","つ","て","と","な","に","ぬ","ね","の","は","ひ","ふ","へ","ほ","ま","み","む","め","も","や","ゆ","よ","ら","り","る","れ","ろ","わ","を","ん");
 
 while($input = fgets(STDIN))
 {
    $num = array();
	  $max_min = array(0,40);

		intval($input);
		
		for($i=0; $i < $input; $i++)
		{
			$num[$i] = rand($max_min[0],$max_min[1]);
 		}

 		for($j=0; $j < count($num); $j++)
 	  {
			echo $random[$num[$j]];
 		}
 }
