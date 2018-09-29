<?php

	require_once('../../api/conf/db.php');
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$key = md5($user.$pass);

	$cx = "select * from setting where `key`='login'";
	$jg = mysql_query($cx);
	$row = @mysql_fetch_array($jg);
	if ($row['vlaue']==$key) {
		//echo "200";
		echo "admin-index.html";
		session_start();
		$_SESSION['user']=$user;
	}else{
		echo "400";
	}

	

?>