<?php
require('init.php');

$smarty->assign("titulek","Ch�dy");

$smarty->display('hlavicka.tpl');
$smarty->display('chudy.tpl');
$smarty->display('paticka.tpl');

?>
