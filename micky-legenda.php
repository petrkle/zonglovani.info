<?php
require('init.php');

$smarty->assign("titulek","Vysvětlivky k obrázkům - míčky");
$smarty->assign("nadpis","Vysvětlivky k obrázkům");

$smarty->display('hlavicka.tpl');
$smarty->display('micky-legenda.tpl');
$smarty->display('paticka.tpl');

?>
