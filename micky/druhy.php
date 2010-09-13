<?php
require('../init.php');
require('../func.php');

$titulek='Žonglérské míčky';
$smarty->assign('keywords',make_keywords($titulek).', druhy');
$smarty->assign('description','Obrázky a popis různých druhů míčků na žonglování.');

$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$dalsi=array(
	array('url'=>'/micky/vyroba.html','text'=>'Výroba míčků na žonglování','title'=>'Jak vyrobit míček na žonglování'),
	array('url'=>'/micky/jak-zacit.html','text'=>'Jak začít žonglovat s míčky','title'=>'Základ pro žonglování se třemi míčky')
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('micky-druhy.tpl');
$smarty->display('paticka.tpl');

?>

