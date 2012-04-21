<?php
require('../init.php');
require('../func.php');
require('func-video.php');
require('events.php');
require($lib.'/Pager/Pager.php');
$smarty->assign('feedback',true);

$videa=get_videa();

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
		'fileName' => 'stranka%d.html', 
    'itemData' => $videa,
);
$pager =& Pager::factory($pagerOptions);
$data = $pager->getPageData();

$smarty->assign('keywords','žonglování, video, fireshow, žonglshow, představení');
$titulek='Žonglérská videa';
$desc='Výběr povedených žonglérských videí.';
$nadpis=$titulek;
if($pager->getCurrentPageID()>1){
	$titulek.=' '.$pager->getCurrentPageID().'. stránka';
	$desc.=' '.$pager->getCurrentPageID().'. stránka';
	$smarty->assign('nadpis',$nadpis);
}
$smarty->assign('titulek',$titulek);
$trail = new Trail();
$trail->addStep($nadpis,'/video/');

$smarty->assign('description',$desc);

$dalsi=array(
	array('url'=>'/animace/','text'=>'Animace žonglování','title'=>'Animace triků s míčky'),
	array('url'=>'/obrazky/','text'=>'Obrázky žonglování','title'=>'Fotografie žonglování'),
	);

if($pager->getCurrentPageID()>1){
	$trail->addStep($pager->getCurrentPageID().'. stránka','/video/stranka'.$pager->getCurrentPageID().'.html');
}else{
	foreach($juggling_events as $key=>$video){
		if($video['public']===true){
			array_push($dalsi,array('url'=>'/video/'.$key.'/','text'=>$video['title'],'title'=>$video['title'].' - video'));
		}
	}
}

$smarty->assign(
    'page_numbers', array(
        'current' => $pager->getCurrentPageID(),
        'total'   => $pager->numPages()
    )
);

$smarty->assign_by_ref('dalsi',$dalsi);
$smarty->assign('feedback',true);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->assign('pager_links', $pager->links);
$smarty->assign('videa',$data);
$smarty->display('hlavicka.tpl');
$smarty->display('video-index.tpl');
$smarty->display('paticka.tpl');

?>
