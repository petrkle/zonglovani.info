<?php
require('init.php');
require('func.php');

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep('Legenda');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->assign('titulek','Vysvětlivky k obrázkům - kužely');
$smarty->assign('nadpis','Vysvětlivky k obrázkům');
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-legenda.tpl');
$smarty->display('paticka.tpl');

?>
