<?php
$ip="127.0.0.1";
$sqluser="root";
$sqlpass="root";
$dbname="blog";
header("Content-type: text/html; charset=utf-8");
$lj=@mysql_connect($ip,$sqluser,$sqlpass);
$db=@mysql_select_db($dbname);
mysql_query("set names 'utf8' ");
if($db){
}else{
	echo "数据库链接失败";
	return;
}
?>