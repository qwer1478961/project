<html>
<body>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	echo'<a href="logout.php">登出</a><br><br>';
	if($_SESSION['UserID']!=NULL){
		echo'<a href="csvget.php">檔案匯入</a>	';
		echo'<a href="update.php">修改</a>	';
		echo'<a href="delete.php">刪除</a>	<br><br>';
		$dsn = "mysql:host=localhost;dbname=test";
		$db = new PDO($dsn, 'root', '');
		$rs=$db->query("SELECT * FROM user_data");
		echo "<table><tr>";
		echo "</tr>";
		echo "<td>";
		echo '學號';
		echo "</td>";
		echo "<td>";
		echo '密碼';
		echo "</td>";
		echo "<td>";
		echo '班級';
		echo "</td>";
		echo "<td>";
		echo '姓名';
		echo "</td>";
		echo "<td>";
		echo '點數';
		echo "</td>";
		echo "</tr>";
		$num = $rs->rowCount();
		for($i=1;$i<=$num;$i++){
			$rs=$db->query("SELECT * FROM user_data WHERE SN='$i'");
			$row=$rs->fetch();
			echo "</tr>";
			echo "<td>";
			echo $row['UserID'];
			echo "</td>";
			echo "<td>";
			echo $row['Passwd'];
			echo "</td>";
			echo "<td>";
			echo $row['Class'];
			echo "</td>";
			echo "<td>";
			echo $row['Name'];
			echo "</td>";
			echo "<td>";
			echo $row['Point'];
			echo "</td>";
			echo "</tr>";
		}
		echo "</table></tr>";
		
	}
	else{
		echo"您無權限觀看此頁";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
	}
	
?>
</body>
</html>