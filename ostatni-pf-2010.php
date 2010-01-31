<?php
require('init.php');
require('func.php');
$titulek='PF 2010';
$smarty->assign('titulek',$titulek);
$trail = new Trail();
$trail->addStep('Tip týdne','/tip');
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-pf-2010.tpl');
$smarty->display('paticka.tpl');
?>
