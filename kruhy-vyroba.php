<?php
require('init.php');
require('func.php');

$smarty->assign('titulek','Výroba kruhů');
$trail = new Trail();
$trail->addStep('Kruhy','/kruhy/');
$trail->addStep('Výroba kruhů');
$smarty->assign('titulek','Výroba kruhů');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kruhy-vyroba.tpl');
$smarty->display('paticka.tpl');

?>
