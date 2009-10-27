<?php
require('init.php');

$smarty->assign("titulek","Žonglérské míčky");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-druhy.tpl');
$smarty->display('paticka.tpl');

?>

