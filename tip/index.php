<?php
require('../init.php');
require('../func.php');

if(isset($_GET['rss'])){
	$rss=$_GET['rss'];
}else{
	$rss=false;
}

$tipy=get_tipy();

if($rss){
	header('Content-Type: application/rss+xml');
	$smarty->assign('tipy',$tipy);
	$smarty->display('tip.rss.tpl');
	exit();
}else{
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: /");
	exit();
	$smarty->assign('titulek','Tip týdne');
	$smarty->display('hlavicka.tpl');
	$smarty->assign('tip',array_pop($tipy));
	$smarty->display('tip.tpl');
	$smarty->display('paticka.tpl');
}
?>
