<?php
require('init.php');

$smarty->assign("titulek","Žonglérské náčiní");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-nacini.tpl');
$smarty->display('paticka.tpl');

?>
