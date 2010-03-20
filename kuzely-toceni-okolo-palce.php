<?php
require('init.php');
require('func.php');

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep('Točení okolo palce');

$smarty->assign_by_ref('trail', $trail->path);

$smarty->assign('titulek','Otáčení kuželky okolo palce');
$smarty->assign('feedback',true);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-toceni-okolo-palce.tpl');
$smarty->display('paticka.tpl');

?>
