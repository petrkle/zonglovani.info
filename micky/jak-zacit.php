<?php
require('../init.php');
require('../func.php');

$titulek='Jak začít žonglovat s míčky';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Obrázkový návod na žonglování s míčky.');

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep($titulek);

$dalsi=array(
	array('url'=>'/micky/3/kaskada.html','text'=>'Kaskáda se třemi míčky','title'=>'Nejjednodušší způsob žonglování'),
	array('url'=>'/micky/vyroba.html','text'=>'Výroba žonglovacích míčků','title'=>'Jak vyrobit pěkné a levné míčky na žonglování'),
	array('url'=>'/micky/druhy.html','text'=>'Druhy míčků','title'=>'Druhy míčků na žonglování')
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('micky-jak-zacit.tpl');
$smarty->display('paticka.tpl');

?>
