<?php
require('../init.php');
require('../func.php');

$titulek='Jak začít žonglovat s kužely';

$smarty->assign('titulek',$titulek);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Návod na žonglování se třemi kužely');

$dalsi=array(
	array('url'=>'/kuzely/balanc.html','text'=>'Balancování kuželu','title'=>'Balancování kuželu'),
	array('url'=>'/kuzely/toceni-okolo-palce.html','text'=>'Otáčení kuželky okolo palce','title'=>'Trik který můžeš trénovat i v místnostech s nízkým stropem'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep('Headrool');

$smarty->assign_by_ref('trail', $trail->path);

$smarty->assign('titulek','Překulení kuželky přes hlavu');
$smarty->assign('feedback',true);

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-headroll.tpl');
$smarty->display('paticka.tpl');

?>
