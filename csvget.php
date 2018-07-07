<?php
	echo "<form name=\"form\" method=\"post\" >";
        echo "要匯入的檔案：<input type=\"text\" name=\"file\" /> <br>";
        echo "<input type=\"submit\" name=\"button\" value=\"確認\" />";
        echo "</form>";


//-----------------------UTF8_CSV檔轉換函示----------------------------------------
	function __fgetcsv(&$handle, $length = null, $d = ",", $e = '"') {
	$d = preg_quote($d);
	$e = preg_quote($e);
	$_line = "";
	$eof=false;
	while ($eof != true) {
		$_line .= (empty ($length) ? fgets($handle) : fgets($handle, $length));
		$itemcnt = preg_match_all('/' . $e . '/', $_line, $dummy);
		if ($itemcnt % 2 == 0){
		$eof = true;
		}
	}
	$_line = iconv("big5","utf-8//ignore",addslashes($_line));

	$_csv_line = preg_replace('/(?: |[ ])?$/', $d, trim($_line));
 
	$_csv_pattern = '/(' . $e . '[^' . $e . ']*(?:' . $e . $e . '[^' . $e . ']*)*' . $e . '|[^' . $d . ']*)' . $d . '/';
	preg_match_all($_csv_pattern, $_csv_line, $_csv_matches);
	$_csv_data = $_csv_matches[1];
 
	for ($_csv_i = 0; $_csv_i < count($_csv_data); $_csv_i++) {
	$_csv_data[$_csv_i] = preg_replace("/^" . $e . "(.*)" . $e . "$/s", "$1", $_csv_data[$_csv_i]);
	$_csv_data[$_csv_i] = str_replace($e . $e, $e, $_csv_data[$_csv_i]);
  
	}

	return empty ($_line) ? false : $_csv_data;
	}
	//-------------------------------------------------------------------------
	header("Content-Type:text/html; charset=utf-8");
	$dsn = "mysql:host=localhost;dbname=test";
	$db = new PDO($dsn, 'root', '');
	setlocale(LC_ALL,"zh_TW.UTF8");//設定存取語系
	
	$dbname="abc.csv";//想匯入的檔案
	
	$fp=fopen($dbname,"r");
	$size=filesize($dbname)+1;
	$result=$db->query("SELECT * FROM user_data");
	$num = $result->rowCount();
	$num+=1;
	while($temp=__fgetcsv($fp,$size,",")){
		$sql=$db->query("SET NAMES UTF8");
		$rs=$db->query("INSERT INTO user_data(SN,UserID,Passwd,Class,Name) 
		VALUES('$num','$temp[0]','$temp[1]','$temp[2]','$temp[3]')");	
		
	}
	fclose($fp);
?>
