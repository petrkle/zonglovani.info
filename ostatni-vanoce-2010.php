<?php
require('init.php');
require('func.php');
$titulek='Veselé vánoce';
$smarty->assign('titulek',$titulek);
$trail = new Trail();
$trail->addStep('Tip týdne','/tip');
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-vanoce.tpl');
$smarty->display('paticka.tpl');
?>
