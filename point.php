<html>
<body>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	echo'<a href="main.php">返回</a><br><br>';
	echo'<a href="pointctrl.php">加扣分</a><br><br>';
	$dsn = "mysql:host=localhost;dbname=test";
	$db = new PDO($dsn, 'root', '');
	$id=$_SESSION['UserID'];
	echo"<table >";
	$result=$db->query("SELECT Point FROM user_data WHERE UserID=$id ");
	$row=$result->fetch();
	echo"持有點數:  ".$row['Point']."<br>";
	$result=$db->query("SELECT Name,Point FROM user_data ORDER BY Point DESC");
	echo"<tr><td>名次</td><td>姓名</td><td>點數</td></tr>";
	$i=1;
	while(($row=$result->fetch())&&($i<=10)){
		echo "<tr><td>".$i."</td><td>".$row['Name']."</td><td>".$row['Point']."</td></tr>";
		$i++;
	}	
	echo"</table>";
?>
	
</body>
</html>