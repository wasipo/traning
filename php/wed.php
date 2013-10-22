<?php

//ちょっとボロいけどこんな感じになりました。
echo "==========================第四水曜=============================".PHP_EOL;
//最終日取得
$meres = date("t");

//日付
$count = 1;
//週
$Wno = 0;

while($count <= $meres)
{
	//割り切れたらWnoが増える
	if($count%7 === 0) 
	{
			(int)$Wno++;
	}

	//3回Wnoがカウントアップしたら
	if($Wno === 3)
	{
		//その週の日付と曜日を出力
		foreach(range(1,12) as $mon)
		{
			$md = date("D",mktime(0,0,0,$mon,1,date("Y")));
			//月初めが木曜なら一週飛ばす
			if($md == "Thu")
			{
				$rcount = $count+7;
				$mi = date("Y/m/d D",mktime(0,0,0,$mon,$rcount,date("Y")));
			} else {
				$mi = date("Y/m/d D",mktime(0,0,0,$mon,$count,date("Y")));
			}
			//配列に分割
			$mi = explode(" ",$mi);
			//1番目にアクセス
			if($mi[1] === "Wed")
			{	
					echo $mi[0]." ".$mi[1].PHP_EOL;
			}
		}

	}

	$count++;
}

echo "=====================第四週水曜==========================".PHP_EOL;

$mr = array();

for($i=1; $i<13; $i++)
{
	$md = date("Ymd w",mktime(0,0,0,$i,1,date("Y")));
	$mi = explode(" ",$md);

	$Wno = 3;
	$mr[$i] = (4-$mi[1])+7*$Wno;

	$mt = date("Y/m/d D",mktime(0,0,0,$i,$mr[$i],date("Y")));
	echo $mt.PHP_EOL;
}

echo "=====================第四週水曜==========================".PHP_EOL;


$year = 2013;
$target = 3; // = 水曜日

for( $month = 1; $month < 13; $month++ ) {

$time = mktime( 0, 0, 0, $month, 1, $year );
$w = date( "w", $time );

$adjust = $target - $w;

$result = 22 + $adjust;

echo $year ."年". $month ."月の第４週の水曜日は". $result ."日です。<br />\n";
}
