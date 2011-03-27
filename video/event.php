<?php
require('../init.php');
require('../func.php');
require('func-video.php');
require('events.php');
require($lib.'/Pager/Pager.php');

if(isset($_GET['id'])){
	$id=trim($_GET['id']);
	if(!isset($juggling_events[$id])){
		require('../404.php');
	}
}

$videa=get_videa($id);

$pagerOptions = array(
    'mode'     => 'Sliding',
    'delta'    => 2,
		'firstLinkTitle' => 'První stránka',
    'perPage'  => $videi_na_stranku,
    'altPrev'  => 'Předchozí stránka',
    'altNext'  => 'Další stránka',
    'altPage'  => 'Stránka',
    'separator'  => '&nbsp;',
    'spacesBeforeSeparator'  => 1,
    'spacesAfterSeparator'  => 1,
		'append'   => false,
		'linkClass' => 'pl',
		'fileName' => $id.'/stranka%d.html', 
    'itemData' => $videa,
);
$pager =& Pager::factory($pagerOptions);
$data = $pager->getPageData();

$smarty->assign('keywords','žonglování, video, '.$juggling_events[$id]);
$titulek=$juggling_events[$id];
$desc=$juggling_events[$id];
$nadpis=$titulek;
if($pager->getCurrentPageID()>1){
	$titulek.=' '.$pager->getCurrentPageID().'. stránka';
	$desc.=' '.$pager->getCurrentPageID().'. stránka';
	$smarty->assign('nadpis',$nadpis);
}
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Žonglérská videa','/video/');
$trail->addStep($juggling_events[$id],'/video/'.$id.'/');
if($pager->getCurrentPageID()>1){
	$trail->addStep($pager->getCurrentPageID().'. stránka','/video/stranka'.$pager->getCurrentPageID().'.html');
}
$smarty->assign_by_ref('trail', $trail->path);

$smarty->assign(
    'page_numbers', array(
        'current' => $pager->getCurrentPageID(),
        'total'   => $pager->numPages()
    )
);

$smarty->assign('description',$desc);

$dalsi=array(
	array('url'=>'/video/','text'=>'Žonglérská videa','title'=>'Zajímavá žonglérská videa'),
	);
foreach($juggling_events as $key=>$nazev){
	if($id!=$key){
		array_push($dalsi,array('url'=>'/video/'.$key.'/','text'=>$nazev,'title'=>$nazev.' - video'));
	}
}

$smarty->assign('pager_links', $pager->links);
$smarty->assign_by_ref('dalsi',$dalsi);
$smarty->assign_by_ref('videa',$data);
$smarty->display('hlavicka.tpl');
$smarty->display('video-index.tpl');
$smarty->display('paticka.tpl');
