<?php
require('init.php');
require('func.php');

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep('Jak vyrobit kužel na žonglování');

$smarty->assign_by_ref('trail', $trail->path);

$smarty->assign('titulek','Výroba kuželů');
$smarty->assign('feedback',true);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-vyroba.tpl');
$smarty->display('paticka.tpl');

?>
