<?php

$handle = file_get_contents("res.txt","r"); //リソース読み込み
$tmp = array(); //一時代入するための配列
$rows = explode("\n", $handle); //リソースから行毎に配列作成

foreach($rows as $row)
{
echo $row.'<br />'.PHP_EOL;
			$tmp[] = str_split($row); //リソースの行で配列をつくり1文字ずつ分割してtmpに代入
}

$size['y'] = count($tmp); //縦軸の数
$size['x'] = count($tmp[0]); //横軸の数

for($y=0; $y<$size['y']; $y++) //縦軸分回す
{
		for($x=0; $x<$size['x']; $x++) //縦軸分の数だけ横軸分回す
		{
				$map[$y][$x] = array('x' => $x, 'y' => $y, 'type' => $tmp[$y][$x]); //y行目のx文字目の情報を配列で入れる
				if($tmp[$y][$x] === 'S') //スタートの場所をtmp配列から探す
				{
					$start =& $map[$y][$x]; //見つかったら$startに参照で突っ込む
					$start['dist'] = 0; //配列に置き換えて、初期位置を設定
				}
				if($tmp[$y][$x] === 'G') //ゴールの場所をtmp配列から探す
				{
					$goal =& $map[$y][$x]; //見つかったら$goalに参照で突っ込む
				}
		}
}

$directions = array(
	array('x' => 0, 'y' => 1,),
	array('x' => 1, 'y' => 0,),
	array('x' => 0, 'y' => -1,),
	array('x' => -1, 'y' => 0,),
);

$queue = array($start);

while(1) //馬鹿ループ
{

		$cur =& array_shift($queue); //添字を外す
		if($cur['type'] === 'G') break; //ゴールで馬鹿ループ解除
		
		foreach($directions as $direction)
		{
			$dx = $cur['x'] + $direction['x'];
			$dy = $cur['y'] + $direction['y'];
			$new =& $map[$dy][$dx];
			if($new['type'] !== '*')
			{
				if(is_null($new['dist']))
				{
					$new['dist'] = $cur['dist'] + 1;
					array_push($queue, $new);
				}
			}

		}
}

$cur =& $goal;
while($cur['type'] !== 'S')
{

		if($cur['type'] === ' ') $cur['type'] = '$';

		foreach($directions as $direction)
		{
				$dx = $cur['x'] + $direction['x'];
				$dy = $cur['y'] + $direction['y'];
				$new =& $map[$dy][$dx];
				if($new['dist'] === $cur['dist']-1)
				{	
					$cur =& $new;
					break;
				}
		}
}


$str = '';

for($y=0; $y<=$size['y']; $y++)
{
		for($x=0; $x<=$size['x']; $x++)
		{
			 echo $map[$y][$x]['type'];
		}
		echo "<Br />".PHP_EOL;
}
