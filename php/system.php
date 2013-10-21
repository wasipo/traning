<!--
<form method="post">
	日にち<input type="text" name="input_date">
	何ヵ月後<input type="text" name="input_month">
	区分<input type="text" name="input_kubun">
	<input type="submit">
</form>
-->
<?php
/*
$inputdate = $_POST["input_date"];
$inputmonth = $_POST["input_month"];
$inputkubun = $_POST["input_kubun"];
*/

echo "日付を入力してください。>> ";
$inputdate = trim(fgets(STDIN));
echo "何ヵ月後かを入力してください >> ";
$inputmonth = trim(fgets(STDIN));
echo "指定月後の-1は(1)、指定月後の月末は(0)を入力してください >> ";
$inputkubun = trim(fgets(STDIN));


//入力値をunixタイムスタンプに変換
$inputdate = strtotime($inputdate);
//入力値を年、月、日に分離 
list($iYear,$iMonth,$iDay) = array(date('Y',$inputdate),date('m',$inputdate),date('d',$inputdate));


/*
* mkadd関数
* 年、月、日、何ヵ月後かを送る
* 入力値の計算処理をする
* unixタイムスタンプが戻る
*/

function mkadd($y,$m,$d,$data)
{
	/*
	*  $CalcMonth
	*　月と何ヵ月後かを足した値
	*/
	$CalcMonth = $data+$m;

	if($CalcMonth > 12)
	{

		/*
		*	$SetYear
		*	12以上だったら、12で割った値の小数点を省いた後、
		*	その数と入力された年度の値を足す。念のため最後にintにする
		*/

		$SetYear = ($CalcMonth / 12);
		$SetYear = round($SetYear,0,PHP_ROUND_HALF_DOWN);
		$SetYear = $y+$SetYear;
		$SetYear = intval($SetYear);
	
		/*
		* $SetMonth 
		* $CalcMonthを割った時の余りを月として扱う
		*/
		$SetMonth = ($CalcMonth % 12);
		$d = datechecker($SetYear,$SetMonth,$d);

		//計算結果のunixタイムスタンプを返す
		return mktime(0,0,0,$SetMonth,$d,$SetYear);
	} else {

		$d = datechecker($y,$CalcMonth,$d);	
		return mktime(0,0,0,$CalcMonth,$d,$y);
	}

}

/*
* datechecker関数
* 日付があるか無いかを判断して、入力値から条件に応じて数を引く
* 計算された日付が変える
*/


function datechecker($SetYear,$SetMonth,$d)
{

		if(empty($SetMonth)){$SetMonth = 12;}

		if(!checkdate($SetMonth,$d,$SetYear) && $SetMonth == "2") 
		{
				//日付が存在せず、2月だった場合にうるう年か判断する
				if($SetYear%4==0 && $SetYear%100 !==0 || $SetYear%400 == 0)
				{
						//検索された月がうるう年で入力された日付が31だった場合、2を引く、30だった場合１を引く
						if($d == 31){ $d = $d-2; } else if($d == 30){ $d = $d-1; }
						return $d;
				} else {
						if($d == 31){ $d = $d-3; } else if($d == 30){ $d = $d-2; }
						return $d;
				}
		} else if(!checkdate($SetMonth,$d,$SetYear)){
				$d = $d-1;
				return $d;
		} else {
				return $d;
		}

}

$add_date = mkadd($iYear,$iMonth,$iDay,$inputmonth);
list($year,$month,$day) = array(date('Y',$add_date),date('m',$add_date),date('d',$add_date));
$firstday = $year."/".$month."/01";
$inputdate = $year."/".$month."/".$day;


//区分の条件分岐
//1ならx月後の-1日0ならx月後の月末。

//1の場合
//x月後の-1日のタイムスタンプを日付フォーマットに変換後表示。

//0の場合
//$tmp = x月後の翌月1日のタイムスタンプを日付フォーマットで取得
//$tmpから-1日して、日付フォーマットに変換後表示。

if($inputkubun == "1")
{
		echo date("Y/m/d",strtotime("$inputdate -1 day"));
} else if($inputkubun == "0") {
		$tmp = date("Y/m/d",strtotime("$firstday +1 month"));
		echo date("Y/m/d",strtotime("$tmp -1 day"));
} else {
	echo "区分の入力がないです";
}

