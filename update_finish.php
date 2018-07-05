<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$id=$_POST['UserID'];
	$pw=$_POST['Passwd'];
	$pw2=$_POST['Passwd2'];
	$dsn = "mysql:host=localhost;dbname=test";
    $db = new PDO($dsn, 'root', '');
	if($_SESSION['UserID'] != null && $pw != null && $pw2 != null && $pw == $pw2){
		$id = $_SESSION['UserID'];
		$sql=$db->query("UPDATE  user_data SET Passwd='$pw' WHERE UserID='$id'");
		$sql=$db->query("SELECT * FROM user_data WHERE Passwd='$pw'");
		$row=$sql->fetch();
		if($row){
			echo '修改成功!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
		}
		else{
			echo '修改失敗!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
		}
	}
	else{
		echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
	}
?>