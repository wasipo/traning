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

$week = array("日","月","火","水","木","金","土");

//何ヶ月後のunixタイムスタンプ取得
//取得後、年、月、日を別々の変数に保存
//そこから日付のフォーマットxxxx/xx/xxを作成
//$add_date = strtotime("+$inputmonth month",strtotime($inputdate));

$inputdate = strtotime($inputdate);
$iYear = date('Y',$inputdate);
$iMonth = date('m',$inputdate);
$iDay = date('d',$inputdate);


function mkadd($y,$m,$d,$data)
{

	$CalcMonth = $data+$m;

	if($CalcMonth > 12)
	{
		$SetYear = ($CalcMonth / 12);
		$SetYear = round($SetYear,0,PHP_ROUND_HALF_DOWN);
		$SetYear = $y+$SetYear;
		$SetYear = intval($SetYear);
		$SetMonth = ($CalcMonth % 12);
		$confirmdate = $SetYear."/".$SetMonth."/".$d;

		if(!checkdate($SetMonth,$d,$SetYear))
		{
			$d = $d-1;
		}

		return mktime(0,0,0,$SetMonth,$d,$SetYear);
	} else {
		return mktime(0,0,0,$CalcMonth,$d,$y);
	}

}

$add_date = mkadd($iYear,$iMonth,$iDay,$inputmonth);
var_dump(date("Y-m-d",$add_date));
exit;



/*
$year = date("Y",$add_date);
$month = date("m",$add_date);
$day = date("d",$add_date);
$firstday = $year."/".$month."/01";
$inputdate = $year."/".$month."/".$day;
*/

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

