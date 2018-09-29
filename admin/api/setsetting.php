<?php
	@session_start();
	if (!isset($_SESSION['user'])) {
		echo "404";
		return;
	}
	require_once('../../api/conf/db.php');
	

	$sql="UPDATE  `$dbname`.`setting` SET  `vlaue` =  '".$_POST['qq']."' WHERE  `setting`.`key` ='qq';";
	mysql_query($sql);

	$sql="UPDATE  `$dbname`.`setting` SET  `vlaue` =  '".$_POST['about']."' WHERE  `setting`.`key` ='about';";
	mysql_query($sql);

	$sql="UPDATE  `$dbname`.`setting` SET  `vlaue` =  '".$_POST['github']."' WHERE  `setting`.`key` ='github';";
	mysql_query($sql);

	$sql="UPDATE  `$dbname`.`setting` SET  `vlaue` =  '".$_POST['foot']."' WHERE  `setting`.`key` ='foot';";
	mysql_query($sql);

	$sql="UPDATE  `$dbname`.`setting` SET  `vlaue` =  '".$_POST['title']."' WHERE  `setting`.`key` ='title';";
	mysql_query($sql);

	if ($_POST['rootpass']!="") {
		$pass=md5($_SESSION['user'].$_POST['rootpass']);
		$sql="UPDATE  `$dbname`.`setting` SET  `vlaue` =  '".$pass."' WHERE  `setting`.`key` ='login';";
		mysql_query($sql);
	}

?>