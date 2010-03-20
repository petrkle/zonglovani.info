<?php
require('init.php');
require('func.php');

$smarty->assign('titulek','Žonglování na síti');
$smarty->assign('feedback',true);

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep('Odkazy');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-odkazy.tpl');
$smarty->display('paticka.tpl');

?>
