<?php
require('init.php');
require('func.php');

$titulek='Žonglování poslepu';
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Popis jak se naučit žonglovat poslepu. Bez koukání.');

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('micky-poslepu.tpl');
$smarty->display('paticka.tpl');

?>
