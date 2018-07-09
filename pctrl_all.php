<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$sport=$_POST['sport'];
	$myallsport = implode (',', $sport);
	echo $myallsport;
?>