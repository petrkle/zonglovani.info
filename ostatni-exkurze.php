<?php
require('init.php');
require('func.php');

$titulek='Náhled do žonglérova slabikáře';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('exkurze.tpl');
$smarty->display('paticka.tpl');

?>
