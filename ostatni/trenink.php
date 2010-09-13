<?php
require('../init.php');
require('../func.php');

$titulek='Trénink';
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Postupy a triky jak trénovat žonglování.');

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep('Jak trénovat');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('trenink.tpl');
$smarty->display('paticka.tpl');

?>
