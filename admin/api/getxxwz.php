<?php
	session_start();
	
	//读取指定记录数
	if (!isset($_SESSION['user'])) {
		echo "404";
		return;
	}
	require_once('../../api/conf/db.php');

	$cx = "SELECT * FROM `wz` where id='".$_GET['id']."'";

	//echo $cx;
	$jg = mysql_query($cx);

	$row = @mysql_fetch_array($jg);

$nr=str_replace('img src="images','img src="../images',$row['nr']);

	$res = array('title' => $row['bt'], 'fl' =>$row['fl'], 'nr' => $nr, 'keyworld' => $row['keyworld'], 'zy' => $row['zy']);
	echo json_encode($res);
?>