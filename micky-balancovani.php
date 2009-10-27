<?php
require('init.php');

$smarty->assign("titulek","Balancování míčku");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-balancovani.tpl');
$smarty->display('paticka.tpl');

?>
