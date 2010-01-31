<?php
require('init.php');
require('func.php');

$titulek='Další informace o žonglování';
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Ostatní','/ostatni.html');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni.tpl');
$smarty->display('paticka.tpl');

?>
