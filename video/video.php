<?php
require('../init.php');
require('../func.php');
require('func-video.php');
require($lib.'/Pager/Pager.php');
require('events.php');
$smarty->assign('feedback',true);

if(isset($_GET['v'])){
	$v=trim($_GET['v']);
}else{
	header('Location: /video/');
	exit();
}

if(isset($_GET['event'])){
	$event=trim($_GET['event']);
	if(!isset($juggling_events[$event])){
		require('../404.php');
	}
}else{
	$event=false;
}

if($event){
	$videa=get_videa($event);
}else{
	$videa=get_videa();
}

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
		if(preg_match('/watch/', $video['link'])){
			$fid=preg_split('/watch\?v=/',$video['link']);
			$video['fid']=$fid[1];
		}
	}

	if(isset($video['youtube'])){
		$video['fid'] = $video['youtube'];	
	}

	$hlavicky=array();
	if(isset($video['nahled'])){
		$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/video/img/'.substr($video['nahled'],0,1).'/'.$video['nahled']);
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
	}

	if(isset($video['typ']) and $video['typ']=='youtube.com'){
		$hlavicky['video_src']='<link rel="video_src" href="https://www.youtube.com/v/'.$video['fid'].'&amp;hl=cs_CZ&amp;rel=0" />';
	}

	if(count($hlavicky)>0){
		$smarty->assign('custom_headers',$hlavicky);
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


	$smarty->assign('event',$event);
	$trail = new Trail();
	$trail->addStep('Žonglérská videa','/video/');
	if($event){
		$trail->addStep($juggling_events[$event]['title'],'/video/'.$event.'/');
	}
	if($cislostranky>1){
		if($event){
			$trail->addStep($cislostranky.'. stránka','/video/'.$event.'/stranka'.$cislostranky.'.html');
		}else{
			$trail->addStep($cislostranky.'. stránka','/video/stranka'.$cislostranky.'.html');
		}
		$smarty->assign('dalsividea','/video/stranka'.$cislostranky.'.html');
	}else{
		$smarty->assign('dalsividea','/video/');
	}

	$navigace=array();
	if(isset($video['navod'])){
		$navigace['navod']=$video['navod'];
	}

	if(isset($videa[$idcka[$v]+1])){
		$navigace['dalsi']=array('url'=>$videa[$idcka[$v]+1]['id'].'.html','text'=>$videa[$idcka[$v]+1]['nazev'],'title'=>'Video '.$videa[$idcka[$v]+1]['nazev'].', délka '.$videa[$idcka[$v]+1]['delka']);
	}else{
		if(count($videa)>1){
		$navigace['dalsi']=array('url'=>$videa[0]['id'].'.html','text'=>$videa[0]['nazev'],'title'=>'Video '.$videa[0]['nazev'].', délka '.$videa[0]['delka']);
		}
	}

	if(isset($videa[$idcka[$v]-1])){
		$navigace['predchozi']=array('url'=>$videa[$idcka[$v]-1]['id'].'.html','text'=>$videa[$idcka[$v]-1]['nazev'],'title'=>'Video '.$videa[$idcka[$v]-1]['nazev'].', délka '.$videa[$idcka[$v]-1]['delka']);
	}else{
		if(count($videa)>1){
		$navigace['predchozi']=array('url'=>$videa[count($videa)-1]['id'].'.html','text'=>$videa[count($videa)-1]['nazev'],'title'=>'Video '.$videa[count($videa)-1]['nazev'].', délka '.$videa[count($videa)-1]['delka']);
		}
	}

	$smarty->assign('fbsdileni','toto video');
	$smarty->assign('styly',array('a'));
	$smarty->assign('navigace',$navigace);
	$trail->addStep($video['nazev']);
	$smarty->assign('trail', $trail->path);
	$smarty->assign('titulek',$video['nazev']);
	$smarty->assign('video',$video);
	$smarty->assign('keywords',make_keywords($video['nazev']));
	$smarty->assign('description','Žonglérské video - '.$video['nazev']);
	$smarty->assign('stylwidth', 480);
	$smarty->display('hlavicka.tpl');
	$smarty->display('video.tpl');
	$smarty->display('paticka.tpl');
}else{
	require('../404.php');
	exit();
}
