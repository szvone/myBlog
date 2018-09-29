<?php
	@session_start();
	require_once('conf/db.php');

	function getfl($id){
		$cx = "SELECT * FROM `fl` where id='".$id."'";
		//echo $cx;
		$jg = mysql_query($cx);

		$row = @mysql_fetch_array($jg);
		//print_r($row);
		return $row['name'];
	}



	$cx = "SELECT * FROM `wz` where id='".$_GET['id']."'";

	//echo $cx;
	$jg = mysql_query($cx);

	$row = @mysql_fetch_array($jg);
	$key ="";
	$arr = explode(",",$row['keyworld']);
	
	for ($i=0; $i < count($arr); $i++) { 
		$key.='<a href="#">'.$arr[$i].'</a> ,';
	}

	if ($row['hot']!=null) {
		$sql="UPDATE  `$dbname`.`wz` SET  `hot` =  '".($row['hot']+1)."' WHERE  `wz`.`id` =".$row['id'].";";
		mysql_query($sql);
	}

	$res = array('title' => $row['bt'], 'fl' =>getfl($row['fl']), 'zz' => $row['zz'], 'date' =>@date("Y-m-d", $row['date']), 'nr' => $row['nr'], 'key'=>$key, 'hot' => ($row['hot']+1), 'keyworld' => $row['keyworld'], 'zy' => $row['zy']);
	echo json_encode($res);
?>