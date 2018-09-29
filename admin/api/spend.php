<?php
	session_start();
	
	//读取指定记录数
	if (!isset($_SESSION['user'])) {
		echo "404";
		return;
	}
	require_once('../../api/conf/db.php');
	
	$data = str_replace(" ","+",urldecode($_POST['nr']));
	$data = base64_decode($data);

	$nr=str_replace('img src="../images','img src="images',$data);
//echo $nr;
if (isset($_POST['id'])) {
	//$nr=preg_replace('<p><br></p>','',$nr);
	$sql = "delete from wz where id = ".$_POST['id'];
	mysql_query($sql);
	$id=$_POST['id'];
}else{
	$id="NULL";
}

	$cx = "INSERT INTO `$dbname`.`wz` VALUES (".$id.", '".$_POST['bt']."', '".$_POST['fl']."', '".$_POST['zy']."', '".mysql_real_escape_string($nr)."', '".time()."', '".$_SESSION['user']."', '0','".$_POST['keyworld']."');";

	//echo $cx;
	$jg = mysql_query($cx);
	echo "200";


	



?>