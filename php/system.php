
<form method="post">
	日にち<input type="text" name="input_date">
	何ヵ月後<input type="text" name="input_month">
	区分<input type="text" name="input_kubun">
	<input type="submit">
</form>
<?php
$inputdate = $_POST["input_date"];
$inputmonth = $_POST["input_month"];
$inputkubun = $_POST["input_kubun"];
$week = array("日","月","火","水","木","金","土");

//何ヶ月後のunixタイムスタンプ取得
//取得後、年、月、日を別々の変数に保存
//そこから日付のフォーマットxxxx/xx/xxを作成
$add_date = strtotime("+$inputmonth month",strtotime($inputdate));
$year = date("Y",$add_date);
$month = date("m",$add_date);
$day = date("d",$add_date);
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

