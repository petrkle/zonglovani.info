<?php
require('init.php');
require('func.php');

$titulek='Literatura';

$smarty->assign('titulek',$titulek);
$smarty->assign('feedback',true);

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-literatura.tpl');
$smarty->display('paticka.tpl');

?>
