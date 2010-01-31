<?php
require('init.php');
require('func.php');

$titulek='Pirueta';

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('micky-pirueta.tpl');
$smarty->display('paticka.tpl');

?>
