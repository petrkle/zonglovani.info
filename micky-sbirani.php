<?php
require('init.php');

$smarty->assign("titulek","Sbírání spadlých míèkù");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-sbirani.tpl');
$smarty->display('paticka.tpl');

?>
