<?php session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$dsn = "mysql:host=localhost;dbname=test";
    $db = new PDO($dsn, 'root', '');
	$id = $_POST['UserID'];
	$pw = $_POST['Passwd'];
	$sql=$db->query("SELECT *FROM user_data WHERE UserID='$id'");
	$row = $sql->fetch();
	
	if($row){
		if($pw===$row['Passwd']){
			$_SESSION['UserID'] =$id;
			echo"<span>登入成功</span>";
			 echo '<meta http-equiv=REFRESH CONTENT=1;url=main.php>';
		}
		else{
			echo"<span>密碼錯誤</span>";
			echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
		}
	}
	else{
		echo"<span>使用者不存在</span>";
	}