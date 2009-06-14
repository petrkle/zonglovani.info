<?php
require('init.php');

$smarty->assign("titulek","Balancování míèku");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-balancovani.tpl');
$smarty->display('paticka.tpl');

?>
