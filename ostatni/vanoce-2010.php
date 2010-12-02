<?php
require('../init.php');
require('../func.php');
$titulek='Veselé vánoce';
$smarty->assign('titulek',$titulek.' 2010');
$smarty->assign('nadpis',$titulek);
$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Veselé vánoce 2010 všem žonglérkám a žonglérům.');
$trail = new Trail();
$trail->addStep('Tip týdne','/tip');
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-vanoce-2010.tpl');
$smarty->display('paticka.tpl');
?>
