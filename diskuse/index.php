<?php
require('../init.php');
require('../func.php');
require($lib.'/Pager/Pager.php');

$zpravy=get_diskuse_zpravy();

$trail = new Trail();
$trail->addStep('Diskuse',DISKUSE_URL);

$pagerOptions = array(
    'mode'     => 'Sliding',
    'delta'    => 2,
		'firstLinkTitle' => 'První stránka',
    'perPage'  => 10,
    'altPrev'  => 'Předchozí stránka',
    'altNext'  => 'Další stránka',
    'altPage'  => 'Stránka',
    'separator'  => '~',
    'spacesBeforeSeparator'  => 1,
    'spacesAfterSeparator'  => 1,
		'append'   => false,
		'fileName' => 'stranka%d.html', 
    'itemData' => $zpravy,
);
$pager =& Pager::factory($pagerOptions);

//fetch the paged data into the $data variable
$data = $pager->getPageData();

if(!isset($_GET['pageID']) and !isset($_GET['rss'])){
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: '.DISKUSE_URL.'stranka'.$pager->numPages().'.html');
	exit();
}

$smarty->assign('titulek','Diskuse o žonglování');
$smarty->assign('items', $data);
$smarty->assign('pager_links', $pager->links);
$smarty->assign(
    'page_numbers', array(
        'current' => $pager->getCurrentPageID(),
        'total'   => $pager->numPages()
    )
);


if(isset($_GET['rss'])){
	header('Content-Type: application/rss+xml');
	$smarty->display('diskuse-rss.tpl');
	exit();
}else{
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->display('hlavicka.tpl');
	$smarty->display('diskuse.tpl');
	$smarty->display('paticka.tpl');
}

?>
