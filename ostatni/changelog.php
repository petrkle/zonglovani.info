<?php
require('../init.php');
require('../func.php');
require($lib.'/Pager/Pager.php');


$dalsi=array(
	array('url'=>'/proc-a-jak.html','text'=>'Proč a jak vznikl žonglérův slabikář','title'=>'Proč a jak vznikl žonglérův slabikář'),
	array('url'=>'/podporte-zongleruv-slabikar.html','text'=>'Podpoř žonglérův slabikář','title'=>'Jak podpořit žonglérův slabikář'),
	array('url'=>'/toolbox.html','text'=>'Použitý software','title'=>'Seznam programů použitých při vytváření žonglérova slabikáře'),
	array('url'=>'/statistiky.html','text'=>'Statistiky','title'=>'Statistiky žonglérova slabikáře')
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$zmeny=get_changelog();

$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/b/budik.jpg');

$pagerOptions = array(
    'mode'     => 'Sliding',
    'delta'    => 3,
		'firstLinkTitle' => 'První stránka',
    'perPage'  => 25,
    'altPrev'  => 'Novější změny',
    'altNext'  => 'Starší změny',
    'altPage'  => 'Stránka',
    'prevImg' => '&laquo;&nbsp;Novější',
    'nextImg' => 'Starší&nbsp;&raquo;',
    'separator'  => '&nbsp;',
		'linkClass' => 'pl',
    'spacesBeforeSeparator'  => 1,
    'spacesAfterSeparator'  => 1,
		'append'   => false,
		'path'		=> '/',
		'fileName' => 'changelog-%d.html', 
    'itemData' => $zmeny,
);
$pager =& Pager::factory($pagerOptions);
$data = $pager->getPageData();

$smarty->assign(
    'page_numbers', array(
        'current' => $pager->getCurrentPageID(),
        'total'   => $pager->numPages()
    )
);

$titulek='Změny v žonglérově slabikáři';
$nadpis=$titulek;
$popis='Seznam změn v žonglérově slabikáři.';

$trail = new Trail();
$trail->addStep($titulek,'/changelog.html');

if($pager->getCurrentPageID()>1){
	$trail->addStep($pager->getCurrentPageID().'. stránka','/tip/archiv'.$pager->getCurrentPageID().'.html');
	$titulek.=' '.$pager->getCurrentPageID().'. stránka';
	$popis.=' '.$pager->getCurrentPageID().'. stránka';
}

$smarty->assign('nadpis',$nadpis);
$smarty->assign('keywords','změny, žonglérův slabikář, changelog');
$smarty->assign('description',$popis);
$smarty->assign('titulek',$titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');

$smarty->assign('pager_links', $pager->links);

$smarty->assign('zmeny',$data);
$smarty->display('ostatni-changelog.tpl');

$smarty->display('paticka.tpl');
?>
