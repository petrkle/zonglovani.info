<?php
require('init.php');
require('func.php');

$titulek='Literatura';

$smarty->assign('titulek','Anglicko-český žonglérský slovníček');

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep('Slovníček');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-aczslovnicek.tpl');
$smarty->display('paticka.tpl');

?>
