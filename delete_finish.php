<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$id = $_POST['id'];
	$dsn = "mysql:host=localhost;dbname=test";
	$db = new PDO($dsn, 'root', '');
	$sql=$db->query("DELETE FROM user_data WHERE UserID='$id'");
	$sql=$db->query("SELECT * FROM user_data WHERE UserID='$id'");
	$row=$sql->fetch();
	if($_SESSION['UserID'] != NULL){
		if(!$row){
                echo '刪除成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
		}
        else{
                echo '刪除失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
        }
	}
	else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
	}
?>