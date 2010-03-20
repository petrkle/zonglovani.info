<?php
require('init.php');
require('func.php');

$smarty->assign('titulek','Žonglování se šesti míčky');
$smarty->assign('feedback',true);
$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep('6 míčků');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('micky-6.tpl');
$smarty->display('paticka.tpl');

?>
