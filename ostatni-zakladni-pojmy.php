<?php
require('init.php');
require('func.php');

$smarty->assign('titulek','Žonglování - základní pojmy');
$smarty->assign('feedback',true);

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep('Základní pojmy');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-zakladni-pojmy.tpl');
$smarty->display('paticka.tpl');

?>
