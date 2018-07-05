<html>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	header("Content-Type:text/html; charset=utf-8");
	$nm=$_POST['Name'];
	$class=$_POST['Class'];
	$id=$_POST['UserID'];
	$pw=$_POST['Passwd'];
	$pw2=$_POST['Passwd2'];
	if(($nm!=NULL)&&($class!=NULL)&&($id!=NULL)&&($pw!=NULL)&&($pw2!=NULL)&&($pw=$pw2)){
		$dsn = "mysql:host=localhost;dbname=test";
		$db = new PDO($dsn, 'root', '');
		$result=$db->query("SELECT * FROM user_data");
		$num = $result->rowCount();
		$num+=1;
		$add=$db->query("INSERT INTO user_data(SN,UserID,Passwd,Class,Name) VALUES('$num','$id','$pw','$class','$nm')");
		$result=$db->query("SELECT * FROM user_data WHERE UserID='$id'");
		$row=$result->fetch();
		if($row){
			echo'新增成功';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
		}
		else{
			echo'新增失敗';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
		}
	}
?>
</html>
