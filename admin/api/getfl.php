<?php
	session_start();
	if (!isset($_SESSION['user'])) {
		echo "404";
		return;
	}
	require_once('../../api/conf/db.php');

	//读取指定记录数

	$cx = "SELECT * FROM `fl` ";
	//echo $cx;
	$jg = mysql_query($cx);

	while ($row = @mysql_fetch_array($jg)) {
		if ($_GET['type']==1) {
			echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
		}else{
			echo "<tr><td>".$row['id']."</td>
				<td>".$row['name']."</td>
				<td>".@date("Y-m-d",$row['date'])."</td>
				<td>"."0"."</td>
				<td>"."<span class='am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only' onclick='delfl(\"".$row['id']."\")'><span class='am-icon-trash-o'>删除</span>"."</td>
			</tr>";
		}
        
	}



?>