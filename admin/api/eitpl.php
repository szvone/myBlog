<?php
	session_start();
	require_once('../../api/conf/db.php');

	//读取指定记录数
	if (!isset($_SESSION['user'])) {
		echo "404";
		return;
	}

	if ($_GET['type']==1) {
		$cx = "DELETE FROM `$dbname`.`pl` WHERE id = ".$_GET['id'];

		echo $cx;
		$jg = mysql_query($cx);
		echo "200";
	}else{
		$cx = "UPDATE  `$dbname`.`pl` SET  `type` =  '1' WHERE  `pl`.`id` =".$_GET['id'];

		//echo $cx;
		$jg = mysql_query($cx);
		echo "200";

	}
	


	



?>