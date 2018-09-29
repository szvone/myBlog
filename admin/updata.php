<?php

function get_extension($file)
{
return pathinfo($file, PATHINFO_EXTENSION);
}

$str = get_extension($_FILES["file"]["name"]);
$time =time();
$mm="../images/" . $time .".$str";
move_uploaded_file($_FILES["file"]["tmp_name"],$mm);
echo $mm;
?>