<?php
require('init.php');
require('func.php');

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep('Úchop');

$smarty->assign_by_ref('trail', $trail->path);

$smarty->assign('titulek','Dva kužely v jedné ruce');
$smarty->assign('feedback',true);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-grip.tpl');
$smarty->display('paticka.tpl');

?>
