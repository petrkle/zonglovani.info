<?php
require('init.php');

$smarty->assign("titulek","Pøekulení ku¾elky pøes hlavu");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-headroll.tpl');
$smarty->display('paticka.tpl');

?>
