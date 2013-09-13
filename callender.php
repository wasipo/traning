<?php

echo "月を入力してください。 >> ";

do{	
				
		$line = trim(fgets(STDIN));

		if($line === "y")
		{
					break;
		} else {
			
				intval($line);
				$now = mktime(0,0,0, $line,1,date("Y"));
				$month = date("t", $now);

				for($i = 1; $i  <= $month; $i++)
				{

						if(!empty($i) && $i%10==0)
						{
								if($i <= 10)
								{
										echo "   ".$i."   ";
								} else {
										echo " " .$i." ";
								}
										echo PHP_EOL;
						 } else if(!empty($i) && preg_match('/\d{1}/', $i)) {
										echo "   ".$i."   ";
						 } else {
										echo " " .$i." ";	
						 }
									
									if($i == $month)
									{
											echo PHP_EOL;
											echo PHP_EOL;
											echo date("Y")."年".$line."月の日数を表示しました。".PHP_EOL;
											echo "yで終了します。 >> ";
									}
									
					}


			}

}	while(!feof(STDIN));



