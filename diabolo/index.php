<?php
require('../init.php');
require('../func.php');

$titulek='Diabolo';

$smarty->assign('titulek',$titulek);

$smarty->assign('keywords','diablolo, žonglování');
$smarty->assign('description','Návody na žonglování s diabolem.');

$trail = new Trail();
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('diabolo.tpl');
$smarty->display('paticka.tpl');

?>