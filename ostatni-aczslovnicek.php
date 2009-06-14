<?php
require('init.php');

$smarty->assign("titulek","Anglicko-èeský ¾onglérský slovníèek");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-aczslovnicek.tpl');
$smarty->display('paticka.tpl');

?>
