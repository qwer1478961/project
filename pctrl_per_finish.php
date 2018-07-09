<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	header("Content-Type:text/html; charset=utf-8");
	$dsn = "mysql:host=localhost;dbname=test";
	$db = new PDO($dsn, 'root', '');
	$num = $_POST ['num'];
	$point=$_POST['point'];
	$id=$_SESSION['UserID'];
	//echo $point;
	$item=$_POST['item'];
	//echo date('Y/m/d');
	for ($i=0;$i<=40;$i++){
		if (empty($num[$i])!=true){
			$result=$db->query("SELECT * FROM user_data WHERE SeatN=$num[$i]");
			$row=$result->fetch();
			//echo $row['Point']."<br>";
			$row['Point']+=$point;//計算
			$upoint=$row['Point'];
			$sn=$num[$i];
			$result=$db->query("UPDATE  user_data SET Point=$upoint WHERE SeatN=$sn");
			$result=$db->query("SELECT * FROM user_data WHERE SeatN=$sn");
			$row=$result->fetch();//接UID
			//echo $num[$i]."<br>";
			$date=date('Y/m/d');//日期函數
			$uid=$row['UserID'];
			$add=$db->query("INSERT INTO event_record(DATE,MID,UID,Item,Point) VALUES('$date','$id','$uid','$item','$point')");
			}
}
	echo"<meta http-equiv=REFRESH CONTENT=2;url=pctrl_per.php>";
?>