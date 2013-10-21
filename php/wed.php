<?php

//ちょっとボロいけどこんな感じになりました。

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
			$mi = date("Y/m/d D",mktime(0,0,0,$mon,$count,date("Y")));
			//配列に分割
			$mi = explode(" ",$mi);
			//1番目にアクセス
			if($mi[1] === "Wed")
			{
	
					echo $mi[0].$mi[1]."　水曜見っけ".PHP_EOL;
			}
		}

	}

	$count++;
}



//やってみたけどできませんでした・・・。
//間違ってたら教えてください！


$mr = array();

for($i=0; $i<12; $i++)
{
	//1日の週番号取得
	$md = date("Ymd w",mktime(0,0,0,$i,1,date("Y")));
	//分割
	$mi = explode(" ",$md);
	//最初の週の曜日番号+21
	$mr[$i] = $mi[1]+21;
}

//日付取得。mktimeで日にちを21日足します。
for($i = 0; $i<12; $i++)
{
	$mt = date("Y/m/d D",mktime(0,0,0,$i,$mr[$i],date("Y")));
	echo $mt.PHP_EOL;
}



