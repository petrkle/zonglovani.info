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

	if($video['typ']=='juggling.tv'){
		$fid=preg_split('/\.tv:/',$video['link']);
		$video['fid']=$fid[1];
	}

	if($video['typ']=='youtube.com'){
		$fid=preg_split('/watch\?v=/',$video['link']);
		$video['fid']=$fid[1];
	}

	$hlavicky=array();
	if(isset($video['nahled'])){
		$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/video/img/'.substr($video['nahled'],0,1).'/'.$video['nahled']);
	}
	if(isset($video['rozliseni'])){
		$rozliseni=preg_split('/x/',$video['rozliseni']);
		$hlavicky['sirka']='<meta name="video_width" content="'.$rozliseni[0].'" />';
		$hlavicky['vyska']='<meta name="video_height" content="'.$rozliseni[1].'" />';
	}

	if(isset($video['typ']) and $video['typ']!='file'){
		$hlavicky['typ']='<meta name="video_type" content="application/x-shockwave-flash" />';
	}

	if(isset($video['typ']) and $video['typ']=='juggling.tv'){
		$hlavicky['video_src']='<link rel="video_src" href="http://juggling.tv/nvplayer.swf?config=http://juggling.tv/nuevo/econfig.php?key='.$video['fid'].'" />';
		/*
		$hlavicky['video_src']='<meta name="og:video" src="http://juggling.tv/nvplayer.swf?config=http://juggling.tv/nuevo/econfig.php?key='.$video['fid'].'" />';
		$hlavicky['nahled']='<meta property="og:image" content="http://'.$_SERVER['SERVER_NAME'].'/video/img/'.substr($video['nahled'],0,1).'/'.$video['nahled'].'" />';
		$hlavicky['titulek']='<meta property="og:title" content="'.$video['nazev'].'" />';
		$hlavicky['popis']='<meta name="og:description" content="'.$video['popis'].'" />';
		$hlavicky['sirka']='<meta name="og:video:height" content="'.$rozliseni[1].'" />';
		$hlavicky['vyska']='<meta name="og:video:width" content="'.$rozliseni[0].'" />';
		$hlavicky['typ']='<meta name="og:video:type" content="application/x-shockwave-flash" />';
		 */
	}

	if(isset($video['typ']) and $video['typ']=='youtube.com'){
		$hlavicky['video_src']='<link rel="video_src" href="http://www.youtube.com/v/'.$video['fid'].'&amp;hl=cs_CZ&amp;rel=0" />';
	}

	if(count($hlavicky)>0){
		$smarty->assign_by_ref('custom_headers',$hlavicky);
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


	$trail = new Trail();
	$trail->addStep('Žonglérská videa','/video/');
	if($cislostranky>1){
		$trail->addStep($cislostranky.'. stránka','/video/stranka'.$cislostranky.'.html');
		$smarty->assign('dalsividea','/video/stranka'.$cislostranky.'.html');
	}else{
		$smarty->assign('dalsividea','/video/');
	}

	$navigace=array();
	if(isset($videa[$idcka[$v]+1])){
		$navigace['dalsi']=array('url'=>$videa[$idcka[$v]+1]['id'].'.html','text'=>$videa[$idcka[$v]+1]['nazev'],'title'=>'Video '.$videa[$idcka[$v]+1]['nazev'].', délka '.$videa[$idcka[$v]+1]['delka']);
	}else{
		$navigace['dalsi']=array('url'=>$videa[0]['id'].'.html','text'=>$videa[0]['nazev'],'title'=>'Video '.$videa[0]['nazev'].', délka '.$videa[0]['delka']);
	}

	if(isset($videa[$idcka[$v]-1])){
		$navigace['predchozi']=array('url'=>$videa[$idcka[$v]-1]['id'].'.html','text'=>$videa[$idcka[$v]-1]['nazev'],'title'=>'Video '.$videa[$idcka[$v]-1]['nazev'].', délka '.$videa[$idcka[$v]-1]['delka']);
	}else{
		$navigace['predchozi']=array('url'=>$videa[count($videa)-1]['id'].'.html','text'=>$videa[count($videa)-1]['nazev'],'title'=>'Video '.$videa[count($videa)-1]['nazev'].', délka '.$videa[count($videa)-1]['delka']);
	}


	$smarty->assign('styly',array('/a.css'));
	$smarty->assign_by_ref('navigace',$navigace);
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
	require('../404.php');
	exit();
}

?>
