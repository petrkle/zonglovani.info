<?php
require('init.php');

$smarty->assign("titulek","Použij nohy");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-nohy.tpl');
$smarty->display('paticka.tpl');

?>
