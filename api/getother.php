<?php
	@session_start();
	
	require_once('conf/db.php');
	

	$cx = "SELECT * FROM `setting`";
	//echo $cx;
	$jg = mysql_query($cx);


	while ($row = @mysql_fetch_array($jg)) {
		//print_r($row);
		if ($row['key']=="about") {
			$about=$row['vlaue'];
		}
		if ($row['key']=="github") {
			$github=$row['vlaue'];
		}
		if ($row['key']=="qq") {
			$qq=$row['vlaue'];
		}
		if ($row['key']=="foot") {
			$foot=$row['vlaue'];
		}
		if ($row['key']=="title") {
			$title=$row['vlaue'];
		}
	}
	$res = array('about' => $about, 'qq' => $qq,'github' => $github,'foot' => $foot,'title' => $title);
	
	echo json_encode($res);

?>