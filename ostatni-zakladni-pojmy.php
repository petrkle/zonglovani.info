<?php
require('init.php');
require('func.php');

$smarty->assign('titulek','Žonglování - základní pojmy');
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Základní žonglérská terminologie.');

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep('Základní pojmy');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-zakladni-pojmy.tpl');
$smarty->display('paticka.tpl');

?>
