<?php
require('init.php');
require('func.php');

$titulek='Ohnivé kužely';

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-ohen.tpl');
$smarty->display('paticka.tpl');

?>
