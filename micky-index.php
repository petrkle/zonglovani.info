<?php
require('init.php');
require('func.php');

$titulek='Žonglování s míčky';
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Míčky');
$smarty->assign_by_ref('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('micky.tpl');
$smarty->display('paticka.tpl');

?>
