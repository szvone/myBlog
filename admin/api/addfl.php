<?php
	session_start();
	
	//读取指定记录数
	if (!isset($_SESSION['user'])) {
		echo "404";
		return;
	}

require_once('../../api/conf/db.php');
	$cx = "INSERT INTO `$dbname`.`fl` (`id`, `name`, `date`) VALUES (NULL, '".$_POST['flname']."', '".time()."');";

	//echo $cx;
	$jg = mysql_query($cx);
	echo "200";


	



?>