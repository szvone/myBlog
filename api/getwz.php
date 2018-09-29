<?php
	@session_start();
	function getname($id){
		$cx = "SELECT * FROM `fl` where `id` = ".$id;
	//echo $cx;
	$jg = mysql_query($cx);

	$row = @mysql_fetch_array($jg);
	return $row['name'];
	}
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

	
	if ($_GET['type']=="search") {
		$cx = "SELECT * FROM `wz` where bt like '%".$_GET['key']."%' or nr like '%".$_GET['key']."%' ORDER BY date DESC limit $offset,$pagesize";
	}else if ($_GET['type']=="fl") {
		$cx = "SELECT * FROM `wz` where fl = '".$_GET['key']."' ORDER BY date DESC limit $offset,$pagesize";
	}else{
		$cx = "SELECT * FROM `wz` ORDER BY date DESC limit $offset,$pagesize";
	}

	//echo $cx;
	$jg = mysql_query($cx);

	$sc="";
	while ($row = @mysql_fetch_array($jg)) {

		$sc="1";
  		echo '<article class="am-g blog-entry-article">';
        echo '    <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text">';
        echo '<span><a href="index.html?key='.$row['fl'].'&type=fl" class="blog-color">'.getname($row['fl']).' &nbsp;</a></span>';
        echo '        <span> @'.$row['zz'].'</span>';
        echo '        <span>'.@date('Y-m-d',$row['date']).'</span>';
        echo '        <h1><a  target="_blank" href="wz.html?id='.$row['id'].'">'.$row['bt'].'</a></h1>';
        echo '        <p>'.$row['zy'];
        echo '        </p>';
        echo '        <p><a href="wz-'.$row['id'].'.html" class="blog-continue"></a></p>';
        echo '    </div>';
        echo '</article>';
	}

	if ($sc=="") {
		echo "400";
	}

?>