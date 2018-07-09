<html>
<body>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	echo"<form name='form' method='post' action='pctrl_per_finish.php'>";
	for($i=1;$i<=9;$i++){
		echo"<input type='checkbox' name='num[]' value=$i>&nbsp;&nbsp$i";
		if($i%8==0){
			echo"<br>";
		}
	}
	for($i=10;$i<=16;$i++){
		echo"<input type='checkbox' name='num[]' value=$i>$i";
		}
	echo"<br>";
	for($i=17;$i<=24;$i++){
		echo"<input type='checkbox' name='num[]' value=$i>$i";
		}
	echo"<br>";
	for($i=25;$i<=32;$i++){
		echo"<input type='checkbox' name='num[]' value=$i>$i";
		}
	echo"<br>";
	for($i=33;$i<=40;$i++){
		echo"<input type='checkbox' name='num[]' value=$i>$i";
		}
	echo"<br>";
	$dsn = "mysql:host=localhost;dbname=test";
	$db = new PDO($dsn, 'root', '');
	$result=$db->query("SELECT * FROM select_op");
	echo"<select name='item'>";
	
	while($row=$result->fetch()){
		$op=$row['Item'];
		echo"<option value=$op>$op</option>";
	}
	echo"<option value=else>其他</option>";
	echo"</select><br><br>";
	echo"加扣分:<input type='text' name='point'/><br><br>";
	echo"<input type='submit' name='button' value=確認><br>";
	echo"</form>";
	echo"<a href='pointctrl.php'>返回</a><br><br>";
	
?>
</body>
</html>