<?php
require('init.php');
require('func.php');

$smarty->assign('titulek','Vysvětlivky k obrázkům - míčky');
$smarty->assign('nadpis','Vysvětlivky k obrázkům');
$smarty->assign('feedback',true);

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep('Legenda');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('micky-legenda.tpl');
$smarty->display('paticka.tpl');

?>
