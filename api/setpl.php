<?php
	session_start();
	require_once('conf/db.php');

	$ip = $_SERVER["REMOTE_ADDR"];

	$cx = "INSERT INTO `$dbname`.`pl` (`id`, `name`, `mail`, `web`, `nr`, `date`, `ip`, `wzid`, `type`) VALUES (NULL, '".$_POST['name']."', '".$_POST['mail']."', '".$_POST['web']."', '".$_POST['nr']."', '".time()."', '$ip', '".$_POST['wzid']."', '0');";
	//echo $cx;
	$jg = mysql_query($cx);
	



?>