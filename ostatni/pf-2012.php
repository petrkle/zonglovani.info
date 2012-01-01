<?php
require('../init.php');
require('../func.php');
$titulek='PF 2012';
$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Přání všeho nejlepšího v roce 2012.');
$smarty->assign('titulek',$titulek);
$trail = new Trail();
$trail->addStep('Tip týdne','/tip');
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-pf-2012.tpl');
$smarty->display('paticka.tpl');
?>