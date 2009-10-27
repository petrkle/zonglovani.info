<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Jak vzniká horoskop žonglování");
$smarty->display('hlavicka.tpl');
$smarty->display('horoskop-popis.tpl');
$smarty->display('paticka.tpl');
?>
