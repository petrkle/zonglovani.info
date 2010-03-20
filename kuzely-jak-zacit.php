<?php
require('init.php');
require('func.php');

$titulek='Jak začít žonglovat s kužely';
$smarty->assign('feedback',true);

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-jak-zacit.tpl');
$smarty->display('paticka.tpl');
?>
