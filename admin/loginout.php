<?php
header("Content-type: text/html; charset=utf-8");
session_start();
$_SESSION['user']="";
echo "<script> alert(\"退出成功！\"); </script>";
header('Refresh: 0; url=../index.html');
?>