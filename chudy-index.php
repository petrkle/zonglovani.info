<?php
require('init.php');

$smarty->assign("titulek","Chůdy");

$smarty->display('hlavicka.tpl');
$smarty->display('chudy.tpl');
$smarty->display('paticka.tpl');

?>
