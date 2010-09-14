<?php
require('../init.php');
require('../func.php');

$smarty->assign('titulek','Žonglování se šesti míčky');
$smarty->assign('feedback',true);
$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep('6 míčků');

$smarty->assign('keywords','žonglování, šest, sedm, osm, míčků, míčky, návod');
$smarty->assign('description','Obrázkový návod na žonglování se šesti míčky.');

$dalsi=array(
	array('url'=>'/kruhy/','text'=>'Žonglování s kruhy','title'=>'Návod žonglování s kruhy'),
	array('url'=>'/kuzely/','text'=>'Žonglování s kužely','title'=>'Jak žonglovat s kužely'),
	array('url'=>'/kuzely/passing/','text'=>'Passing','title'=>'Žonglování ve více lidech'),
	);

$smarty->assign_by_ref('dalsi',$dalsi);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('micky-6.tpl');
$smarty->display('paticka.tpl');

?>