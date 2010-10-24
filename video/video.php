<?php
require('../init.php');
require('../func.php');
require('func-video.php');
require($lib.'/Pager/Pager.php');

if(isset($_GET['v'])){
	$v=trim($_GET['v']);
}else{
	header('Location: /video/');
	exit();
}

$videa=get_videa();
$idcka=array();
foreach($videa as $key=>$video){
	$idcka[$video['id']]=$key;
}

if(isset($idcka[$v])){
	$video=$videa[$idcka[$v]];
	if(isset($video['nahled'])){
		$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/video/img/'.substr($video['nahled'],0,1).'/'.$video['nahled']);
	}

$pagerOptions = array(
    'mode'     => 'Sliding',
    'delta'    => 2,
		'firstLinkTitle' => 'První stránka',
    'perPage'  => $videi_na_stranku,
    'altPrev'  => 'Předchozí stránka',
    'altNext'  => 'Další stránka',
    'altPage'  => 'Stránka',
    'separator'  => '~',
    'spacesBeforeSeparator'  => 1,
    'spacesAfterSeparator'  => 1,
		'append'   => false,
		'fileName' => 'stranka%d.html', 
    'itemData' => $videa,
);
$pager =& Pager::factory($pagerOptions);
$data = $pager->getPageData();

		$cislostranky=$pager->getPageIdByOffset($idcka[$v]);

	if($video['typ']=='juggling.tv'){
		$fid=preg_split('/\.tv:/',$video['link']);
		$video['fid']=$fid[1];
	}

	if($video['typ']=='youtube.com'){
		$fid=preg_split('/watch\?v=/',$video['link']);
		$video['fid']=$fid[1];
	}

	$smarty->assign('feedback',true);
	$trail = new Trail();
	$trail->addStep('Žonglérská videa','/video/');
	if($cislostranky>1){
		$trail->addStep($cislostranky.'. stránka','/video/stranka'.$cislostranky.'.html');
		$smarty->assign('dalsividea','/video/stranka'.$cislostranky.'.html');
	}else{
		$smarty->assign('dalsividea','/video/');
	}
	$trail->addStep($video['nazev']);
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign('titulek',$video['nazev']);
	$smarty->assign('video',$video);
	$smarty->assign('keywords',make_keywords($video['nazev']));
	$smarty->assign('description','Žonglérské video - '.$video['nazev']);
	$smarty->display('hlavicka.tpl');
	$smarty->display('video.tpl');
	$smarty->display('paticka.tpl');
}else{
	require('404.php');
	exit();
}

?>
