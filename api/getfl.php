<?php
	session_start();
	require_once('conf/db.php');

	//读取指定记录数

	$cx = "SELECT * FROM `fl`";
	//echo $cx;
	$jg = mysql_query($cx);

	while ($row = @mysql_fetch_array($jg)) {
        echo '<a target="_blank" href="index.html?key='.$row['id'].'&type=fl"  class="blog-tag">'.$row['name'].'</a>';
	}



?>