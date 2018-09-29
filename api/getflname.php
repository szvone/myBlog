<?php
	session_start();
	require_once('conf/db.php');

	//读取指定记录数

	$cx = "SELECT * FROM `fl` where id = ".$_GET['id'];
	//echo $cx;
	$jg = mysql_query($cx);

	$row = @mysql_fetch_array($jg);
	echo $row['name'];


?>