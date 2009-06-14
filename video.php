<?php
require("init.php");
require("func.php");

if(isset($_GET["v"])){
	$v=trim($_GET["v"]);
}else{
	header("Location: /video/");
	exit();
}

$video=get_video_info(get_videa("./video.inc"),$v);

if(is_array($video)){
	$smarty->assign("titulek",$video["title"]);
	$smarty->assign("video",$video);
	$smarty->display("hlavicka.tpl");
	$smarty->display("video.tpl");
	$smarty->display("paticka.tpl");
}else{
	require("404.inc");
	exit();
}

?>
