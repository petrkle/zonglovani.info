<?php
require('../init.php');
require('../func.php');

$smarty->assign('titulek','Jak se dostat do Ulity');
$smarty->assign('icbm','50.094605, 14.481742');
$smarty->assign('description','Popis cesty na žonglování v Ulitě. Na Balkáně 100, Praha 3');

$trail = new Trail();
$trail->addStep('Žonglování v Ulitě','/ulita/');
$trail->addStep('Místo konání');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ulita.cesta.tpl');
$smarty->display('paticka.tpl');

?>
