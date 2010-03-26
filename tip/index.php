<?php
require('../init.php');
require('../func.php');

if(isset($_GET['rss'])){
	$rss=$_GET['rss'];
}else{
	$rss=false;
}

if(isset($_GET['imgrss'])){
	$imgrss=$_GET['imgrss'];
}else{
	$imgrss=false;
}


$tipy=get_tipy();

if($rss){
	header('Content-Type: application/rss+xml');
	$smarty->assign('tipy',array_reverse($tipy));
	$smarty->display('tip.rss.tpl');
	exit();
}elseif($imgrss){
	header('Content-Type: application/rss+xml');
	$smarty->assign('tipy',array_reverse($tipy));
	$smarty->display('tip-img.rss.tpl');
	exit();
}else{
	$smarty->assign('titulek','Žonglérský tip týdne');
	$smarty->display('hlavicka.tpl');
	$smarty->assign('tipy',array_reverse($tipy));
	$smarty->display('tip.list.tpl');
	$smarty->display('paticka.tpl');
}
?>
