<?php
require('../init.php');
require('../func.php');

$smarty->assign('titulek','Jak vzniká horoskop žonglování');
$smarty->assign('description','Podrobný popis vzniku žonglérského horoskopu.');
$smarty->display('hlavicka.tpl');
$smarty->display('horoskop-popis.tpl');
$smarty->display('paticka.tpl');
