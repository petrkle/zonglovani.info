<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Jak vznik� horoskop �onglov�n�");
$smarty->display('hlavicka.tpl');
$smarty->display('horoskop-popis.tpl');
$smarty->display('paticka.tpl');
?>
