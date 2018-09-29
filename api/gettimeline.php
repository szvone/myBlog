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


	
	
	$cx = "SELECT * FROM `wz` ORDER BY date desc";
	

	//echo $cx;
	$jg = mysql_query($cx);

	$year="0";
	$month="0";

	while ($row = @mysql_fetch_array($jg)) {


		$nowyear = @date('Y',$row['date']);
		if ($nowyear!=$year) {
			if ($year!="0") {
				echo "</ul></div><br>";
			}
			$year=$nowyear;
			echo '<hr><div class="timeline-year">';
            echo '<h1>'.$year.'</h1>';
		}

		$nowmonth = @date('m',$row['date']); 
		if ($nowmonth!=$month) {
			if ($month!="0") {
				echo "</ul>";
			}
			$month=$nowmonth;
			echo '<ul>
                <br>
                <h3>'.$month.'月</h3>
                <hr>';
		}

  		echo '<li>
                    <span class="am-u-sm-4 am-u-md-2 timeline-span">'.@date('Y-m-d',$row['date']).'</span>
                    <span class="am-u-sm-8 am-u-md-6"><a href="wz.html?id='.$row['id'].'">'.$row['bt'].'</a></span>
                    <span class="am-u-sm-4 am-u-md-2 am-hide-sm-only"><a href="index.html?key='.$row['fl'].'&type=fl">'.getname($row['fl']).'</a></span>
                    <span class="am-u-sm-4 am-u-md-2 am-hide-sm-only">浏览量：'.$row['hot'].'</span>
                </li>';
        
	}


?>