<html>
<body>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	if($_SESSION['UserID']!=NULL){
		echo "<form name=\"form\" method=\"post\" >";
		
		echo'<a href="csvget.php">檔案匯入</a>	';
		echo'<a href="update.php">修改</a>	';
		echo'<a href="delete.php">刪除</a>	<br><br>';
		echo'<a href="main.php">返回</a><br><br>';
		
        echo "查詢學號：<input type=\"text\" name=\"id\"  /> <br>";
        echo "<input type=\"submit\" name=\"button\" value=\"確認\" /><br><br>";
        echo "</form>";
		if($_POST['id']!=""){
			$id=$_POST['id'];
		$dsn = "mysql:host=localhost;dbname=test";
		$db = new PDO($dsn, 'root', '');
		$sql=$db->query("SELECT * FROM `user_data` WHERE UserID='$id'");
		$row=$sql->fetch();
		echo "座號: ".$row['SeatN']."<br>"."姓名: ".$row['Name']."<br>"."密碼: ".$row['Passwd']."<br>";
		if($row['Admin']==2){
			echo"權限: 管理員<br>";
		}
		else if($row['Admin']==1){
			echo"權限: 老師<br>";
		}
		else{
			echo"權限: 學生<br>";
		}
		}
	}
	else{
		echo"您無權限觀看此頁";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
	}
	
?>
</body>
</html>