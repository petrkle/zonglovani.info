<?php
require('../init.php');
require('../func.php');

$titulek='Balancování míčku';
$smarty->assign('feedback',true);

$smarty->assign('titulek',$titulek);
$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Odkládání míčku na hlavu, ruku i jinde. Trénink rovnováhy.');

$dalsi=array(
	array('url'=>'/micky/druhy.html#silx','text'=>'Míček SIL-X','title'=>'Míček velmi vhodný pro balancování'),
	array('url'=>'/kuzely/balanc.html','text'=>'Balancování kuželu','title'=>'Balancování kuželu'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('micky-balancovani.tpl');
$smarty->display('paticka.tpl');

?>
