<?php
require('init.php');
require('func.php');

$smarty->assign('titulek','Výroba kruhů');
$smarty->assign('feedback',true);


$dalsi=array(
	array('url'=>'/micky/vyroba.html','text'=>'Výroba žonglovacích míčků','title'=>'Jak vyrobit pěkné a levné míčky na žonglování'),
	array('url'=>'/kuzely/vyroba.html','text'=>'Jak vyrobit kužel na žonglování','title'=>'Návod na výrobu kuželu z novin.')
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep('Kruhy','/kruhy/');
$trail->addStep('Výroba kruhů');
$smarty->assign('titulek','Výroba kruhů');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kruhy-vyroba.tpl');
$smarty->display('paticka.tpl');

?>
