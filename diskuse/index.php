<?php
require('../init.php');
require('../func.php');

require_once('Pager/Pager.php');

$smarty->assign("rsslink",'http://'.$_SERVER["SERVER_NAME"].DISKUSE_URL.'zpravy.rss');
$zpravy=get_diskuse_zpravy();

$pagerOptions = array(
    'mode'     => 'Sliding',
    'delta'    => 2,
		'firstLinkTitle' => 'Prvn� str�nka',
    'perPage'  => 10,
    'altPrev'  => 'P�edchoz� str�nka',
    'altNext'  => 'Dal�� str�nka',
    'altPage'  => 'Str�nka',
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
if(!isset($_GET["pageID"]) and !isset($_GET["rss"])){
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: '.DISKUSE_URL.'stranka'.$pager->numPages().'.html');
	exit();
}

$smarty->assign("titulek","Diskuse o �onglov�n�");
$smarty->assign("zpravy",$zpravy);
$smarty->assign('items', $data);
$smarty->assign('pager_links', $pager->links);
$smarty->assign(
    'page_numbers', array(
        'current' => $pager->getCurrentPageID(),
        'total'   => $pager->numPages()
    )
);


if(isset($_GET["rss"])){
	header('Content-Type: application/rss+xml');
	$smarty->display('diskuse-rss.tpl');
}else{
	$smarty->display('hlavicka.tpl');
	$smarty->display('diskuse.tpl');
	$smarty->display('paticka.tpl');
}

?>
