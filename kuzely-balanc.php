<?php
require('init.php');
require('func.php');

$titulek='Balancování kuželu';
$smarty->assign('feedback',true);

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep('Balancování');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-balanc.tpl');
$smarty->display('paticka.tpl');

?>
