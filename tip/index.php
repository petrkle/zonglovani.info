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
	$titulek='Tip týdne';
	$trail = new Trail();
	$trail->addStep($titulek);
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign('titulek',$titulek);
	$smarty->display('hlavicka.tpl');
	$smarty->assign('tipy',array_reverse($tipy));
	$smarty->display('tip.list.tpl');
	$smarty->display('paticka.tpl');
}
?>
