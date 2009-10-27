<?php
require('init.php');

$smarty->assign("titulek","Překulení kuželky přes hlavu");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-headroll.tpl');
$smarty->display('paticka.tpl');

?>
