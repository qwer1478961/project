<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	if($_SESSION['UserID']!=NULL){
		/*$dsn = "mysql:host=localhost;dbname=test";
		$db = new PDO($dsn, 'root', '');*/
		$id=$_SESSION['UserID'];
		/*$sql=$db->query("SELECT *FROM user_data WHERE UserID='$id'");
		$row = $sql->fetch();*/
		echo "<form name=\"form\" method=\"post\" action=\"update_finish.php\">";
		echo "帳號:<input type=\"text\" name=\"UserID\" value=\"$id\"/><br>";
		echo "新密碼:<input type=\"password\" name=\"Passwd\" /><br>";
		echo "輸入新密碼:<input type=\"password\" name=\"Passwd2\" /><br>";
		echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
		echo "</form>";
	}
	else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>