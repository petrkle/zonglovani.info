<?php
require('../init.php');
require('../func.php');
require('../cache.php');
require($lib.'/Pager/Pager.php');

if(isset($_GET['rss'])){
	$rss=$_GET['rss'];
}else{
	$rss=false;
}

if(isset($_GET['imgrss'])){
	$imgrss=$_GET['imgrss'];
}else{
	$imgrss=false;
}

$tipy=get_tipy();


if($rss){
	header('Content-Type: application/rss+xml');
	http_cache_headers(3600,true);
	$smarty->assign('tipy',$tipy);
	$smarty->display('tip.rss.tpl');
	exit();
}elseif($imgrss){
	http_cache_headers(3600,true);
	header('Content-Type: application/rss+xml');
	$smarty->assign('tipy',$tipy);
	$smarty->display('tip-img.rss.tpl');
	exit();
}else{
	http_cache_headers(3600);

$pagerOptions = array(
    'mode'     => 'Sliding',
    'delta'    => 2,
		'firstLinkTitle' => 'První stránka',
    'perPage'  => ZPRAV_NA_STRANKU,
    'altPrev'  => 'Předchozí stránka',
    'altNext'  => 'Další stránka',
    'altPage'  => 'Stránka',
    'separator'  => '&nbsp;',
		'linkClass' => 'pl',
    'spacesBeforeSeparator'  => 1,
    'spacesAfterSeparator'  => 1,
		'append'   => false,
		'fileName' => 'archiv%d.html', 
    'itemData' => $tipy,
);
$pager =& Pager::factory($pagerOptions);
$data = $pager->getPageData();

$first_tip=array_slice($data,0,1);
$fl=preg_replace('/^(.).*/','\1',$first_tip[0]['obrazek']);
if(is_file('../img/'.$fl.'/'.$first_tip[0]['obrazek'])){
	$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/'.$fl.'/'.$first_tip[0]['obrazek']);
}

$smarty->assign(
    'page_numbers', array(
        'current' => $pager->getCurrentPageID(),
        'total'   => $pager->numPages()
    )
);

$smarty->assign('pager_links', $pager->links);
$smarty->assign('tipy',$data);
$smarty->assign('styly',array('/t.css'));

	$titulek='Žonglérský tip týdne';
	$popis='Každý týden aktualizované tipy a rady pro žongléry a žonglérky.';
	$trail = new Trail();
	$trail->addStep('Tip týdne','/tip/');
	$smarty->assign('nadpis',$titulek);

if($pager->getCurrentPageID()>1){
	$trail->addStep('Archiv - '.$pager->getCurrentPageID().'. stránka','/tip/archiv'.$pager->getCurrentPageID().'.html');
	$titulek.=',  archiv - '.$pager->getCurrentPageID().'. stránka';
	$popis='Archiv tipů a rad pro žongléry a žonglérky. '.$pager->getCurrentPageID().'. stránka';
}

	$smarty->assign('description',$popis);
	$smarty->assign('titulek',$titulek);
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->display('hlavicka.tpl');
	$smarty->display('tip.list.tpl');
	$smarty->display('paticka.tpl');
}
