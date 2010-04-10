<?php
require('init.php');
require('func.php');

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep('Jak vyrobit kužel na žonglování');

$smarty->assign_by_ref('trail', $trail->path);

$dalsi=array(
	array('url'=>'/kuzely/jak-zacit.html','text'=>'Jak začít žonglovat s kužely','title'=>'Rychlý návod na žonglování s kužely'),
	array('url'=>'/micky/vyroba.html','text'=>'Výroba míčků na žonglování','title'=>'Míčky na žonglování snadno a rychle'),
	array('url'=>'/kruhy/vyroba.html','text'=>'Jak vyrobit kruhy na žonglování','title'=>'Návod na výrobu kruhů z novin.')
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->assign('titulek','Výroba kuželů');
$smarty->assign('feedback',true);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-vyroba.tpl');
$smarty->display('paticka.tpl');

?>
