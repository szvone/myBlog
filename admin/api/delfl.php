<?php
	session_start();
	
	//$_SESSION['user']="vone";
	//读取指定记录数
	if (!isset($_SESSION['user'])) {
		echo "404";
		return;
	}
require_once('../../api/conf/db.php');

	$cx = "DELETE FROM `$dbname`.`fl` WHERE id = '".$_POST['id']."'";

	//echo $cx;
	$jg = mysql_query($cx);
	echo "200";


	



?>