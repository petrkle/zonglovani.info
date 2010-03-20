<?php
require('init.php');
require('func.php');

$titulek='Jak začít žonglovat s kužely';

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep('Headrool');

$smarty->assign_by_ref('trail', $trail->path);

$smarty->assign('titulek','Překulení kuželky přes hlavu');
$smarty->assign('feedback',true);

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-headroll.tpl');
$smarty->display('paticka.tpl');

?>
