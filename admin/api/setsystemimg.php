<?php
session_start();
if (!isset($_SESSION['user'])) {
		echo "404";
		return;
	}
header("Content-type: text/html; charset=utf-8");
function get_extension($file)
{
return pathinfo($file, PATHINFO_EXTENSION);
}
if ($_GET['type']==1) {	//更新网站logo
	$str = get_extension($_FILES["file"]["name"]);
	if ($str!="png") {
		echo "<script> alert(\"抱歉，logo必须为png格式的图片，请重新上传！\"); </script>";
		header('Refresh: 0; url=../admin-setting.html');
		return;
	}
	$mm="../../assets/i/favicon.png";
	move_uploaded_file($_FILES["file"]["tmp_name"],$mm);
}else{
	$str = get_extension($_FILES["file"]["name"]);
	if ($str!="jpg") {
		echo "<script> alert(\"抱歉，主页logo必须为jpg格式的图片，请重新上传！\"); </script>";
		header('Refresh: 0; url=../admin-setting.html');
		return;
	}
	$mm="../../assets/i/title.jpg";
	move_uploaded_file($_FILES["file"]["tmp_name"],$mm);
}

echo "<script> alert(\"保存成功！\"); </script>";
header('Refresh: 0; url=../admin-setting.html');
return;
?>