<?php
require('init.php');

$smarty->assign("titulek","Chùdy");

$smarty->display('hlavicka.tpl');
$smarty->display('chudy.tpl');
$smarty->display('paticka.tpl');

?>
