<?php
require('init.php');
require('func.php');

$smarty->assign('titulek','Vysvětlivky k obrázkům - kruhy');
$smarty->assign('nadpis','Vysvětlivky k obrázkům');
$smarty->assign('feedback',true);

$smarty->assign('keywords','žonglování, kruhy, legenda, obrázky');
$smarty->assign('description','Legenda pro obrázkové návody na žonglování s kruhy.');

$trail = new Trail();
$trail->addStep('Kruhy','/kruhy/');
$trail->addStep('Legenda');
$smarty->assign_by_ref('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('kruhy-legenda.tpl');
$smarty->display('paticka.tpl');

?>
