<?php
require('init.php');
require('func.php');

$titulek='Trénink';

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep('Jak trénovat');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('trenink.tpl');
$smarty->display('paticka.tpl');

?>
