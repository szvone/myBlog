<?php
	session_start();
	if (!isset($_SESSION['user'])) {
		echo "404";
		return;
	}
	function chinesesubstr($str,$start,$len){
        $strlen = $len - $start;    //定义需要截取字符的长度
        $tmpstr="";
        for($i=0;$i<$strlen;$i++){                   //使用循环语句，单字截取，并用$tmpstr.=$substr(？，？，？)加起来
            if(ord(substr($str,$i,1))>0xa0){     //ord()函数取得substr()的第一个字符的ASCII码，如果大于0xa0的话则是中文字符
                $tmpstr.=substr($str,$i,3);        //设置tmpstr递加，substr($str,$i,3)的3是指三个字符当一个字符截取(因为utf8编码的三个字符算一个汉字)
                $i+=2;
            }else{                                             //其他情况（英文）按单字符截取
                $tmpstr.=substr($str,$i,1);
            }

        }
        return $tmpstr;
}

function getname($id){
	$sql="select * from wz where id = $id";
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
	return $row['bt'];
}
	require_once('../../api/conf/db.php');

	//读取指定记录数
	$type=$_GET['type'];

	$cx = "SELECT * FROM `pl` where type = ".$type." order by id desc";
	//echo $cx;
	$jg = mysql_query($cx);
	$ishave=false;
	while ($row = @mysql_fetch_array($jg)) {
		$ishave=true;
		if ($type==1) {
			$button = "<span class='am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only' onclick='del(\"".$row['id']."\")'><span class='am-icon-trash-o'>删除</span>";
		}else{
			$button = "<span class='am-btn am-btn-success am-btn-xs am-hide-sm-only' onclick='tg(\"".$row['id']."\")'><span class='am-icon-check'></span>通过</span> 
						<span class='am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only' onclick='del(\"".$row['id']."\")'><span class='am-icon-trash-o'>删除</span>";
		}
		
		echo "<tr><td>".$row['id']."</td>
				<td>".getname($row['wzid'])."</td>
				<td>".$row['name']."</td>
				<td>".$row['mail']."</td>
				<td>".$row['web']."</td>
				<td onclick='alert(\"".$row['nr']."\")'>点击查看</td>
				<td>".@date("Y-m-d",$row['date'])."</td>
				<td>".$row['ip']."</td>
				<td>".$button."</td>
		</tr>";
		
        
	}
	if (!$ishave) {
		if ($_GET['type']==1) {
			echo "<tr><td colspan='9'><center>没有已审核的评论</center></td></tr>";
		}else{
			echo "<tr><td colspan='9'><center>没有待审核的评论</center></td></tr>";
		}
		
	}



?>