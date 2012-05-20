<?php
require('../init.php');
require('../func.php');
require($lib.'/Pager/Pager.php');

$zpravy=get_diskuse_zpravy();

if(is_logged()){
$latest=array();
$pocetzprav=count($zpravy)-1;
for($frk=0;$frk<3;$frk++){
	$latest[$frk]=$zpravy[$pocetzprav-$frk];
}
$_SESSION['diskuse_latest']=$latest;
}

$trail = new Trail();
$trail->addStep('Diskuse',DISKUSE_URL);

$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/f/faq.png');

$pagerOptions = array(
    'mode'     => 'Sliding',
    'delta'    => 2,
		'firstLinkTitle' => 'První stránka',
    'perPage'  => ZPRAV_NA_STRANKU,
    'altPrev'  => 'Starší příspěvky',
    'altNext'  => 'Novější příspěvky',
    'altPage'  => 'Stránka',
    'prevImg' => '&laquo;&nbsp;Starší',
    'nextImg' => 'Novější&nbsp;&raquo;',
    'separator'  => '&nbsp;',
    'spacesBeforeSeparator'  => 1,
    'spacesAfterSeparator'  => 1,
		'append'   => false,
		'fileName' => 'stranka%d.html', 
		'linkClass' => 'pl',
    'itemData' => $zpravy,
);
$pager =& Pager::factory($pagerOptions);

//fetch the paged data into the $data variable
$data = $pager->getPageData();
if($pager->getCurrentPageID()>1){
	$predchozi=$pager->getPageData($pager->getCurrentPageID()-1);
	array_unshift($data,array_pop($predchozi));
	array_unshift($data,array_pop($predchozi));
}

if(!isset($_GET['pageID']) and !isset($_GET['rss'])){
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: '.DISKUSE_URL.'stranka'.$pager->numPages().'.html');
	exit();
}

$smarty->assign('titulek','Diskuse a komentáře - '.$pager->getCurrentPageID().'. stránka');
$smarty->assign('items', $data);
$smarty->assign('pager_links', $pager->links);
$smarty->assign('nadpis','Diskuse a komentáře');
if($pager->getCurrentPageID()!=$pager->numPages()){
	$trail->addStep($pager->getCurrentPageID().'. stránka',DISKUSE_URL.$pager->getCurrentPageID().'.html');
}
$smarty->assign(
    'page_numbers', array(
        'current' => $pager->getCurrentPageID(),
        'total'   => $pager->numPages()
    )
);

$smarty->assign('description','Diskuse o žonglování '.$pager->getCurrentPageID().'. stránka.');
$smarty->assign('keywords','diskuse, žonglování, aktuality, akce, žonglérské novinky');

if(isset($_GET['rss'])){
	$smarty->assign_by_ref('zpravy',$zpravy);
	header('Content-Type: application/rss+xml');
	if(isset($_GET['v'])){
		$smarty->display('diskuse-rss2.tpl');
	}else{
		$smarty->display('diskuse-rss.tpl');
	}
	exit();
}else{
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->display('hlavicka.tpl');
	$smarty->display('diskuse.tpl');
	$smarty->display('paticka.tpl');
}


?>
