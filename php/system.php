
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


$add_date = strtotime("+$inputmonth month",strtotime($inputdate));
$year = date("Y",$add_date);
$month = date("m",$add_date);
$day = date("d",$add_date);
$firstday = $year."/".$month."/01";
$inputdate = $year."/".$month."/".$day;

if($inputkubun == "1")
{
		echo date("Y/m/d",strtotime("$inputdate -1 day"));
} else if($inputkubun == "0") {
		$tmp = date("Y/m/d",strtotime("$firstday +1 month"));
		echo date("Y/m/d",strtotime("$tmp -1 day"));
} else {
	echo "区分の入力がないです";
}

