
<form method="post">
	<input type="text" name="input">
	<input type="submit">
</form>
<?php
$input = $_POST["input"];
$week = array("日","月","火","水","木","金","土");
$weekno = date("w",strtotime($_POST["input"]));
$next = 7-$weekno;

(int)$i = $weekno;
$y = 0;

while(1)
{	

		if($i !== $weekno)
		{
			echo date("Y/m/d",strtotime("$input -$i day")); 
			$tmp = date("w",strtotime("$input -$i day"));
			echo $week[$tmp]."<br />";
		} else if($i == 0) { //0の無限ループ回避
			for($j=6; $j >= 0; $j--)
			{
					$tmp = date("w",strtotime("$input -$j day"));
					echo date("Y/m/d",strtotime("$input -$j day")).$week[$tmp]."<br />";
			}
			break;
		}

		if($i == 1)
		{
			while($y<=$next)
			{	
				echo date("Y/m/d",strtotime("$input $y day"));
				$tmp = date("w",strtotime("$input $y day"));
				echo $week[$tmp]."<Br />";
				$y++;
			}
			break;
		}
		$i--;
}
