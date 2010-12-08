<?php
require('../init.php');
require('../func.php');

$titulek='Míček z tenisáku';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep('Výroba míčků','/micky/vyroba.html');
$trail->addStep('Z tenisáku');

$smarty->assign('description','Návod na výrobu žonglérského míčku z tenisáku. Pěkný míček na žonglování snadno, rychle a levně.');
$smarty->assign('keywords','žonglování, míčky, výroba, tenisák');
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/p/plneni-micku.s.jpg');

$dalsi=array(
	array('url'=>'/micky/vyroba-balonky.html','text'=>'Míček z nafukovacích balónků','title'=>'Jak snadno vyrobit míček na žonglování z nafukovacích balónků'),
	array('url'=>'/micky/jak-zacit.html','text'=>'Jak začít žonglovat s míčky','title'=>'Jak začít žonglovat s míčky'),
	array('url'=>'/micky/druhy.html','text'=>'Druhy míčků','title'=>'Druhy míčků na žonglování'),
	array('url'=>'/navody/','text'=>'Návod k vytištění','title'=>'Návod na výrobu míčku v PDF - formát vhodný k tisku.'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('micky-vyroba-tenisak.tpl');
$smarty->display('paticka.tpl');
?>
