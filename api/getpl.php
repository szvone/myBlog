<?php
	session_start();
	require_once('conf/db.php');

$pagesize=5;

	//设置页数
	if (isset($_GET['page'])){
		$page=intval($_GET['page']);
	}else{
		//设置为第一页 
		$page=1;
	}

	//计算记录偏移量
	$offset=$pagesize*($page - 1);


	//读取指定记录数

	$cx = "SELECT * FROM `pl` where type = 1 and wzid = '".$_GET['id']."' ORDER BY id DESC limit $offset,$pagesize";
	//echo $cx;
	$jg = mysql_query($cx);
	$have = "";
	while ($row = @mysql_fetch_array($jg)) {
		$have = "1";
        echo '<span href="javascript;"  class="blog-tag">'.$row['name'].'</span>';

        echo '<div class="am-g blog-author blog-article-margin">';
        echo '    <div class="am-u-sm-10 am-u-md-10 am-u-lg-10">';
        echo '    <h3><span>'.$row['name'].' &nbsp;@ &nbsp;</span><span class="blog-color">'.@date("Y-m-d", $row['date']).'</span></h3>';
        echo '      <p>'.$row['nr'].'</p>';
        echo '    </div>';
        echo '</div>';

        echo '<hr>';
	}

	if ($have=="") {
		echo "400";
	}



?>