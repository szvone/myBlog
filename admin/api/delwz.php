<?php
	session_start();
require_once('../../api/conf/db.php');
	//读取指定记录数
	if (!isset($_SESSION['user'])) {
		echo "404";
		return;
	}


	$cx = "DELETE FROM `$dbname`.`wz` WHERE id = ".$_GET['id'];

	echo $cx;
	$jg = mysql_query($cx);
	echo "200";


	



?>