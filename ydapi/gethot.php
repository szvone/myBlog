<?php
session_start();
/*
取文本中间
 */
function getSubstr($str, $leftStr, $rightStr){
        $left = strpos($str, $leftStr);
        //echo '左边:'.$left;
        if ($left=="") {
          return "";
        }
        $right = strpos($str, $rightStr,$left);
        //echo '<br>右边:'.$right;
        if($left < 0 or $right < $left) return '';
        //return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
        return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
}

/*
发起post请求
 */
function post($url,$post,$cookie=""){

    $ch = curl_init();
	   $headers=array(
	    "Content-Type:application/x-www-form-urlencoded; charset=UTF-8",
	    "X-Requested-With:XMLHttpRequest"
	  );
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
	 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result=curl_exec($ch);
    //echo $result;
    if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == '200') {
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($result, 0, $headerSize);
        $body = substr($result, $headerSize);
    }

    curl_close($ch);
    if ($cookie=="") {
    	//$cookie="";
      	$cookie=getSubstr($header,"Set-Cookie: ","\n");
    }

    $res = array('res'=>$body,'cookie'=>$cookie);
    return $res;
}

/*
发起get请求
 */
function get($url,$cookie=""){
    $opts = array (  
        'http' => array (  
            'method' => 'GET',  
            'header'=>   
            "Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8\r\n" .  
            "Cookie:".$cookie."; \r\n".  
        "Pragma:no-cache\r\n",  
        )  
    );    
    $context = stream_context_create($opts);  
    $result_data=file_get_contents($url,false,$context);  
    return $result_data;
}


if (!isset($_SESSION['ck'])) {
  $url = 'https://a1.go2yd.com/Website/user/login?appid=jingdian&cv=2.1.9.1&distribution=com.apple.appstore&net=wifi&password=08022bdcd6daef07a89100ebf57f3a748c6c9691&platform=0&reqid=aizxiquw_1514856488633_47&sync=1&username=HG_1F8DC8D42F1A&version=020130'; 
  $a = file_get_contents($url);
  $json = json_decode($a);
  $_SESSION['ck']=$json->cookie;
}


  $url = "https://a1.go2yd.com/Website/channel/news-list-for-best-channel?fields=title&fields=url&fields=source&fields=date&fields=image&fields=image_urls&fields=comment_count&fields=like&fields=up&fields=down&cstart=0&cend=30&collection_num=1&refresh=1&infinite=true&appid=jingdian&channel_id=__SYS__BEST__&version=020130&distribution=com.apple.appstore&appid=jingdian&cv=2.1.9.1&platform=0&net=wifi&reqid=aj0i8w4y_1515035793589_37";
  $a = get($url,$_SESSION['ck']);

  $json = json_decode($a);

$arr = $json->result;
$out = array();
for ($i=0; $i < sizeof($arr); $i++) { 
if (!isset($arr[$i]->title)) {
	continue;
}
  $out[]=array("title"=>$arr[$i]->title,"url"=>$arr[$i]->url);
}
$aaa = array('code' => 200, "data"=>$out);
echo json_encode($aaa);
?>