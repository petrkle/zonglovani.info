<?php
require('../init.php');
require('../func.php');
require('datumy.php');

$smarty->assign('titulek','Juggling at Ulita');

$smarty->assign('podzim',to_ulita($podzim));
$smarty->assign('jaro',to_ulita($jaro));

$trail = new Trail();
$trail->addStep('Žonglování v Ulitě','/ulita/');
$trail->addStep('English version');

$smarty->assign('description','Regular Sunday juggling at DDM Ulita, Prague.');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ulita.en.tpl');
$smarty->display('paticka.tpl');

?>
