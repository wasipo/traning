
<form method="post">
	<input type="text" name="input">
	<input type="submit">
</form>
<?php
$input = $_POST["input"];
$week = array("日","月","火","水","木","金","土");
$weekno = date("w",strtotime($_POST["input"]));
$next = 7-$weekno;

$i = $weekno;
$y = 1;


while(1)
{	
		$days[-$i] = date("Y/m/d",strtotime("$input -$i day"));
//		$tmp = date("w",strtotime("$input -$i day"));
//		echo $week[$tmp]."<br />";
		if($i == 0)
		{
			while($y<$next)
			{
				$days[$y] = date("Y/m/d",strtotime("$input $y day"));
//				$tmp = date("w",strtotime("$input $y day"));
//				echo $week[$tmp]."<Br />";
				$y++;
			}
			break;
		}
		$i--;
}

$count = 0;
foreach($days as $key => $val)
{
		echo $val.$week[$count]."<Br />";
		$count++;
}
