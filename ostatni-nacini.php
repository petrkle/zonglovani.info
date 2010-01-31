<?php
require('init.php');
require('func.php');

$titulek='Žonglérské náčiní';
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-nacini.tpl');
$smarty->display('paticka.tpl');

?>
