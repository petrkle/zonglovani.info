<?php
require('init.php');
require('func.php');

$titulek='Literatura';

$smarty->assign('titulek','Simulátory žonglování');

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep('Software');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-software.tpl');
$smarty->display('paticka.tpl');

?>
