<?php
require('../init.php');
require('../func.php');
require('func-video.php');
require($lib.'/Pager/Pager.php');


$titulek='Žonglérská videa';
$smarty->assign('titulek',$titulek);
$trail = new Trail();
$trail->addStep($titulek,'/video/');

$smarty->assign('keywords','žonglování, video, fireshow, žonglshow, představení');
$smarty->assign('description','Výběr povedených žonglérských videí.');

$videa=get_videa();

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

$dalsi=array(
	array('url'=>'/animace/','text'=>'Animace žonglování','title'=>'Animace triků s míčky'),
	array('url'=>'/obrazky/','text'=>'Obrázky žonglování','title'=>'Fotografie žonglování'),
	);

if($pager->getCurrentPageID()!=$pager->numPages()){
	$trail->addStep($pager->getCurrentPageID().'. stránka','/video/stranka'.$pager->getCurrentPageID().'.html');
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
