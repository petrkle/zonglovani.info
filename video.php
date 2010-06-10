<?php
require('init.php');
require('func.php');

if(isset($_GET['v'])){
	$v=trim($_GET['v']);
}else{
	header('Location: /video/');
	exit();
}

$video=get_video_info(get_videa('./video.inc'),$v);

if(is_array($video)){

	$smarty->assign('feedback',true);
	$trail = new Trail();
	$trail->addStep('Žonglérská videa','/video/');
	$trail->addStep($video['title']);
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign('titulek',$video['title']);
	$smarty->assign('video',$video);
	$smarty->assign('keywords',make_keywords($video['title']));
	$smarty->assign('description','Žonglérské video - '.$video['title']);
	$smarty->display('hlavicka.tpl');
	$smarty->display('video.tpl');
	$smarty->display('paticka.tpl');
}else{
	require('404.php');
	exit();
}

?>
