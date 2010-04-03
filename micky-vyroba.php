<?php
require('init.php');
require('func.php');

$titulek='Výroba míčků na žonglování';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep($titulek);

$dalsi=array(
	array('url'=>'/micky/jak-zacit.html','text'=>'Jak začít žonglovat s míčky','title'=>'Jak začít žonglovat s míčky'),
	array('url'=>'/micky/druhy.html','text'=>'Druhy míčků','title'=>'Druhy míčků na žonglování'),
	array('url'=>'/kuzely/vyroba.html','text'=>'Výroba kuželu na žonglování','title'=>'Jak vyrobit kužel na žonglování')
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('micky-vyroba.tpl');
$smarty->display('paticka.tpl');
?>
