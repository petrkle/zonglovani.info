<?php
require('init.php');
require('func.php');

$titulek='Jak začít žonglovat s míčky';
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('micky-jak-zacit.tpl');
$smarty->display('paticka.tpl');

?>
