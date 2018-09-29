<?php
	session_start();
	if (!isset($_SESSION['user'])) {
		echo "404";
		return;
	}
	require_once('../../api/conf/db.php');

	//读取指定记录数

	$cx = "SELECT * FROM `wz` order by id desc";
	//echo $cx;
	$jg = mysql_query($cx);

	while ($row = @mysql_fetch_array($jg)) {
		
		echo "<tr><td>".$row['id']."</td>
				<td><a target='_blank' href='../wz.html?id=".$row['id']."'>".$row['bt']."</a></td>
				<td>".$row['zy']."</td>
				<td>".$row['keyworld']."</td>
				<td>".@date("Y-m-d",$row['date'])."</td>
				<td>"."<span class='am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only' onclick='del(\"".$row['id']."\")'><span class='am-icon-trash-o'>删除</span></span>"."<span class='am-btn am-btn-default am-btn-xs am-hide-sm-only' onclick='window.location.href=\"admin-eit.html?id=".$row['id']."\"'><span class='am-icon-pencil-square-o'>编辑</span></span>"."</td>
		</tr>";
		
        
	}



?>