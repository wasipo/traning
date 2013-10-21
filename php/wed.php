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
		$mi = date("Y/m/d D",mktime(0,0,0,date("m"),$count,date("Y")));
		//配列に分割
		$mi = explode(" ",$mi);
		//1番目にアクセス
		if($mi[1] === "Wed")
		{
				echo $mi[0]."水曜見っけ".PHP_EOL;
		}
	}

	$count++;
}


//こんな感じで再現できませんでしたー！


//1日の週番号取得
$md = date("Ymd w",mktime(0,0,0,date("m"),1,date("Y")));
//分割
$mi = explode(" ",$md);
//最初の週の曜日番号+21
$mr = $mi[1]+21;
//日付取得。mktimeで日にちを21日足します。
$mt = date("Y/m/d D",mktime(0,0,0,date("m"),$mi[1]+21,date("Y")));

echo "今月は".$mt."が多分水曜日でござる".PHP_EOL;


