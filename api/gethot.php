<?php
	session_start();
	require_once('conf/db.php');

	//读取指定记录数

	$cx = "SELECT * FROM `wz` ORDER BY hot DESC limit 5";
	//echo $cx;
	$jg = mysql_query($cx);

	$sc="";
	while ($row = @mysql_fetch_array($jg)) {
        echo '<li><a target="_blank" href="wz.html?id='.$row['id'].'">'.$row['bt'].'</a></li>';
	}



?>