<?php
require('../init.php');
require('../func.php');
require('dovednosti.php');
require($lib.'/Pager/Pager.php');


$smarty->assign('dovednosti',$dovednosti);

if($_SERVER['REQUEST_URI']=='/lide/stranka1/'){
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: '.LIDE_URL);
	exit();
}

$loginy=get_loginy();

$pagerOptions = array(
    'mode'     => 'Sliding',
    'delta'    => 2,
		'firstLinkTitle' => 'První stránka',
    'perPage'  => 50,
    'altPrev'  => 'Předchozí stránka',
    'altNext'  => 'Další stránka',
    'altPage'  => 'Stránka',
    'separator'  => '~',
    'spacesBeforeSeparator'  => 1,
    'spacesAfterSeparator'  => 1,
		'append'   => false,
		'firstLinkNull'   => true,
		'fileName' => 'stranka%d/', 
    'itemData' => $loginy,
);
$pager =& Pager::factory($pagerOptions);
$data = $pager->getPageData();


$smarty->assign('items', $data);
$smarty->assign('pager_links', $pager->links);
$smarty->assign(
    'page_numbers', array(
        'current' => $pager->getCurrentPageID(),
        'total'   => $pager->numPages()
    )
);

$smarty->assign('titulek','Seznam žonglérů');
$smarty->display('hlavicka.tpl');
$smarty->display('lide.tpl');
$smarty->display('paticka.tpl');

?>
