<?php
require('init.php');

$smarty->assign("titulek","Sbírání spadlých míčků");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-sbirani.tpl');
$smarty->display('paticka.tpl');

?>
